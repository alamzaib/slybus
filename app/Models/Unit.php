<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    use HasFactory;
    protected $table = "unit";
    protected $fillable = ["name","detail","course_id"];

    public function course()
    {
        return $this->belongsTo(Course::class,'course_id','id');
    }

    public function topics()
    {
        return $this->hasMany(Topic::class);
    }
}
