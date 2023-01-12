<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $table = 'course';
    protected $fillable = ['name','detail','subject_id'];

    public function subject()
    {
        return $this->belongsTo(Subject::class,'subject_id','id');
    }

    public function units()
    {
        return $this->hasMany(Unit::class);
    }

    public function syllabus()
    {
        return $this->hasMany(Syllabus::class);
    }
}
