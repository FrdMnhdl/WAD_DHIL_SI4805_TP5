<?php

namespace App\Http\Controllers;

use App\Models\Kucing;
use Illuminate\Http\Request;

class KucingController extends Controller {

    public function index() {
        $data = Kucing::all();
        return view('DaftarKucing', compact('data'));
    }

    public function show($id) {
        $kucing = Kucing::findOrFail($id);
        return view('DetailKucing', compact('kucing'));
    }
}
