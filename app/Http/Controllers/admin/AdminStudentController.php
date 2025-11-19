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
    $student = Student::with('classroom')->get();
    // Mengambil semua data siswa dari database menggunakan model Student.
    // ini berarti data (classroom) yang berelasi dengan setiap siswa

    return view('admin.student.students', [
        'title' => 'Data Student',
        'student' => $student,
    ]);
}

public function store(Request $request)
{
    $validated = $request->validate([
//  Melakukan Validasi data yang dikirim (request) sesuai aturan yang ditentukan:    
        'name' => 'required|string|max:255',
        'birthday' => 'required|date',
        'email' => 'required|email|unique:students',
        'address' => 'required|string',
        'classroom_id' => 'required|exists:classrooms,id',
    ]);

    Student::create($validated);
//  Membuat record siswa baru di database menggunakan data yang sudah divalidasi.
    return redirect()->route('admin.student.students')
        ->with('success', 'Data student berhasil ditambahkan!');
}

public function update(Request $request, $id)
{
    $validated = $request->validate([
//  Melakukan Validasi data seperti pada fungsi store.
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:students,email,' . $id,
        'address' => 'required|string',
        'birthday' => 'required|date',
        'classroom_id' => 'required|exists:classrooms,id',
    ]);

    $student = Student::findOrFail($id);
//  Mencari data siswa di database berdasarkan $id.
//  findOrFail akan menghentikan eksekusi dan menampilkan halaman 404 jika data siswa tidak ditemukan.
    $student->update($validated);
//  Memperbarui data siswa yang ditemukan dengan data yang sudah divalidasi.
    return redirect()->back()->with('success', 'Data student berhasil diupdate!');
}

public function destroy(string $id)
{
    Student::findOrFail($id)->delete();

    return redirect()->route('admin.student.students')
        ->with('success', 'Data berhasil dihapus');
}


}
