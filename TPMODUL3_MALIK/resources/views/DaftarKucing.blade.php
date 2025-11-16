@extends('layouts.dashboard')

@section('title', 'Daftar Kucing')

@section('content')
    <div class="text-center mb-4">
        <h1 class="cat-title">🐾 Daftar Kucing Peliharaan 🐾</h1>
        <p class="cat-subtitle">Klik nama kucing untuk melihat detailnya</p>
    </div>

    <div class="row justify-content-center">
        {{-- 1. Buat perulangan foreach untuk menampung informasi setiap kucing --}}
        @foreach ($data as $k)
            <div class="col-md-4 mb-3">
                <div class="cat-card text-center">
                    {{-- 2. Panggil variabel untuk menampilkan nama kucing --}}
                    <h4>{{ $k->nama_kucing }}</h4>
                    {{-- 3. Panggil variabel untuk menampilkan ras --}}
                    <p class="text-muted">{{ $k->ras }}</p>
                    {{-- 4. Isi value untuk atribut href agar mendirect ke halaman detail kucing yang dipilih --}}
                    <a href="{{ url('kucing/' . $k->id) }}" class="btn btn-custom btn-sm">Lihat Detail</a>
                </div>
            </div>
        @endforeach
    </div>
@endsection