<?php

namespace App\Http\Controllers;

use App\Models\Season;
use App\Models\Week;
use App\Models\Team;
use App\Models\Location;

use Illuminate\Http\Request;
use Input;
use Validator;
use Session;
use Redirect;
use Response;

class WeekController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       /*Get the weeks*/
        $weeks = Week::all();

        /*Load the view and pass the weeks*/
        return \View::make('weeks.index')->with('weeks', $weeks);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $weeks      = Week::all();

        $teams      = Team::all()->pluck('team_name', 'team_id');
        $seasons    = Season::all()->pluck('season_years', 'season_id');
        $locations  = Location::all()->pluck('location_name', 'location_id');

        return \View::make('weeks.create', compact('seasons', 'teams', 'locations'));
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
            'week_name'             => 'required',
            'week_start'            => 'required',
            'week_day'              => 'required',
            'week_date'             => 'required',
            'week_scoreTeamHome'    => 'required',
            'week_scoreTeamAway'    => 'required'
        );

        /*Run the validation rules on the inputs from the form*/
        $validator = Validator::make($input, $rules);

        if($validator->passes())
        {
            /*We make a tutorial object*/
            $week = new Week();

            $week->week_name            = $input['week_name'];
            $week->week_start           = $input['week_start'];
            $week->week_day             = $input['week_day'];
            $week->week_date            = $input['week_date'];
            $week->week_scoreTeamHome   = $input['week_scoreTeamHome'];
            $week->week_scoreTeamAway   = $input['week_scoreTeamAway'];
            $week->location_id          = Input::get('location_id');
            $week->season_id            = Input::get('season_id');
            //$week->season()->associate($season);
            //$week->user_id    = Auth::id();

            $week->save();

            $week->teams()->attach($request->input('team_list'));

            /*Redirect*/
            Session::flash('message', 'Successfully created a week!');
            return Redirect::to('weeks');
        }
        else {
            return Redirect::to('weeks/create')->withInput()->withErrors($validator);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $week_id
     * @return \Illuminate\Http\Response
     */
    public function show($week_id)
    {
        $week = Week::find($week_id);
        return \View::make('weeks.show')->with('week', $week);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $week_id
     * @return \Illuminate\Http\Response
     */
    public function edit($week_id)
    {
        $week       = Week::findOrFail($week_id);
        $teams      = Team::all()->pluck('team_name', 'team_id');
        $seasons    = Season::all()->pluck('season_years', 'season_id');
        $locations  = Location::all()->pluck('location_name', 'location_id');

        return view('weeks.edit', compact('week', 'teams', 'seasons', 'locations'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $week_id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $week_id)
    {
        $week = Week::findOrFail($week_id);

        $week->update($request->all());

        $week->teams()->sync((array)$request->input('team_list', []));

        return redirect('weeks');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $week_id
     * @return \Illuminate\Http\Response
     */
    public function destroy($week_id)
    {
        $week = Week::find($week_id);
        $week->delete();

        /*Redirect*/
        Session::flash('message', 'Successfully deleted the week!');
        return Redirect::to('weeks');
    }

     /*JSON action (to use in the Frontoffice with AngularJS*/
    public function json()
    {
        $week = Week::with('teams')->get();

        return Response::json($week)->setCallback(Input::get('callback'));
        //return response()->json($data=['weeks' => $week], $status=200, $headers=[], $options=JSON_PRETTY_PRINT);
    }
}