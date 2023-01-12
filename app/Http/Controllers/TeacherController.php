<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teachers = Teacher::orderBy('id','desc')->paginate(5);
        return view('teacher.index', compact('teachers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $schools = DB::table('school')->get();
        $school_list = '<select name="school_id" class="form-control">
                        <option></option>';
        foreach ($schools as $school){
            $school_list .= '<option value="'.$school->id.'">'.$school->name.'</option>';
        }
        $school_list .= '</select>';

        return view('teacher.create', compact('school_list'));
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
            'bio' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'school_id' => 'required',
        ]);

        Teacher::create($request->post());

        return redirect()->route('teacher.index')->with('success','Teacher has been created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function show(Teacher $teacher)
    {
        return view('teacher.show',compact('teacher'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function edit(Teacher $teacher)
    {
        $schools = DB::table('school')->get();
        $school_list = '<select name="school_id" class="form-control">
                        <option></option>';
        foreach ($schools as $school){
            $school_list .= "<option value='".$school->id."'";
            $school_list .= ($teacher->school->id == $school->id)?" selected ": "";
            $school_list .= ">".$school->name."</option>";
        }
        $school_list .= '</select>';
        return view('teacher.edit',compact('teacher','school_list'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Teacher $teacher)
    {
        $request->validate([
            'name' => 'required',
            'bio' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'school_id' => 'required',
        ]);

        $teacher->fill($request->post())->save();

        return redirect()->route('teacher.index')->with('success','Teacher Has Been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function destroy(Teacher $teacher)
    {
        $teacher->delete();
        return redirect()->route('teacher.index')->with('success','Teacher has been deleted successfully');
    }
}
