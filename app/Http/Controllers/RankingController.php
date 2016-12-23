<?php

namespace App\Http\Controllers;

use App\Models\Ranking;
use App\Models\Week;
use App\Models\Season;
use App\Models\Team;

use Illuminate\Http\Request;
use Input;
use Validator;
use Session;
use Redirect;
use Response;
//use DB;

class RankingController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		/*Get the teams*/
		$rankings = Ranking::with('team')->orderBy('ranking_rank')->get();

		//$rankings = DB::table('rankings')->where('week_id', '1')->get();

		//$rankings = Ranking::with('team')->orderBy('ranking_rank')->get();

		/*Load the view and pass the teams*/
		return \View::make('rankings.index')->with('rankings', $rankings);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		$rankings = Ranking::all();

		$weeks 		= Week::all()->sortByDesc("week_id")->pluck('week_name', 'week_id');
		$seasons 	= Season::all()->sortByDesc("season_id")->pluck('season_years', 'season_id');
		$teams 		= Team::all()->pluck('team_name', 'team_id');

		return \View::make('rankings.create', compact('weeks', 'seasons', 'teams'));
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
            'ranking_rank'			=> 'required',
            'ranking_playedMatches'	=> 'required',
            'ranking_wonMatches'	=> 'required',
            'ranking_drawMatches'	=> 'required',
            'ranking_lostMatches'	=> 'required',
            'ranking_lostFrames'	=> 'required',
            'ranking_wonFrames'		=> 'required'
        );

        /*Run the validation rules on the inputs from the form*/
        $validator = Validator::make($input, $rules);

        if($validator->passes())
        {
            /*We make a tutorial object*/
            $ranking = new Ranking();

            $ranking->ranking_rank    			= $input['ranking_rank'];
            $ranking->ranking_playedMatches		= $input['ranking_playedMatches'];
            $ranking->ranking_wonMatches    	= $input['ranking_wonMatches'];
            $ranking->ranking_drawMatches    	= $input['ranking_drawMatches'];
            $ranking->ranking_lostMatches    	= $input['ranking_lostMatches'];
            $ranking->ranking_lostFrames    	= $input['ranking_lostFrames'];
            $ranking->ranking_wonFrames    		= $input['ranking_wonFrames'];
            $ranking->week_id   				= Input::get('week_id');
            $ranking->season_id   				= Input::get('season_id');
            $ranking->team_id   				= Input::get('team_id');
            //$week->user_id    = Auth::id();

            $ranking->save();

            /*Redirect*/
            Session::flash('message', 'Successfully created a ranking!');
            return Redirect::to('rankings');
        }
        else {
            return Redirect::to('rankings/create')->withInput()->withErrors($validator);
        }
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $ranking_id
	 * @return \Illuminate\Http\Response
	 */
	public function show($ranking_id)
	{
		$ranking = Ranking::find($ranking_id);
        return \View::make('rankings.show')->with('ranking', $ranking);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $ranking_id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($ranking_id)
	{
		$ranking = Ranking::findOrFail($ranking_id);

        return view('rankings.edit', compact('ranking'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $ranking_id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $ranking_id)
	{
		$ranking = Ranking::findOrFail($ranking_id);
        $ranking->update($request->all());

        return redirect('rankings');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $ranking_id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($ranking_id)
	{
		$rankings = Season::find($ranking_id);
        $rankings->delete();

        /*Redirect*/
        Session::flash('message', 'Successfully deleted the ranking!');
        return Redirect::to('rankings');
	}

	 /*JSON action (to use in the Frontoffice with AngularJS*/
    public function json()
    {
        $ranking = Ranking::with('team')->get();

        return Response::json($ranking)->setCallback(Input::get('callback'));
        //return response()->json($data=['rankings' => $ranking], $status=200, $headers=[], $options=JSON_PRETTY_PRINT);
    }
}