<!-- 1. Hubungkan file Profile.blade.php dengan profapp.blade.php-->
@extends('layouts/profapp')

@section('title', 'Profil Mahasiswa')

@section('content')
<div class="profile-wrapper">
    <div class="profile-card animate-fadeup">
        <div class="profile-header">
            <div class="avatar animate-pop">
                <span>{{ substr($mahasiswa->nama, 0, 1) }}</span>
            </div>
            <div class="profile-identity">
                <h2>{{ $mahasiswa->nama }}</h2>
                <p>{{ $mahasiswa->nim }}</p>
            </div>
        </div>

        <div class="profile-info animate-delay">
            <div class="info-group">
                <span class="label">Program Studi</span>
                <span class="value">{{ $mahasiswa->prodi }}</span>
            </div>
            <div class="info-group">
                <span class="label">Fakultas</span>
                <span class="value">{{ $mahasiswa->fakultas }}</span>
            </div>
            <div class="info-group">
                <span class="label">Kelas</span>
                <span class="value">{{ $mahasiswa->kelas }}</span>
            </div>
            <div class="info-group">
                <span class="label">Email</span>
                <span class="value">{{ $mahasiswa->email }}</span>
            </div>
        </div>

        <div class="btn-wrapper animate-fadein">
            <!-- 9. Isi value atribut href agar mendirect menuju halaman dashboard-->
            <a href="{{ url()->previous() }}" class="btn-back">
                <i class="bi bi-arrow-left"></i> Dashboard
            </a>
        </div>
    </div>
</div>
@endsection
