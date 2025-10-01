<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfilController extends Controller
{
    public function index()
    {
        return view('profil', [
        'title'   => 'Profil',
        'nama'    => 'Caesaraya Junior Nugroho',
        'tanggal' => '7 Juli 2009',
        'kelas'   => 'XI RPL 1'
    ]);
    }

   
}

