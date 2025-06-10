<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Kelas;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index(Request $request)
    {
        $query = Siswa::with('kelas'); // ambil relasi kelas

        // Filter jenjang (kelas awal X, XI, XII)
        if ($request->filled('jenjang')) {
            $query->whereHas('kelas', function ($q) use ($request) {
                $q->where('nama_kelas', 'like', $request->jenjang . '%');
            });
        }

        // Filter jurusan
        if ($request->filled('jurusan')) {
            $query->whereHas('kelas', function ($q) use ($request) {
                $q->where('nama_kelas', 'like', '%' . $request->jurusan . '%');
            });
        }

        // Filter kelas (subkelas)
        if ($request->filled('kelas')) {
            $query->whereHas('kelas', function ($q) use ($request) {
                $q->where('nama_kelas', 'like', '% ' . $request->kelas);
            });
        }

        // Filter pencarian nama
        if ($request->filled('search')) {
            $query->where('nama', 'like', '%' . $request->search . '%');
        }

        // Ambil data siswa dengan urutan nama dan pagination
        $siswa = $query->orderBy('nama')->paginate(10);

        // Ambil daftar kelas unik dari tabel kelas
        $listKelas = Kelas::select('nama_kelas')->distinct()->pluck('nama_kelas');

        return view('siswa.index', compact('siswa', 'listKelas'));
    }

    public function create()
{
    $kelasList = Kelas::select('id', 'nama_kelas', 'jenjang', 'jurusan')->get();
    return view('siswa.create', compact('kelasList'));
}


    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'nis' => 'required|unique:siswa',
            'kelas_id' => 'required|exists:kelas,id',
        ], [
            'nis.unique' => 'NIS sudah terdaftar.',
        ]);

        $data = $request->all();

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('foto_siswa', 'public');
        }

        Siswa::create($data);

        return redirect('/siswa')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit($id)
    {
        $siswa = Siswa::findOrFail($id);
        $kelas = Kelas::all();
        return view('siswa.edit', compact('siswa', 'kelas'));
    }

    public function update(Request $request, $id)
    {
        $siswa = Siswa::findOrFail($id);

        $request->validate([
            'nama' => 'required',
            'nis' => 'required|unique:siswa,nis,' . $id,
            'kelas_id' => 'required|exists:kelas,id',
        ], [
            'nis.unique' => 'NIS sudah digunakan oleh siswa lain.'
        ]);

        $data = $request->all();

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('foto_siswa', 'public');
        }

        $siswa->update($data);

        return redirect('/siswa')->with('success', 'Data berhasil diubah');
    }

    public function destroy($id)
    {
        $siswa = Siswa::findOrFail($id);
        $siswa->delete();

        return redirect('/siswa')->with('success', 'Data berhasil dihapus');
    }
}
