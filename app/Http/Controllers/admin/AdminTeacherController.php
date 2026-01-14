<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Teacher;
use App\Models\Subject;

class AdminTeacherController extends Controller
{
    public function index(Request $request)
    {
         $search = $request->query('search');
        $teachers = Teacher::with('subject')->when($search, function ($query, $search) {
            $query->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('address', 'like', "%{$search}%");
        })
        ->paginate(4)
        ->withQueryString(); 
         
        $subjects = Subject::doesntHave('teacher')->get();

        // Konfigurasi kolom table (SAMA FORMAT DGN STUDENT)
        $columns = [
            ['key' => 'index', 'label' => 'NO', 'sortable' => false],
            ['key' => 'name', 'label' => 'Nama', 'sortable' => true],
            [
                'key' => 'subject',
                'label' => 'Mata Pelajaran',
                'relation' => 'subject',
                'relation_key' => 'name',
                'sortable' => false,
            ],
            ['key' => 'phone', 'label' => 'Telepon', 'sortable' => false],
            ['key' => 'email', 'label' => 'Email', 'sortable' => true],
            ['key' => 'address', 'label' => 'Alamat', 'sortable' => false],
        ];

        // Form fields (SAMA FORMAT DGN STUDENT)
        $formFields = [
            [
                'name' => 'name',
                'label' => 'Nama Lengkap',
                'type' => 'text',
                'required' => true,
                'placeholder' => 'Masukkan nama lengkap'
            ],
            [
                'name' => 'subject_id',
                'label' => 'Mata Pelajaran',
                'type' => 'select',
                'required' => true,
                'options' => $subjects->map(function($subject) {
                    return [
                        'value' => $subject->id,
                        'label' => $subject->name
                    ];
                })->toArray()
            ],
            [
                'name' => 'phone',
                'label' => 'Telepon',
                'type' => 'text',
                'required' => true,
                'placeholder' => '08xxxx'
            ],
            [
                'name' => 'email',
                'label' => 'Email',
                'type' => 'email',
                'required' => true,
                'placeholder' => 'email@example.com'
            ],
            [
                'name' => 'address',
                'label' => 'Alamat',
                'type' => 'textarea',
                'required' => false,
                'rows' => 3
            ],
        ];

        return view('admin.teachers.index', compact('teachers', 'subjects', 'columns', 'formFields'))
            ->with('title', 'Data Guru');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'       => 'required|string|max:255',
            'subject_id' => 'required|exists:subjects,id',
            'phone'      => 'required|string|max:20',
            'email'      => 'required|email|unique:teachers,email',
            'address'    => 'nullable|string',
        ]);

        Teacher::create($validated);

        return redirect()->back()->with('success', 'Data guru berhasil ditambahkan!');
    }

    public function update(Request $request, Teacher $teacher)
    {
        $validated = $request->validate([
            'name'       => 'required|string|max:255',
            'subject_id' => 'required|exists:subjects,id',
            'phone'      => 'required|string|max:20',
            'email'      => 'required|email|unique:teachers,email,' . $teacher->id,
            'address'    => 'nullable|string',
        ]);

        $teacher->update($validated);

        return redirect()->back()->with('success', 'Data guru berhasil diperbarui!');
    }

    public function destroy(Teacher $teacher)
    {
        $teacher->delete();

        return redirect()->back()->with('success', 'Data guru berhasil dihapus!');
    }
}
