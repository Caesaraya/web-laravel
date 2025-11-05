<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Classroom;

class AdminStudentController extends Controller
{
    
     public function index()
    {
        $student = Student::all();
        $classrooms = Classroom::all(); // ← ini penting buat form dropdown kelas

        return view('components.admin.students', [
            'title' => 'Data Student',
            'student' => $student,
            'classrooms' => $classrooms
        ]);
    }

public function store(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'birthday' => 'required|date',
        'email' => 'required|email|unique:students',
        'address' => 'required|string',
        'classroom_id' => 'required|exists:classrooms,id',
    ]);

    Student::create($validated);

    // ✅ setelah create, kembali ke halaman sebelumnya (students view)
    return redirect()->back()->with('success', 'Data student berhasil ditambahkan!');
}

    /**
     * Show the form for creating a new resource.
     */

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
