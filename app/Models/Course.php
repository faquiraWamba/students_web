<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Course extends Model
{
    use HasFactory;

    protected $fillable=['name','code', 'description','semester','level_id'];

    public function levels():BelongsTo{
        return $this->belongsTo(Level::class, 'level_id');
    }
    public function notes():HasMany{
        return $this->hasMany(Note::class);
    }

   

}
