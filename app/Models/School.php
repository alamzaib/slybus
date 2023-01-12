<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    use HasFactory;
    protected $table = 'school';
    protected $fillable = ['name', 'address', 'city', 'country' , 'phone' , 'email' , 'website' , 'detail'];

    public function teachers()
    {
        return $this->hasMany(Teacher::class,'id','school_id');
    }

}
