<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Subject;
use App\Models\Unit;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $units = Unit::orderBy('id','desc')->paginate(5);
        return view('unit.index',compact('units'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $courses = Course::all();

        $course_list = "<select name='course_id' class='form-control'>";
        $course_list .= "<option></option>";
        foreach($courses as $course)
            $course_list .= "<option value='".$course->id."'>".$course->name."</option>";
        $course_list .= "</select>";

        return view('unit.create',compact('course_list'));
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
            "name" => 'required',
            "detail" => 'required',
            "course_id" => 'required'
        ]);

        Unit::create($request->post());
        return redirect()->route('unit.index')->with('success','Unit has been created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function show(Unit $unit)
    {
        return view('unit.show',compact('unit'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function edit(Unit $unit)
    {
        $courses = Course::all();

        $course_list = '<select name="course_id" class="form-control">
                        <option></option>';
        foreach ($courses as $course){
            $course_list .= "<option value='".$course->id."'";
            $course_list .= ($unit->course->id == $course->id)?" selected ": "";
            $course_list .= ">".$course->name."</option>";
        }
        $course_list .= '</select>';

        return view('unit.edit',compact( 'unit','course_list'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Unit $unit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Unit $unit)
    {
        $unit->delete();
        return redirect()->route('unit.index')->with('success','Unit deleted successfully.');
    }
}
