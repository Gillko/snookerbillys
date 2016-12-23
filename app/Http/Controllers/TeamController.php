<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\Address;

use Illuminate\Http\Request;
use Input;
use Validator;
use Session;
use Redirect;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       /*Get the teams*/
        $teams = Team::all();

        /*Load the view and pass the teams*/
        return \View::make('teams.index')->with('teams', $teams);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $teams = Team::all();

        $addresses = Address::all()->pluck('address_street', 'address_id');

        return \View::make('teams.create', compact('teams', 'addresses'));
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
            'team_name'  => 'required',
        );

        /*Run the validation rules on the inputs from the form*/
        $validator = Validator::make($input, $rules);

        if($validator->passes())
        {
            /*We make a tutorial object*/
            $team = new Team();

            $team->team_name    = $input['team_name'];
            $team->address_id   = Input::get('address_id');
            //$week->user_id    = Auth::id();

            $team->save();

            /*Redirect*/
            Session::flash('message', 'Successfully created a team!');
            return Redirect::to('teams');
        }
        else {
            return Redirect::to('teams/create')->withInput()->withErrors($validator);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $team_id
     * @return \Illuminate\Http\Response
     */
    public function show($team_id)
    {
        $team = Team::find($team_id);
        return \View::make('teams.show')->with('team', $team);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $team_id
     * @return \Illuminate\Http\Response
     */
    public function edit($team_id)
    {
        $team = Team::findOrFail($team_id);

        return view('teams.edit', compact('team'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $team_id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $team_id)
    {
        $team = Team::findOrFail($team_id);
        $team->update($request->all());

        return redirect('teams');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $team_id
     * @return \Illuminate\Http\Response
     */
    public function destroy($team_id)
    {
        $teams = Season::find($team_id);
        $teams->delete();

        /*Redirect*/
        Session::flash('message', 'Successfully deleted the team!');
        return Redirect::to('teams');
    }
}
