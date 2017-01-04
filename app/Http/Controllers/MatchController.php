<?php

namespace App\Http\Controllers;

use App\Models\Match;
use App\Models\Week;
use App\Models\Season;
use App\Models\Player;
use App\Models\Location;
use App\Models\Frame;

use Illuminate\Http\Request;
use Input;
use Validator;
use Session;
use Redirect;
use Response;
use DB;

class MatchController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		/*Get the matches*/
		$matches = Match::all();

		/*Load the view and pass the matches*/
		return \View::make('matches.index')->with('matches', $matches);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		$matches = Match::all();

		$players    = Player::all(DB::raw('concat (player_firstname," ",player_surname) as player_name,player_id'))->pluck('player_name', 'player_id');
		$seasons    = Season::all()->pluck('season_years', 'season_id');
		$weeks      = Week::all()->pluck('week_name', 'week_id');
		$locations  = Location::all()->pluck('location_name', 'location_id');

		return \View::make('matches.create', compact('players', 'weeks', 'seasons', 'locations'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		$input = Input::all();

		/*Validation*/
		$rules = array(
			'match_scorePlayerHome' => 'required',
			'match_scorePlayerAway' => 'required',
			'frame_name'            => 'required',
			'frame_scorePlayerHome' => 'required',
			'frame_scorePlayerAway' => 'required',
		);

		/*Run the validation rules on the inputs from the form*/
		$validator = Validator::make($input, $rules);

		if($validator->passes())
		{
			/*We make a tutorial object*/
			$match  = new Match();

			$match->week_id                     = Input::get('week_id');
			$match->season_id                   = Input::get('season_id');
			$match->location_id                 = Input::get('location_id');
			$match->match_scorePlayerHome       = $input['match_scorePlayerHome'];
			$match->match_scorePlayerAway       = $input['match_scorePlayerAway'];
			//$match->user_id    = Auth::id();

			$match->save();

			$match->players()->attach($request->input('player_list'));
			
			for($i= 0; $i < count($input['frame_name']); $i++){
				
				$frames = new Frame();
				
				$frames->frame_id               = $request['frame_id'];
				$frames->frame_name             = $input['frame_name'][$i]; 
				$frames->frame_scorePlayerHome  = $input['frame_scorePlayerHome'][$i]; 
				$frames->frame_breakPlayerHome  = $input['frame_breakPlayerHome'][$i];
				$frames->frame_scorePlayerAway  = $input['frame_scorePlayerAway'][$i];
				$frames->frame_breakPlayerAway  = $input['frame_breakPlayerAway'][$i];

				$frames->save();

				$match->frames()->attach($request->get('frame_id', $frames));
			}
			
		   /*Redirect*/
			Session::flash('message', 'Successfully created a match!');
			return Redirect::to('matches');
		}
		else {
			return Redirect::to('matches/create')->withInput()->withErrors($validator);
		}
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $match_id
	 * @return \Illuminate\Http\Response
	 */
	public function show($match_id)
	{
		$match = Match::find($match_id);
		return \View::make('matches.show')->with('match', $match);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $match_id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($match_id)
	{
		$match = Match::findOrFail($match_id);

		$players    = Player::all()->pluck('player_surname', 'player_id');
		$seasons    = Season::all()->pluck('season_years', 'season_id');
		$weeks      = Week::all()->pluck('week_name', 'week_id');
		$locations  = Location::all()->pluck('location_name', 'location_id');

		return view('matches.edit', compact('match', 'weeks', 'seasons', 'players', 'locations'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $match_id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $match_id)
	{
		$match = Match::findOrFail($match_id);
		$match->update($request->all());

		$match->players()->sync((array)$request->input('player_list', []));

		return redirect('matches');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $match_id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($match_id)
	{
		$match = Match::find($match_id);
		$match->delete();

		/*Redirect*/
		Session::flash('message', 'Successfully deleted the match!');
		return Redirect::to('matches');
	}

	 /*JSON action (to use in the Frontoffice with AngularJS*/
	public function json()
	{
		$match = Match::with('players')->with('frames')->get();

		//return Response::json($match)->setCallback(Input::get('callback'));
		//return response()->json($data=['matches' => $match], $status=200, $headers=[], $options=JSON_PRETTY_PRINT);
		return response()->json($data=$match, $status=200, $headers=[], $options=JSON_PRETTY_PRINT);
	}
}