<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    use HasFactory;
    protected $table = "topic";
    protected $fillable = ["name","detail","unit_id"];

    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }
}
