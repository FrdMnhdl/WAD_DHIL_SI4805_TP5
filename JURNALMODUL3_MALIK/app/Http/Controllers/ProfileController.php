<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
# 1. Import model User agar dapat digunakan di dalam controller.

class ProfileController extends Controller
{

    public function index()
    {
        $mahasiswa = User::first();
        return view('Profile',compact('mahasiswa'));
        # 2. Ambil satu data mahasiswa dari model User menggunakan fungsi first().
        # 3. Kirim data mahasiswa ke view profile menggunakan fungsi compact().
    }

}
