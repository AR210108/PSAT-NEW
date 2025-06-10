<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $table = 'siswa';

    // Kolom yang boleh diisi
    protected $fillable = [
        'nama',
        'nis',
        'kelas_id',       // Ganti dari 'kelas' ke 'kelas_id'
        'jenis_kelamin',
        'alamat',
        'foto',
    ];

    // Relasi ke model Kelas
    public function kelas()
{
    return $this->belongsTo(Kelas::class, 'kelas_id'); // sesuaikan nama foreign key
}

}
