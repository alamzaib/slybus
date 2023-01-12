<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use App\Models\Unit;
use Illuminate\Http\Request;

class TopicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $topics = Topic::orderBy('id','desc')->paginate(5);
        return view('topic.index',compact('topics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $units = Unit::all();

        $unit_list = "<select name='unit_id' class='form-control'>";
        $unit_list .= "<option></option>";
        foreach($units as $unit)
            $unit_list .= "<option value='".$unit->id."'>".$unit->name."</option>";
        $unit_list .= "</select>";

        return view('topic.create',compact('unit_list'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
           "name" => "required",
           "detail" => "required",
           "unit_id" => "required"
        ]);

        Topic::create($request->post());
        return redirect()->route('topic.index')->with('success','Topic has been created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Topic  $topic
     * @return \Illuminate\Http\Response
     */
    public function show(Topic $topic)
    {
        return view('topic.show',compact('topic'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Topic  $topic
     * @return \Illuminate\Http\Response
     */
    public function edit(Topic $topic)
    {
        $units = Unit::all();

        $unit_list = "<select name='unit_id' class='form-control'>";
        $unit_list .= "<option></option>";
        foreach($units as $unit)
        {
            $unit_list .= "<option value='".$unit->id."'";
            $unit_list .= ($topic->unit->id == $unit->id)?" selected ": "";
            $unit_list .= ">".$unit->name."</option>";
        }
        $unit_list .= "</select>";

        return view('topic.edit',compact( 'topic','unit_list'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Topic  $topic
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Topic $topic)
    {
        $request->validate([
            "name" => "required",
            "detail" => "required",
            "unit_id" => "required"
        ]);

        $topic->fill($request->post())->save();
        return redirect()->route('topic.index')->with('success','Topic has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Topic  $topic
     * @return \Illuminate\Http\Response
     */
    public function destroy(Topic $topic)
    {
        $topic->delete();
        return redirect()->route('topic.index')->with('success','Topic has been deleted.');
    }
}
