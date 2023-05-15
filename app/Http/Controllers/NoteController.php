<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Http\Requests\StoreNoteRequest;
use App\Http\Requests\UpdateNoteRequest;
use App\Models\Course;
use App\Models\LevelsStudents;
use App\Models\Student;
use Illuminate\Contracts\View\View;

class NoteController extends Controller
{
    public $notes;
    function __construct()
    {
        $this->notes=Note::all();
    }
    /**
     * Display a listing of the resource.
     */
    public function index( $level_id,$course_id)
    {
        $notes=Note::where('course_id','=',$course_id)->get();
        $notesLength=count($notes);
        $course=Course::find($course_id);
        $levelStudents=LevelsStudents::where('level_id','=',$level_id)->get();
        $students=Student::all();

        return view('notes.notes',compact('notes','students','levelStudents','course','notesLength','level_id'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($level_id,$student_id,$course_id)
    {
        return view('notes.form_note',compact('level_id','student_id','course_id'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreNoteRequest $request,$level_id ,$student_id,$course_id)
    {
    
        if($request->input('note')<8){
            $type='faible';
        }else if($request->input('note')>=8 && $request->input('note')<10){
            $type='mediocre';
        }else if($request->input('note')>=10 && $request->input('note')<12){
            $type='passable';
        }else if($request->input('note')>=12 && $request->input('note')<14){
            $type='Assez bien';
        }else if($request->input('note')>=14 && $request->input('note')<17){
            $type='bien';
        }else if($request->input('note')>=17 && $request->input('note')<19){
            $type='Très bien';
        }else{$type='Excellent';}
        Note::create(array_merge(
            $request->except(["_token"]),
            ['student_id'=>$student_id],
            ['course_id'=>$course_id],
            ['type'=>$type]
            
        ));
        return redirect (route('notes',['level_id'=>$level_id,'student_id'=>$student_id,'course_id'=>$course_id]));
    }

    /**
     * Display the specified resource.
     */
    public function show(Note $note)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($level_id,$student_id,$course_id,$id):View
    {
        $note=Note::find($id);
        return view('notes.form_note',compact('note','level_id','student_id','course_id'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateNoteRequest $request,$level_id,$student_id,$course_id, $id)
    {
        $note=Note::find($id);
     
        if($request->input('note')<8){
            $type='faible';
        }else if($request->input('note')>=8 && $request->input('note')<10){
            $type='mediocre';
        }else if($request->input('note')>=10 && $request->input('note')<12){
            $type='passable';
        }else if($request->input('note')>=12 && $request->input('note')<14){
            $type='Assez bien';
        }else if($request->input('note')>=14 && $request->input('note')<17){
            $type='bien';
        }else if($request->input('note')>=17 && $request->input('note')<19){
            $type='Très bien';
        }else{$type='Excellent';}

        $note->note=$request->input('note');
        $note->type=$type;
        $note->save();

        return redirect (route('notes',['level_id'=>$level_id,'student_id'=>$student_id,'course_id'=>$course_id]));

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Note $note)
    {
        //
    }
}
