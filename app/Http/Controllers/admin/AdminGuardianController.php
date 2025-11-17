<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Guardian;
use Illuminate\Http\Request;

class AdminGuardianController extends Controller
{
        
    public function index()
    {$guardian = Guardian::all();
        return view('admin.guardians', [
       'title' => 'Data Orang tua',
       'guardian' => $guardian
    ]);
    }

    /**
     * Show the form for creating a new resource.
     */
public function create()
{
    return view('components.admin.guardians-create', [
        'title' => 'Tambah Guardian'
    ]);
}


    /**
     * Store a newly created resource in storage.
     */
public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'job' => 'required|string|max:255',
        'phone' => 'required|string|max:20',
        'email' => 'required|email|max:255',
    ]);

    Guardian::create($request->all());

    return redirect()->route('admin.guardians')->with('success', 'Guardian berhasil ditambahkan!');
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
