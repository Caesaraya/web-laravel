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

        return view('components.admin.teacher', [
            'title' => 'Data Guru',
            'teacher' => $teacher
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'email'       => 'required|email|unique:teachers,email',
            'phone'       => 'required|string|max:20',
            'address'     => 'required|string',
            'subject_name'=> 'required|string|max:255',
        ]);

        // Buat subject baru
        $subject = Subject::create([
            'name' => $request->subject_name,
        ]);

        // Buat guru yang terhubung ke subject itu
        Teacher::create([
            'name'       => $request->name,
            'email'      => $request->email,
            'phone'      => $request->phone,
            'address'    => $request->address,
            'subject_id' => $subject->id,
        ]);

        return redirect()->back()->with('success', 'Guru dan subject berhasil ditambahkan!');
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
//

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
    }}
