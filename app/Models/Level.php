<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Level extends Model
{
    use HasFactory;

    protected $fillable=['id','name','description','speciality'];

    public function students():BelongsToMany
    {
        return $this->belongsToMany(Student::class, 'levels_students', 'level_id', 'student_id');
    }
    public function courses():HasMany
    {
        return $this->hasMany(Course::class);
    }


    
}
