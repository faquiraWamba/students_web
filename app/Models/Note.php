<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Note extends Model
{
    use HasFactory;
    protected $fillable=['note','type','course_id','student_id'];


    public function students():BelongsTo{
        return $this->belongsTo(Student::class,'student_id');
    }
    public function courses():BelongsTo{
        return $this->belongsTo(Course::class,'course_id');
    }
}
