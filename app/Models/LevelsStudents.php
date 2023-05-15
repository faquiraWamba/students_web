<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LevelsStudents extends Model
{
    use HasFactory;
    protected $fillable=['level_id','student_id','school_year'];

}
