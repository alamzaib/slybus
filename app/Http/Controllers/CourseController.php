<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::orderBy('id','desc')->paginate(5);
        return view('course.index',compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subjects = Subject::all();
        $subject_list = '<select name="subject_id" class="form-control">
                        <option></option>';
        foreach ($subjects as $subject){
            $subject_list .= "<option value='".$subject->id."'";
            $subject_list .= ">".$subject->name."</option>";
        }
        $subject_list .= '</select>';

        return view('course.create',compact('subject_list'));
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
            'name' => 'required',
            'detail' => 'required',
            'subject_id' => 'required',
        ]);

        Course::create($request->post());
        return redirect()->route('course.index')->with('success','Course has been created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        return view('course.show',compact('course'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        $subjects = Subject::all();

        $subject_list = '<select name="subject_id" class="form-control">
                        <option></option>';
        foreach ($subjects as $subject){
            $subject_list .= "<option value='".$subject->id."'";
            $subject_list .= ($course->subject->id == $subject->id)?" selected ": "";
            $subject_list .= ">".$subject->name."</option>";
        }
        $subject_list .= '</select>';

        return view('course.edit',compact( 'course','subject_list'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
        $request->validate([
            'name' => 'required',
            'detail' => 'required',
            'subject_id' => 'required',
        ]);

        $course->fill($request->post())->save();
        return redirect()->route('course.index')->with('success','Course has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        $course->delete();
        return redirect()->route('course.index')->with('success','Course has been deleted.');
    }
}
