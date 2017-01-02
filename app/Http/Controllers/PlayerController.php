<?php

namespace App\Http\Controllers;

use App\Models\Player;
use App\Models\Team;

use Illuminate\Http\Request;
use Input;
use Validator;
use Session;
use Redirect;
use Response;

class PlayerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*Get the players*/
        $players = Player::with('team')->orderBy('player_surname')->get();

        /*Load the view and pass the player*/
        return \View::make('players.index')->with('players', $players);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $players = Player::all();

        $teams = Team::all()->pluck('team_name', 'team_id');

        return \View::make('players.create', compact('teams'));
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
            'player_firstname'              => 'required',
            'player_surname'                => 'required'
        );

        /*Run the validation rules on the inputs from the form*/
        $validator = Validator::make($input, $rules);

        if($validator->passes())
        {
            /*We make a tutorial object*/
            $player = new Player();

            $player->player_firstname              = $input['player_firstname'];
            $player->player_surname                = $input['player_surname'];
            $player->player_nickname               = $input['player_nickname'];
            $player->player_highestBreakTraining   = $input['player_highestBreakTraining'];
            $player->player_highestBreakOfficial   = $input['player_highestBreakOfficial'];
            $player->player_cue                    = $input['player_cue'];
            $player->team_id                       = Input::get('team_id');
            //$week->user_id    = Auth::id();

            $player->save();

            /*Redirect*/
            Session::flash('message', 'Successfully created a player!');
            return Redirect::to('players');
        }
        else {
            return Redirect::to('players/create')->withInput()->withErrors($validator);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $player_id
     * @return \Illuminate\Http\Response
     */
    public function show($player_id)
    {
        $player = Player::find($player_id);
        return \View::make('players.show')->with('player', $player);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $player_id
     * @return \Illuminate\Http\Response
     */
    public function edit($player_id)
    {
        $player = Player::findOrFail($player_id);

        $team = Team::all()->pluck('team_name', 'team_id');

        return view('players.edit', compact('player', 'week', 'season', 'team'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $player_id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $player_id)
    {
        $player = Player::findOrFail($player_id);
        $player->update($request->all());

        return redirect('players');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $player_id
     * @return \Illuminate\Http\Response
     */
    public function destroy($player_id)
    {
        $player = Player::find($player_id);
        $player->delete();

        /*Redirect*/
        Session::flash('message', 'Successfully deleted the player!');
        return Redirect::to('players');
    }

     /*JSON action (to use in the Frontoffice with AngularJS*/
    public function json()
    {
        $player = Player::with('team')->get();

        return Response::json($player)->setCallback(Input::get('callback'));
        //return response()->json($data=['players' => $player], $status=200, $headers=[], $options=JSON_PRETTY_PRINT);
    }
}