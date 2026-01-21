<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\GuardianController;
use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\SubjectController;

// ADMIN
use App\Http\Controllers\admin\AdminStudentController;
use App\Http\Controllers\admin\AdminGuardianController;
use App\Http\Controllers\admin\AdminClassroom;
use App\Http\Controllers\admin\AdminTeacherController;
use App\Http\Controllers\admin\AdminSubjectController;
use App\Http\Controllers\admin\AdminKontakController;
use App\Http\Controllers\admin\AdminProfilController;

/*
|--------------------------------------------------------------------------
| PUBLIC
|--------------------------------------------------------------------------
*/
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/profil', [ProfilController::class, 'index'])->name('profil');
Route::get('/kontak', [KontakController::class, 'index'])->name('kontak');

/*
|--------------------------------------------------------------------------
| AUTH
|--------------------------------------------------------------------------
*/
Route::get('/login', [AuthController::class, 'show_login'])
    ->name('login')
    ->middleware('guest');

Route::post('/login', [AuthController::class, 'login'])
    ->name('login.process');

Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout');

/*
|--------------------------------------------------------------------------
| USER (LOGIN SAJA)
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {
    Route::get('/student', [StudentController::class, 'index'])->name('student');
    Route::get('/guardian', [GuardianController::class, 'index'])->name('guardian');
    Route::get('/classroom', [ClassroomController::class, 'index'])->name('classroom');
    Route::get('/teacher', [TeacherController::class, 'index'])->name('teacher');
    Route::get('/subject', [SubjectController::class, 'index'])->name('subject');
});

/*
|--------------------------------------------------------------------------
| ADMIN (ROLE = admin)
|--------------------------------------------------------------------------
*/
Route::prefix('admin')
    ->name('admin.')
    ->middleware(['auth', 'role:admin'])
    ->group(function () {

        Route::get('/dashboard', function () {
            return view('admin.dashboard');
        })->name('dashboard');

        Route::resource('students', AdminStudentController::class);
        Route::resource('guardians', AdminGuardianController::class);
        Route::resource('classrooms', AdminClassroom::class);
        Route::resource('teachers', AdminTeacherController::class);
        Route::resource('subjects', AdminSubjectController::class);

        Route::get('/kontaks', [AdminKontakController::class, 'index'])->name('kontaks');
        Route::get('/profil', [AdminProfilController::class, 'index'])->name('profil');
    });
