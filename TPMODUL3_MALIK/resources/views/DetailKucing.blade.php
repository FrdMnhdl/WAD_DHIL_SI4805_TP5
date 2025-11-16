@extends('layouts.dashboard')

@section('title', 'Detail Kucing')

@section('content')
<div class="cat-card mx-auto" style="max-width: 600px;">
    <h2 class="cat-title mb-3 text-center">{{ $kucing->nama_kucing }}</h2>
    <ul class="list-group list-group-flush">
        <li class="list-group-item"><strong>Ras:</strong> {{ $kucing->ras }}</li>
        <li class="list-group-item"><strong>Warna Bulu:</strong> {{ $kucing->warna_bulu }}</li>
        <li class="list-group-item"><strong>Usia:</strong> {{ $kucing->usia }} tahun</li>
        <li class="list-group-item"><strong>Deskripsi:</strong> {{ $kucing->deskripsi }}</li>
    </ul>
    <div class="text-center mt-4">
        <a href="/kucing" class="btn btn-custom">Kembali ke Daftar</a>
    </div>
</div>
@endsection