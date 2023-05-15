<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Storage;

class Student extends Model
{
    use HasFactory;
    protected $fillable=['last_name','first_name','gender','user_id','picture'];

    public function getPictureAttribute($val):string{
        if($val==null){
            return env('APP_URL').'/default.png';
        };
        return Storage::disk('public')->url($val);
    }
    public function levels():BelongsToMany
    {
        return $this->belongsToMany(Level::class, 'levels_students', 'level_id', 'student_id');
    }
    public function notes():HasMany{
        return $this->hasMany(Note::class);
    }
    public function users():BelongsTo{
        return $this->belongsTo(User::class,'user_id');
    }

}
