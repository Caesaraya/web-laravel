<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    /** @use HasFactory<\Database\Factories\SubjectFactory> */
    use HasFactory;

    protected $table = "subjects";
    protected $fillable = ['name']; 
       public function teacher(){
        return $this->hasOne(Teacher::class, 'subject_id');
       }
}
