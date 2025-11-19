<?php

use App\Http\Controllers\admin\AdminClassroom;
use App\Http\Controllers\admin\AdminGuardianController;
use App\Http\Controllers\admin\AdminKontakController;
use App\Http\Controllers\admin\AdminProfilController;
use App\Http\Controllers\admin\AdminStudentController;
use App\Http\Controllers\admin\AdminSubjectController;
use App\Http\Controllers\admin\AdminTeacherController;
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
Route::prefix('admin')->group(function () {
 
    // Route untuk dashboard
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard'); 
 
    // Route untuk admin students
    Route::get('/students', [AdminStudentController::class, 'index'])
        ->name('admin.student.students');
//CREATE
    Route::post('/student/store', [AdminStudentController::class, 'store'])
        ->name('admin.student.store');
//UPDATE
    Route::put('/student/update/{id}', [AdminStudentController::class, 'update'])
    ->name('admin.student.update');

//DELETE
    Route::delete('/student/destroy/{id}', [AdminStudentController::class, 'destroy'])
        ->name('admin.student.destroy');

    Route::get('/guardians', [AdminGuardianController::class, 'index'])->name('admin.guardians');
    Route::post('/guardians', [AdminGuardianController::class, 'store'])->name('admin.guardians.store');
   
    Route::get('/kontaks', [AdminKontakController::class, 'index'])->name('admin.kontaks');
   
    Route::get('/profil', [AdminProfilController::class, 'index'])->name('admin.profil');
   
    Route::get('/classroom', [AdminClassroom::class, 'index'])->name('admin.classroom');
   
    Route::get('/teacher', [AdminTeacherController::class, 'index'])->name('admin.teacher'); 
    Route::post('/teacher', [AdminTeacherController::class, 'store'])->name('admin.teacher.store');
   
    Route::get('/subject', [AdminSubjectController::class, 'index'])->name('admin.subject'); 
    Route::post('/admin/subject/store', [AdminSubjectController::class, 'store'])->name('admin.subject.store');

});