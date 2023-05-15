<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
// Route::post('/students/store',[StudentController::class,'store'])->name('student.store');


Route::prefix('students')->middleware('auth')->controller(StudentController::class)->group(function(){
    Route::get('/','index')->name('students');
    Route::get('/create','create')->name('student.create');
    Route::get('/{id}/edit','edit')->name('student.edit');
    Route::get('/{id}/note','student_note')->name('student.note');
    Route::get('/{id}','show')->name('student');
    Route::get('/{id}/generate-pdf',[PdfController::class,'generatePdf'])->name('generate.pdf');
    Route::put('/{id}/edit','update')->name('student.update');
    Route::post('/','store')->name('student.store');


});

// Route::middleware('auth')->controller()->group(function(){
//     Route::post('/','create')->name('studentLevel.create');
// });

Route::prefix('levels')->middleware('auth')->controller(LevelController::class)->group(function(){
    Route::get('/','index')->name('levels');
    Route::get('/create','create')->name('level.create');
    Route::get('/{id}/edit','edit')->name('level.edit');
    Route::get('/{id}','show')->name('level');
    Route::get('/{id}/courses','show_courses')->name('level.courses');
    Route::post('/','store')->name('level.store');
    Route::put('/{id}/edit','update')->name('level.update');
    Route::delete('{id}/delete','destroy')->name('level.destroy');

});
Route::prefix('courses')->middleware('auth')->controller(CourseController::class)->group(function(){
    // Route::delete('/{id}/delete','destroy')->name('course.destroy');
    Route::get('/','index')->name('courses');
    Route::get('/create','create')->name('course.create');
    Route::get('/{id}/edit','edit')->name('course.edit');
    Route::get('/{id}','show')->name('course');
    Route::post('/','store')->name('course.store');
    Route::put('/{id}/edit','update')->name('course.update');
});
Route::delete('courses/{id}/delete',[CourseController::class,'destroy'])->name('course.destroy');

Route::prefix('notes')->middleware('auth')->controller(NoteController::class)->group(function(){
    Route::get('/{level_id}/{course_id}','index')->name('notes');
    Route::get('/{level_id}/{student_id}/{course_id}','create')->name('note.create');
    Route::get('/{level_id}/{student_id}/{course_id}/{id}/edit','edit')->name('note.edit');
    Route::post('/{level_id}/{student_id}/{course_id}','store')->name('note.store');
    Route::put('/{level_id}/{student_id}/{course_id}//{id}/edit','update')->name('note.update');
});
Route::get('/', function () {
    return view('welcome');
});
Route::get('admin/home', [HomeController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
