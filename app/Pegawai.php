<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    protected $table = 'pegawai';

    protected $fillable = [
        'nama',
        'jenis_kelamin',
        'status_pernikahan',
        'tanggal_lahir',
        'alamat'
    ];

    protected $dates = [
        'tanggal_lahir',
    ];

    protected $dateFormat = 'Y-m-d';
}
