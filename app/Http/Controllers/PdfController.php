<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Level;
use App\Models\LevelsStudents;
use App\Models\Note;
use App\Models\Student;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

PDF::setOptions([
    "defaultFont" => "Courier",
    "defaultPaperSize" => "a4",
    "dpi" => 130
]);
class PdfController extends Controller
{
    
    public function generatePdf($id) {
        $student=Student::where('user_id', '=',$id)->first();
        $notes=Note::where('student_id','=',$student->id)->get();
        $levelStudent=LevelsStudents::where('student_id', '=',$student->id)->first();
        $level=Level::find($levelStudent->level_id);
        $courses=Course::where('level_id','=',$levelStudent->level_id)->get();
        $pdf = PDF::loadView('student_note',['id'=>$id], compact('student','level','courses','notes'));
        // dd($pdf);
        return $pdf->download('notes.pdf');
    }
}
