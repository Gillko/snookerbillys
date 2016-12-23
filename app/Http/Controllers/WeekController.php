<?php

namespace App\Http\Controllers;

use App\Models\Season;
use App\Models\Week;

use Illuminate\Http\Request;
use Input;
use Validator;
use Session;
use Redirect;

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
        $weeks = Week::all();

        $seasons = Season::all()->pluck('season_years', 'season_id');

        return \View::make('weeks.create', compact('seasons'));
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
            'week_name'  => 'required',
        );

        /*Run the validation rules on the inputs from the form*/
        $validator = Validator::make($input, $rules);

        if($validator->passes())
        {
            /*We make a tutorial object*/
            $week = new Week();

            $week->week_name    = $input['week_name'];
            $week->season_id    = Input::get('season_id');
            //$week->season()->associate($season);
            //$week->user_id    = Auth::id();

            $week->save();

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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
