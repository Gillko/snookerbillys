<?php

namespace App\Http\Controllers;

use App\Models\Frame;
use App\Models\Match;

use Illuminate\Http\Request;
use Input;
use Validator;
use Session;
use Redirect;
use Response;

class FrameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*Get the frames*/
        $frames = Frame::all();

        /*Load the view and pass the frames*/
        return \View::make('frames.index')->with('frames', $frames);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $frames = Frame::all();

        $matches = Match::all()->pluck('match_id', 'match_id');

        return \View::make('frames.create', compact('matches'));
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
            'frame_name'            => 'required',
            'frame_scorePlayerHome' => 'required',
            'frame_scorePlayerAway' => 'required',
        );

        /*Run the validation rules on the inputs from the form*/
        $validator = Validator::make($input, $rules);

        if($validator->passes())
        {
            /*We make a tutorial object*/
            $frame = new Frame();

            $frame->frame_name                  = $input['frame_name'];
            $frame->frame_scorePlayerHome       = $input['frame_scorePlayerHome'];
            $frame->frame_breakPlayerHome       = $input['frame_breakPlayerHome'];
            $frame->frame_scorePlayerAway       = $input['frame_scorePlayerAway'];
            $frame->frame_breakPlayerAway       = $input['frame_breakPlayerAway'];
            //$frame->user_id    = Auth::id();

            $frame->save();

            $frame->matches()->attach($request->input('match_list'));

            /*Redirect*/
            Session::flash('message', 'Successfully created a frame!');
            return Redirect::to('frames');
        }
        else {
            return Redirect::to('frames/create')->withInput()->withErrors($validator);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $frame_id
     * @return \Illuminate\Http\Response
     */
    public function show($frame_id)
    {
        $frame = Frame::find($frame_id);
        return \View::make('frames.show')->with('frame', $frame);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $frame_id
     * @return \Illuminate\Http\Response
     */
    public function edit($frame_id)
    {
        $frame = Frame::findOrFail($frame_id);

        $matches = Match::all()->pluck('match_id', 'match_id');

        return view('frames.edit', compact('frame', 'matches'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $frame_id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $frame_id)
    {
        $frame = Frame::findOrFail($frame_id);
        $frame->update($request->all());

        $frame->matches()->sync((array)$request->input('match_list', []));

        return redirect('frames');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $frame_id
     * @return \Illuminate\Http\Response
     */
    public function destroy($frame_id)
    {
        $frame = Frame::find($frame_id);
        $frame->delete();

        /*Redirect*/
        Session::flash('message', 'Successfully deleted the frame!');
        return Redirect::to('frames');
    }

     /*JSON action (to use in the Frontoffice with AngularJS*/
    public function json()
    {
        $frame = Frame::with('players')->get();

        //return Response::json($frame)->setCallback(Input::get('callback'));
        //return response()->json($data=['frames' => $frame], $status=200, $headers=[], $options=JSON_PRETTY_PRINT);
        return response()->json($data=$frame, $status=200, $headers=[], $options=JSON_PRETTY_PRINT);
    }
}