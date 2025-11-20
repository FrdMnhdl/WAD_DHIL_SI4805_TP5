@extends('layouts.app')

@section('content')
{{-- Flash Messages --}}
@if(session('error') || session('success'))
    @php
        $type = session('error') ? 'error' : 'success';
        $message = session($type);
        $alertClass = $type === 'error' ? 'alert-danger' : 'alert-success';
        $id = $type . '-message';
    @endphp

    <div id="{{ $id }}" class="alert {{ $alertClass }} alert-dismissible fade show" role="alert">
        <span>{{ $message }}</span>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

    <script>
        setTimeout(() => {
            const el = document.getElementById('{{ $id }}');
            if (el) {
                const alert = new bootstrap.Alert(el);
                alert.close();
            }
        }, 5000);
    </script>
@endif

{{-- Bagian Hero --}}
<div class="row mb-5">
    <div class="col-12">
        <div class="bg-gradient p-5 rounded-3" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
            @auth
                <h1 class="display-5 fw-bold mb-2">Selamat Datang Kembali, {{ Auth::user()->name }}! 👋</h1>
                <p class="fs-5 mb-4">Jelajahi buku-buku dalam koleksi perpustakaan kami</p>
            @else
                <h1 class="display-5 fw-bold mb-2">Selamat Datang di Perpustakaan Kami! <img src="ead.jpg" width="50"></h1>
                <p class="fs-5">Masuk untuk mengakses koleksi lengkap kami dan mengelola daftar bacaan Anda</p>
            @endauth
        </div>
    </div>
</div>

@if (session('status'))
    <div class="row mb-4">
        <div class="col-12">
            <div class="alert alert-info alert-dismissible fade show" role="alert">
                <i class="bi bi-info-circle me-2"></i>
                {{ session('status') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Tutup"></button>
            </div>
        </div>
    </div>
@endif

{{-- Header Bagian Buku Unggulan --}}
<div class="row mb-4">
    <div class="col-12">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <h2 class="h3 fw-bold mb-1">Tambahan Terbaru</h2>
                <p class="text-muted">Temukan rilis buku terbaru kami</p>
            </div>
            @auth
                @if(auth()->user()->role === 'admin')
                <!-- ======================1====================== -->
                <!-- Tampilkan tombol untuk ke halaman books.index -->
                    <a href="{{ route('books.index') }}" class="btn btn-outline-primary btn-sm">
                        Kelola Buku <i class="bi bi-arrow-right"></i>
                    </a>
                @endif
            @endauth
        </div>
    </div>
</div>

{{-- Bagian Carousel/Grid Buku --}}
<div class="row">
    <div class="col-12">
        <div class="row row-cols-1 row-cols-md-3 g-4">
            @forelse ($books as $book)
                <div class="col">
                    @auth
                    <div class="card h-100">
                        <div class="text-white d-flex align-items-center justify-content-center">
                            @if ($book->cover_image && file_exists(public_path('storage/' . $book->cover_image)))
                                <img src="{{ asset('storage/' . $book->cover_image) }}" 
                                    alt="Sampul {{ $book->title }}" 
                                    class="img-fluid rounded-start w-fit h-fit object-fit-cover">
                            @else
                                <i class="bi bi-book" style="font-size: 4rem;"></i>
                            @endif
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">{{ $book->title }}</h5>
                            <h6 class="card-subtitle mb-2 text-muted">Oleh {{ $book->author }}</h6>
                            <p class="card-text">{{ Str::limit($book->description, 100) }}</p>
                            <div class="d-flex justify-content-between align-items-center mt-3 pt-2 border-top">
                                <small class="text-muted">Tahun Rilis: {{ $book->published_year }}</small>
                                <a href="{{ route('books.show', $book) }}" class="btn btn-outline-primary btn-sm">
                                    Lihat Detail
                                </a>
                            </div>
                        </div>
                    </div>
                    @endauth
                    @guest
                        <div class="col-12">
                            <div class="text-center py-5">
                                <i class="bi bi-inbox" style="font-size: 3rem; color: #ccc;"></i>
                                <p class="text-muted mt-3">Masuk untuk melihat buku yang tersedia</p>
                            </div>
                        </div>
                    @endguest
                </div>
            @empty
                <div class="col-12">
                    <div class="text-center py-5">
                        <i class="bi bi-inbox" style="font-size: 3rem; color: #ccc;"></i>
                        <p class="text-muted mt-3">Belum ada buku yang tersedia saat ini. Periksa kembali nanti!</p>
                    </div>
                </div>
            @endforelse
        </div>
    </div>
</div>



@endsection