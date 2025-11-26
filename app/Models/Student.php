<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    /** @use HasFactory<\Database\Factories\StudentFactory> */
    use HasFactory;

protected $fillable = ['name', 'email', 'address', 'classroom_id', 'birthday'];
// Properti $fillable menyatakan daftar kolom database yang diizinkan untuk diisi menggunakan metode mass assignment(update,create)

    public function classroom(){
         return $this->belongsTo(Classroom::class, 'classroom_id');
        //  mengembalikan relasi one to one ke classroom, jadi setiap student hanya memiliki 1 kelas
    }

}
