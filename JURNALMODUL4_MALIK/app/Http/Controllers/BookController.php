<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    // ===============1==============
    // Ambil semua buku dari database, urutkan dari yang terbaru, dan kirimkan ke view 'books.index'.
    public function index()
    {
        $books = book::latest()->get();
        return view('books.index', compact('books'));
    }

    // ===============2==============
    // Tampilkan detail buku tertentu berdasarkan buku dari parameter.
    public function show(Book $book)
    {
        return view('books.show', compact('book'));
    }

    // ===============3==============
    // Tampilkan form untuk menambahkan buku baru.
    public function create()
    {
        return view('books.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'author' => 'required|max:255',
            'isbn' => 'required|unique:books',
            'description' => 'required',
            'published_year' => 'required|integer|min:1800|max:' . date('Y'),
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        if ($request->hasFile('cover_image')) {
            $validated['cover_image'] = $request->file('cover_image')->store('covers', 'public');
        }

        Book::create($validated);
        return redirect()->route('books.index')->with('success', 'Book added successfully!');
    }


    // ===============4==============
    // Tampilkan form untuk mengedit buku tertentu berdasarkan buku dari parameter.
    public function edit(Book $book)
    {
        return view('books.edit', compact('book'));
    }

    public function update(Request $request, Book $book)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'author' => 'required|max:255',
            'isbn' => 'required|unique:books,isbn,' . $book->id,
            'description' => 'required',
            'published_year' => 'required|integer|min:1800|max:' . date('Y'),
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);
        if ($request->hasFile('cover_image')) {
            if ($book->cover_image) {
                Storage::disk('public')->delete($book->cover_image);
            }
            $validated['cover_image'] = $request->file('cover_image')->store('covers', 'public');
        }
        $book->update($validated);
        return redirect()->route('books.index')->with('success', 'Book updated successfully!');
    }
    
    // ===============5==============
    // Hapus buku tertentu berdasarkan buku dari parameter.
    // Jika buku memiliki gambar sampul, hapus juga gambar tersebut dari penyimpanan.
    // Akhirnya, alihkan kembali ke daftar buku dengan pesan sukses.
    public function destroy(Book $book)
    {
        $book->delete();
        session()->flash('success', 'Buku berhasil dihapus!');
        return redirect()->route('books.index');
    }
}