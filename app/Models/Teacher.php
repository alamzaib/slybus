<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;
    protected $table = 'teacher';
    protected $fillable = ['school_id','name', 'bio', 'email','phone','photo'];

    public function school(){
        return $this->belongsTo(School::class);
    }

}
