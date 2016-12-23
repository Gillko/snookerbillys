<?php

namespace App\Http\Controllers;

use App\Models\Season;

use Illuminate\Http\Request;
use Input;
use Validator;
use Session;
use Redirect;

class SeasonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*Get the seasons*/
        $seasons = Season::all();

        /*Load the view and pass the seasons*/
        return \View::make('seasons.index')->with('seasons', $seasons);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $seasons = Season::all();

        return \View::make('seasons.create');
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
            'season_years'      => 'required',
            'season_start'      => 'required',
            'season_end'        => 'required'
        );

        /*Run the validation rules on the inputs from the form*/
        $validator = Validator::make($input, $rules);

        if($validator->passes())
        {
            /*We make a tutorial object*/
            $season = new Season();

            $season->season_years   = $input['season_years'];
            $season->season_start   = $input['season_start'];
            $season->season_end     = $input['season_end'];
            //$season->user_id      = Auth::id();

            $season->save();

            /*Redirect*/
            Session::flash('message', 'Successfully created a season!');
            return Redirect::to('seasons');
        }
        else {
            return Redirect::to('seasons/create')->withInput()->withErrors($validator);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $season_id
     * @return \Illuminate\Http\Response
     */
    public function show($season_id)
    {
        $season = Season::find($season_id);
        return \View::make('seasons.show')->with('season', $season);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $season_id
     * @return \Illuminate\Http\Response
     */
    public function edit($season_id)
    {
        $season = Season::findOrFail($season_id);

        return view('seasons.edit', compact('season'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $season_id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $season_id)
    {
        $season = Season::findOrFail($season_id);
        $season->update($request->all());

        return redirect('seasons');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $season_id
     * @return \Illuminate\Http\Response
     */
    public function destroy($season_id)
    {
        $seasons = Season::find($season_id);
        $seasons->delete();

        /*Redirect*/
        Session::flash('message', 'Successfully deleted the season!');
        return Redirect::to('seasons');
    }
}
