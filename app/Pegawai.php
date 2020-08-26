<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    // Nama Tabel
    protected $table = 'pegawai';

    // Kolom - kolom untuk mass assignment
    protected $fillable = [
        'nama',
        'jenis_kelamin',
        'status_pernikahan',
        'tanggal_lahir',
        'alamat'
    ];

    // Kolom tanggal
    protected $dates = [
        'tanggal_lahir',
    ];

    // Format Tanggal
    protected $dateFormat = 'Y-m-d';
}
