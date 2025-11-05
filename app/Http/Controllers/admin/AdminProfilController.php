<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminProfilController extends Controller
{
    public function index()
    {
        return view('components.admin.profil', [
        'title'   => 'Profil',
        'nama'    => 'Caesaraya Junior Nugroho',
        'tanggal' => '7 Juli 2009',
        'kelas'   => 'XI RPL 1'
    ]);
    }

   
}
