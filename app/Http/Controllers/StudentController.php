<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use App\Http\Requests\StudentRequest;
use App\Models\Course;
use App\Models\Level;
use App\Models\LevelsStudents;
use App\Models\Note;
use App\Models\StudentLevel;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View as ViewView;
use Symfony\Component\Console\Input\Input;

class StudentController extends Controller
{
    //
    public $students;
     function __construct()
    {
        $this->students=Student::all();
    }
    public function index():View{
        $students=Student::paginate(20);;
        return view('students',compact('students'));
    }
    public function show($id):View{
        $student=Student::find($id);
    return view('student',compact('id','student'));
    }
    public function store(StudentRequest $request):View{
        $path=null;

        if($request->has('picture')){
        /** @var UploadedFile $picture */
        $picture=$request->validated('picture');
        $path = $picture->store('students/pictures','public');
        };
        $request->merge(['picture'=>$path]);
        $student=Student::create(array_merge($request->except(["_token"]),['picture'=>$path]));
        $id=$student->id;
        $levelsStudent=LevelsStudents::create(array_merge(
            $request->except(["_token"]),
            // ['school_year'=>$request->input('school_year')],
            ['school_year'=>$request->input('school_year')],
            ['student_id'=>$id],
            ['level_id'=>$request->input('level_id')],

            
        ));
        // dd($levelsStudent);

        
        return view('student',compact('student','levelsStudent'));
    }
    public function create():View{
        $studentsId=Student::all('user_id');
        $levels=Level::all();
        $users=User::whereNotIn('id',$studentsId)->where('is_admin','<>',1)->get();

     return view('form_student', compact('levels','users'));
    }
    public function edit($id):View{
        $levels=Level::all();
        $student = Student::find($id);

        return view('form_student', compact('levels'))->with('student', $student);
    }

    public function update(StudentRequest $request, $id){

    $student=Student::find($id);
    if(!$student){
        return view('student', compact('id','student'));
    }
    else{
        $path=null;
        if($request->has('picture')){}
     /** @var UploadedFile $picture */
     $picture=$request->validated('picture');
     $path = $picture->store('students/pictures','public');
    }
    if(Storage::exists($student->picture) ){
        Storage::delete($student->picture);
    }
    $student->first_name=$request->input('first_name');
    $student->last_name=$request->input('last_name');
    $student->gender=$request->input('gender');
    $student->picture=$path;


    $student->save();
	return redirect(route('student',['id'=>$student->id]));
}
public function destroy($id)
{
   Student::destroy($id);
    return view('students');
}

public function student_note($id)
{
   $student=Student::where('user_id', '=',$id)->first();
   $notes=Note::where('student_id','=',$student->id)->get();
   $levelStudent=LevelsStudents::where('student_id', '=',$student->id)->first();
   $level=Level::find($levelStudent->level_id);
   $courses=Course::where('level_id','=',$levelStudent->level_id)->get();
   

    return view('student_note', compact('student','notes','levelStudent','level','courses'));
}

}


