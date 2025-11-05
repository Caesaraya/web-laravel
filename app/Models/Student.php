<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    /** @use HasFactory<\Database\Factories\StudentFactory> */
    use HasFactory;

protected $fillable = ['name', 'email', 'address', 'classroom_id', 'birthday'];

    public function classroom(){
         return $this->belongsTo(Classroom::class, 'classroom_id');
    }

}
