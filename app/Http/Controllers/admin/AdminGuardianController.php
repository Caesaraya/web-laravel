<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Guardian;
use Illuminate\Http\Request;

class AdminGuardianController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->query('search');

        $guardians = Guardian::when($search, function ($query, $search) {
                $query->where('name', 'like', "%{$search}%")
                      ->orWhere('job', 'like', "%{$search}%")
                      ->orWhere('phone', 'like', "%{$search}%")
                      ->orWhere('email', 'like', "%{$search}%");
            })
            ->paginate(5)
            ->withQueryString(); 


        // Kolom untuk table component
        $columns = [
            ['key' => 'index', 'label' => 'NO', 'sortable' => false],
            ['key' => 'name', 'label' => 'Nama', 'sortable' => true],
            ['key' => 'job', 'label' => 'Pekerjaan', 'sortable' => true],
            ['key' => 'phone', 'label' => 'No HP', 'sortable' => false],
            ['key' => 'email', 'label' => 'Email', 'sortable' => true],
        ];

        // Fields form modal
        $formFields = [
            [
                'name' => 'name',
                'label' => 'Nama Lengkap',
                'type' => 'text',
                'required' => true,
                'placeholder' => 'Masukkan nama lengkap'
            ],
            [
                'name' => 'job',
                'label' => 'Pekerjaan',
                'type' => 'text',
                'required' => true,
                'placeholder' => 'Masukkan pekerjaan'
            ],
            [
                'name' => 'phone',
                'label' => 'No HP',
                'type' => 'text',
                'required' => true,
                'placeholder' => '08xxxxxxxxxx'
            ],
            [
                'name' => 'email',
                'label' => 'Email',
                'type' => 'email',
                'required' => true,
                'placeholder' => 'email@email.com'
            ]
        ];

        return view('admin.guardian.index', compact('guardians', 'columns', 'formFields'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'  => 'required|string|max:255',
            'job'   => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|unique:guardians,email',
        ]);

        Guardian::create($validated);

        return redirect()->back()->with('success', 'Data guardian berhasil ditambahkan!');
    }

    public function update(Request $request, Guardian $guardian)
    {
        $validated = $request->validate([
            'name'  => 'required|string|max:255',
            'job'   => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|unique:guardians,email,' . $guardian->id,
        ]);

        $guardian->update($validated);

        return redirect()->back()->with('success', 'Data guardian berhasil diperbarui!');
    }

    public function destroy(Guardian $guardian)
    {
        $guardian->delete();

        return redirect()->back()->with('success', 'Data guardian berhasil dihapus!');
    }
}
