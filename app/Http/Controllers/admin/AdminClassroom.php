<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Classroom;
use Illuminate\Http\Request;

class AdminClassroom extends Controller
{

    public function index()
    {
        $classrooms = Classroom::with('students')->get();

        // Kolom tabel
        $columns = [
            ['key' => 'index', 'label' => 'NO', 'sortable' => false],
            ['key' => 'name', 'label' => 'Nama Kelas', 'sortable' => true],
            [
                'key' => 'students',
                'label' => 'Daftar Siswa',
                'formatter' => function ($item) {
                    return $item->students->pluck('name')->join(', ');
                }
            ],
        ];

        // Field untuk form modal tambah
        $formFields = [
            [
                'name' => 'name',
                'label' => 'Nama Kelas',
                'type' => 'text',
                'required' => true,
                'placeholder' => 'Contoh: XII RPL 1'
            ],
        ];

        return view('admin.classroom.index', compact('classrooms', 'columns', 'formFields'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100'
        ]);

        Classroom::create([
            'name' => $request->name
        ]);

        return redirect()->back()->with('success', 'Kelas berhasil ditambahkan!');
    }

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
