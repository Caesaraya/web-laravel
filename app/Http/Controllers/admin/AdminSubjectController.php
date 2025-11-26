<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Subject;
use Illuminate\Http\Request;

class AdminSubjectController extends Controller
{
 public function index()
    {
        $subjects = Subject::with('teacher')->get();

        // Kolom tabel
        $columns = [
            ['key' => 'index', 'label' => 'NO', 'sortable' => false],
            ['key' => 'name', 'label' => 'Nama Mata Pelajaran', 'sortable' => true],
            [
                'key' => 'teacher',
                'label' => 'Guru Pengampu',
                'formatter' => function ($item) {
                    return $item->teacher->name ?? '-';
                }
            ],
        ];

        // Field modal tambah
        $formFields = [
            [
                'name' => 'name',
                'label' => 'Nama Mata Pelajaran',
                'type' => 'text',
                'required' => true,
                'placeholder' => 'Contoh: Matematika'
            ],
        ];

        return view('admin.subject.index', compact('subjects', 'columns', 'formFields'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
        ]);

        Subject::create([
            'name' => $request->name
        ]);

        return redirect()->back()->with('success', 'Subject berhasil ditambahkan!');
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
