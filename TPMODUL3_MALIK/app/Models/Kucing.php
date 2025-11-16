<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kucing extends Model {
    use HasFactory;

    protected $fillable = [
        'nama_kucing',
        'ras',
        'warna_bulu',
        'usia',
        'deskripsi'
    ];
}
