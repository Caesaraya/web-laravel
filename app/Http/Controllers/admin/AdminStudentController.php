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
        $students = Student::with('classroom')->get();
        // Mengambil semua data siswa dari database
        $classrooms = Classroom::all();
        
        // Konfigurasi kolom untuk table component
        $columns = [
        // Mendefinisikan array yang berisi metadata tentang kolom tabel, yang akan digunakan komponen x-table.
            ['key' => 'index', 'label' => 'NO', 'sortable' => false],
            ['key' => 'name', 'label' => 'Nama', 'sortable' => true],
            ['key' => 'email', 'label' => 'Email', 'sortable' => true],
            ['key' => 'birthday', 'label' => 'Tanggal Lahir', 'format' => 'date', 'sortable' => true],
            ['key' => 'address', 'label' => 'Alamat', 'sortable' => false],
            [
                'key' => 'classroom', 
                'label' => 'Kelas', 
                'relation' => 'classroom', 
                'relation_key' => 'name',
                'sortable' => false
            ],
        ];
        
        // Konfigurasi fields untuk form component
        $formFields = [
        // Mendefinisikan array yang berisi tentang data yang akan di input,
            [
                'name' => 'name',
                'label' => 'Nama Lengkap',
                'type' => 'text',
                'required' => true,
                'placeholder' => 'Masukkan nama lengkap'
            ],
            [
                'name' => 'email',
                'label' => 'Email',
                'type' => 'email', 
                'required' => true,
                'placeholder' => 'nama@email.com'
            ],
            [
                'name' => 'birthday',
                'label' => 'Tanggal Lahir',
                'type' => 'date',
                'required' => true
            ],
            [
                'name' => 'address',
                'label' => 'Alamat',
                'type' => 'textarea',
                'required' => false,
                'placeholder' => 'Masukkan alamat lengkap',
                'rows' => 3
            ],
            [
                'name' => 'classroom_id',
                'label' => 'Kelas',
                'type' => 'select',
                'required' => true,
                'options' => $classrooms->map(function($classroom) {
                    return [
                        'value' => $classroom->id,
                        'label' => $classroom->name
                    ];
                })->toArray()
                // Menggunakan koleksi $classrooms untuk membuat array opsi yang sesuai dengan format ID kelas dan label(nama kelas) yang dibutuhkan oleh komponen form.
            ]
        ];
        
        return view('admin.students.index', compact('students', 'classrooms', 'columns', 'formFields'));
        // mengirimkan semua variabel yang telah disiapkan ($students, $classrooms, $columns, $formFields) ke View
    }

    public function store(Request $request)
    {
        $validated = $request->validate ([
        // Memvalidasi semua input dari $request. Jika validasi gagal, Laravel akan otomatis mengarahkan kembali ke halaman sebelumnya
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email',
            'birthday' => 'required|date|before:today',
            'address' => 'nullable|string',
            'classroom_id' => 'required|exists:classrooms,id',
        ]);

        Student::create($validated);

        return redirect()->back()->with('success', 'Data siswa berhasil ditambahkan!');
        // Mengarahkan pengguna kembali ke halaman sebelumnya dan mengirimkan pesan success yang akan ditampilkan di View.
    }

    public function update(Request $request, Student $student)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email,' . $student->id,
            'birthday' => 'required|date|before:today',
            'address' => 'nullable|string',
            'classroom_id' => 'required|exists:classrooms,id',
        ]);

        $student->update($validated);

        return redirect()->back()->with('success', 'Data siswa berhasil diperbarui!');
    }

    public function destroy(Student $student)
    {
        $student->delete();

        return redirect()->back()->with('success', 'Data siswa berhasil dihapus!');
    }
}
