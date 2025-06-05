<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model {
    // Menentukan nama tabel yang digunakan oleh model ini
    protected $table = 'siswa';

    // Daftar kolom yang boleh diisi secara massal (mass assignment)
    protected $fillable = [
        'nama',          // Nama siswa
        'nis',           // Nomor Induk Siswa (harus unik)
        'kelas',         // Kelas siswa (misal: X RPL 1)
        'jenis_kelamin', // Jenis kelamin (Laki-laki / Perempuan)
        'alamat',        // Alamat tempat tinggal siswa
        'foto'           // Path atau nama file foto siswa
    ];
}
