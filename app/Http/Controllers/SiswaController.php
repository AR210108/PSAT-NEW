<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    // Menampilkan daftar siswa, dengan opsi filter berdasarkan jenjang, jurusan, kelas, dan pencarian nama
    public function index(Request $request)
    {
        $query = Siswa::query();

        // Filter berdasarkan jenjang (contoh: X, XI, XII)
        if ($request->filled('jenjang')) {
            $query->where('kelas', 'like', $request->jenjang . '%');
        }

        // Filter berdasarkan jurusan (contoh: RPL, TKJ)
        if ($request->filled('jurusan')) {
            $query->where('kelas', 'like', '%' . $request->jurusan . '%');
        }

        // Filter berdasarkan subkelas (contoh: A, B, C)
        if ($request->filled('kelas')) {
            $query->where('kelas', 'like', '% ' . $request->kelas);
        }

        // Filter berdasarkan nama siswa (fitur pencarian)
        if ($request->filled('search')) {
            $query->where('nama', 'like', '%' . $request->search . '%');
        }

        // Ambil semua data siswa yang sudah difilter, urut berdasarkan nama
        $siswa = $query->orderBy('nama')->get();

        // Tampilkan ke view siswa/index.blade.php
        return view('siswa.index', compact('siswa'));
    }

    // Menampilkan form tambah siswa
    public function create()
    {
        return view('siswa.create');
    }

    // Menyimpan data siswa baru ke database
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required',
            'nis' => 'required|unique:siswa', // NIS harus unik
            'kelas' => 'required',
        ], [
            'nis.unique' => 'NIS sudah terdaftar. Harap gunakan NIS lain.'
        ]);

        $data = $request->all();

        // Simpan foto jika ada file diunggah
        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('foto_siswa', 'public');
        }

        // Simpan data ke tabel siswa
        Siswa::create($data);

        // Redirect kembali ke halaman daftar siswa dengan pesan sukses
        return redirect('/siswa')->with('success', 'Data berhasil ditambahkan');
    }

    // Menampilkan form edit untuk data siswa tertentu
    public function edit($id)
    {
        $siswa = Siswa::findOrFail($id); // Cari siswa berdasarkan ID
        return view('siswa.edit', compact('siswa'));
    }

    // Memperbarui data siswa yang sudah ada
    public function update(Request $request, $id)
    {
        $siswa = Siswa::findOrFail($id);

        // Validasi input, NIS harus unik kecuali milik dirinya sendiri
        $request->validate([
            'nama' => 'required',
            'nis' => 'required|unique:siswa,nis,' . $id,
            'kelas' => 'required',
        ], [
            'nis.unique' => 'NIS sudah digunakan oleh siswa lain.'
        ]);

        $data = $request->all();

        // Update foto jika ada file baru diunggah
        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('foto_siswa', 'public');
        }

        // Update data siswa
        $siswa->update($data);

        return redirect('/siswa')->with('success', 'Data berhasil diubah');
    }

    // Menghapus data siswa berdasarkan ID
    public function destroy($id)
    {
        $siswa = Siswa::findOrFail($id);
        $siswa->delete();

        return redirect('/siswa')->with('success', 'Data berhasil dihapus');
    }
}
