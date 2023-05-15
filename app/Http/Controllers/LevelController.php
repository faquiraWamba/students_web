<?php

namespace App\Http\Controllers;

use App\Models\level;
use App\Http\Requests\StorelevelRequest;
use App\Http\Requests\UpdatelevelRequest;
use App\Models\Course;
use Illuminate\Contracts\View\View;
use Monolog\Level as MonologLevel;

class LevelController extends Controller
{
    public $levels;
    function __construct()
    {
        $this->levels=Level::all();
    }
    /**
     * Display a listing of the resource.
     */
    public function index():View
    {
        $levels=Level::all();
        return view('levels',compact('levels'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create():View
    {
        return view('levels.form_level');
    
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorelevelRequest $request):View
    {
        $level=Level::create(array_merge($request->except(["_token"])));
        
        return view('levels.level',compact('level'));
    }

    /**
     * Display the specified resource.
     */
    public function show($id):View{
        $level=Level::find($id);
        $courses=Course::where('level_id','=',$id)->count();
    return view('levels.level',compact('id','level','courses'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id):View{
        $level = Level::find($id);

        return view('levels.form_level')->with('level', $level);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatelevelRequest $request, $id)
    {
        $level=Level::find($id);
    if(!$level){
        return view('level', compact('id','level'));
    }
    $level->name=$request->input('name');
    $level->description=$request->input('description');
    $level->speciality=$request->input('speciality');

    $level->save();
	return redirect(route('level',['id'=>$level->id]));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
       Level::destroy($id);
        return redirect(route('levels'));
    }
    public function show_courses($id):view{
        $level=Level::find($id);
        $courses=Course::where('level_id','=',$id)->get();
        return view('courses.level_courses', compact('courses','level'));
    }
}
