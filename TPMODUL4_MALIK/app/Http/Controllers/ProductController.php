<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// 1. Import model Product
use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    // 2. tampilkan daftar semua produk dari tabel product menggunakan compact
    public function index()
    {
        // isi disini
        $products = Product::all();
        return view('admin.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */

    // 3. tampilkan form untuk menambah produk baru
    public function create()
    {
        // isi disini
        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     */

    // 4. simpan produk baru ke dalam tabel products
    public function store(Request $request)
    {
        // Validasi input data produk:
        // - 'name' wajib diisi
        // - 'description' wajib diisi
        // - 'price' wajib diisi, harus berupa angka, dan minimal bernilai 0
        // - 'image' bersifat opsional, namun jika diisi harus berupa file gambar
        //   dengan format jpeg, png, jpg, gif, atau svg, dan ukuran maksimal 2MB
        $request->validate([
            // isi disini
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $productData = $request->only('name', 'description', 'price');

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public');
            $productData['image'] = $imagePath;
        }

        Auth::user()->products()->create($productData);

        session()->flash('success', 'Produk berhasil dibuat!');
        return redirect()->route('admin.index');
    }

    /**
     * Display the specified resource.
     */

    // 5. Ambil data produk berdasarkan id dan tampilkan di halaman detail produk
    public function show(string $id)
    {
       // isi disini
        $product = Product::findOrFail($id);
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */

    // 6. Tampilkan form edit produk berdasarkan id
    public function edit(string $id)
    {
        // isi disini
        $product = Product::findOrFail($id);
        return view('admin.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */

    // 7. Simpan perubahan data produk berdasarkan id
    public function update(Request $request, string $id)
    {
        // Cari produk berdasarkan id
        $product = Product::findOrFail($id);

        // Validasi input data produk:
        // - 'name' wajib diisi
        // - 'description' wajib diisi
        // - 'price' wajib diisi, harus berupa angka, dan minimal bernilai 0
        // - 'image' bersifat opsional, namun jika diisi harus berupa file gambar
        //   dengan format jpeg, png, jpg, gif, atau svg, dan ukuran maksimal 2MB
        $request->validate([
            // isi disini
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $productData = $request->only('name', 'description', 'price');

        if ($request->hasFile('image')) {
            if ($product->image) {
                Storage::delete('public/' . $product->image);
            }

            $imagePath = $request->file('image')->store('products', 'public');
            $productData['image'] = $imagePath;
        }

        $product->update($productData);

        session()->flash('success', 'Produk berhasil diperbarui!');
        return redirect()->route('admin.index');
    }

    /**
     * Remove the specified resource from storage.
     */

    // 8. Hapus produk berdasarkan id
    public function destroy(string $id)
    {
        // isi disini
        $product = Product::findOrFail($id);
        $product->delete();

        session()->flash('success', 'Produk berhasil dihapus!');
        return redirect()->route('admin.index');
    }
}