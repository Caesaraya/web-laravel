<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Http\Request;

class AdminTeacherController extends Controller
{
    public function index()
    {
        $teacher = Teacher::with('subject')->get();
        $subjects = Subject::all(); // 🔹 Tambahkan ini untuk dropdown

        return view('admin.teacher', [
            'title' => 'Data Guru',
            'teacher' => $teacher,
            'subjects' => $subjects // 🔹 kirim ke view
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'email'       => 'required|email|unique:teachers,email',
            'phone'       => 'required|string|max:20',
            'address'     => 'required|string|max:255',
            'subject_id'  => 'required|exists:subjects,id', // 🔹 ubah jadi ambil subject yang sudah ada
        ]);

        Teacher::create([
            'name'       => $request->name,
            'email'      => $request->email,
            'phone'      => $request->phone,
            'address'    => $request->address,
            'subject_id' => $request->subject_id,
        ]);

        return redirect()->route('admin.teacher')
            ->with('success', 'Guru berhasil ditambahkan!');
    }
}
