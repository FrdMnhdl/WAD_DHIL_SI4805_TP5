@extends('layouts.app')

@section('content')
<div class="row">
   <div class="col-md-8 offset-md-2">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Tambah Buku Baru</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('books.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    {{-- Judul --}}
                    <div class="mb-3">
                        <label for="title" class="form-label">Judul</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" 
                            id="title" name="title" value="{{ old('title') }}" required maxlength="255">
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Penulis --}}
                    <div class="mb-3">
                        <label for="author" class="form-label">Penulis</label>
                        <input type="text" class="form-control @error('author') is-invalid @enderror" 
                            id="author" name="author" value="{{ old('author') }}" required maxlength="255">
                        @error('author')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- ISBN --}}
                    <div class="mb-3">
                        <label for="isbn" class="form-label">ISBN</label>
                        <input type="text" class="form-control @error('isbn') is-invalid @enderror" 
                            id="isbn" name="isbn" value="{{ old('isbn') }}" required>
                        @error('isbn')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Deskripsi --}}
                    <div class="mb-3">
                        <label for="description" class="form-label">Deskripsi</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" 
                                id="description" name="description" rows="4" required>{{ old('description') }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Tahun Terbit --}}
                    <div class="mb-3">
                        <label for="published_year" class="form-label">Tahun Terbit</label>
                        <input type="number" class="form-control @error('published_year') is-invalid @enderror" 
                            id="published_year" name="published_year" 
                            value="{{ old('published_year') }}" 
                            min="1800" max="{{ date('Y') }}" required>
                        @error('published_year')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Gambar Sampul --}}
                    <div class="mb-3">
                        <label for="cover_image" class="form-label">Gambar Sampul</label>
                        <input type="file" class="form-control @error('cover_image') is-invalid @enderror" 
                            id="cover_image" name="cover_image" accept=".jpeg,.jpg,.png">
                        @error('cover_image')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Tombol Submit --}}
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">Tambah Buku</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
@endsection