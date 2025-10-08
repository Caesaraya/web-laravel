<?php

use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\GuardianController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TeacherController;
use App\Models\Subject;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/profil', [ProfilController::class, 'index'])->name('profil');
Route::get('/kontak', [KontakController::class, 'index'])->name('kontak');

Route::get('/student', [StudentController::class, 'index'])->name('student');
Route::get('/guardian', [GuardianController::class, 'index'])->name('guardian');
Route::get('/classroom', [ClassroomController::class, 'index'])->name('classroom');
Route::get('/teacher', [TeacherController::class, 'index'])->name('teacher');
Route::get('/subject', [SubjectController::class, 'index'])->name('subject');
