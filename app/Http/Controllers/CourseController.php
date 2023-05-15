<?php

namespace App\Http\Controllers;

use App\Models\course;
use App\Http\Requests\StorecourseRequest;
use App\Http\Requests\UpdatecourseRequest;
use App\Models\Level;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public $courses;
    function __construct()
    {
        $this->courses=Course::all();
    }
    public function index()
    {
        $courses=Course::all();
        return view('courses.courses',compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $levels=Level::all();
       
     return view('courses.form_course', compact('levels'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorecourseRequest $request)
    {
        $course=Course::create(array_merge($request->except(["_token"])));
        return view('courses.course',compact('course'));
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $course=Course::find($id);
        return view('courses.course',compact('id','course'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $course = Course::find($id);
        $levels=Level::all();

        return view('courses.form_course',compact('levels'))->with('course', $course);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatecourseRequest $request, $id)
    {
        $course=Course::find($id);
        if(!$course){
            return view('course', compact('id','course'));
        }
        $course->name=$request->input('name');
        $course->code=$request->input('code');
        $course->description=$request->input('description');
        $course->semester=$request->input('semester');
        $course->level_id=$request->input('level_id');
    
        $course->save();
        return redirect(route('course',['id'=>$course->id]));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
       Course::destroy($id);
       return redirect(route('courses'));

    }
}
