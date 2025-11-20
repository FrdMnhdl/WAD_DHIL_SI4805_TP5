<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class HomeController extends Controller
{
    // ===============1==============
    // Ambil semua buku dari database, urutkan dari yang terbaru, dan kirimkan ke view 'home'.
    public function index()
    {
        $books = book::latest()->get();
        return view('home', compact('books'));
    }
}
