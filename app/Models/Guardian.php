<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guardian extends Model
{
        protected $fillable = [
        'name',
        'job',
        'phone',
        'email',
    ];
    
    /** @use HasFactory<\Database\Factories\GuardianFactory> */
    use HasFactory;
}
