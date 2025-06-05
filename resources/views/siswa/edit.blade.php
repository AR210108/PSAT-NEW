@extends('layouts.app')
@section('content')
<div class="container py-4">
    <div class="card shadow-lg" style="background-color: #2d2c2c; color: white;">
        <div class="card-body">
            <!-- Judul Form -->
            <h3 class="fw-bold mb-4" style="color: white;">Edit Data Siswa</h3>
            <!-- Form Edit Siswa -->
            <form action="{{ url('/siswa/'.$siswa->id) }}" method="POST" enctype="multipart/form-data" class="row g-3">
                @csrf
                @method('PUT') <!-- Gunakan method PUT untuk update -->
                
                <!-- Input Nama -->
                <div class="col-12 col-md-6">
                    <label class="form-label" style="color: white;">Nama</label>
                    <input type="text" name="nama" class="form-control" value="{{ old('nama', $siswa->nama) }}" required>
                </div>
                
                <!-- Input NIS -->
                <div class="col-12 col-md-6">
                    <label class="form-label" style="color: white;">NIS</label>
                    <input type="text" name="nis" class="form-control" value="{{ old('nis', $siswa->nis) }}" required>
                </div>
                
                <!-- Select Jenjang -->
                <div class="col-12 col-md-4">
                    <label class="form-label" style="color: white;">Jenjang</label>
                    <select id="jenjang" name="jenjang" class="form-select" required>
                        <option value="">Pilih Jenjang</option>
                        <option value="X" {{ $siswa->jenjang == 'X' ? 'selected' : '' }}>X</option>
                        <option value="XI" {{ $siswa->jenjang == 'XI' ? 'selected' : '' }}>XI</option>
                        <option value="XII" {{ $siswa->jenjang == 'XII' ? 'selected' : '' }}>XII</option>
                    </select>
                </div>
                
                <!-- Select Jurusan -->
                <div class="col-12 col-md-4">
                    <label class="form-label" style="color: white;">Jurusan</label>
                    <select id="jurusan" name="jurusan" class="form-select" required>
                        <option value="">Pilih Jurusan</option>
                        <option value="RPL" {{ $siswa->jurusan == 'RPL' ? 'selected' : '' }}>RPL</option>
                        <option value="GIM" {{ $siswa->jurusan == 'GIM' ? 'selected' : '' }}>GIM</option>
                        <option value="TJKT" {{ $siswa->jurusan == 'TJKT' ? 'selected' : '' }}>TJKT</option>
                        <option value="MPLB" {{ $siswa->jurusan == 'MPLB' ? 'selected' : '' }}>MPLB</option>
                        <option value="DPIB" {{ $siswa->jurusan == 'DPIB' ? 'selected' : '' }}>DPIB</option>
                        <option value="AKL" {{ $siswa->jurusan == 'AKL' ? 'selected' : '' }}>AKL</option>
                        <option value="TO" {{ $siswa->jurusan == 'TO' ? 'selected' : '' }}>TO</option>
                        <option value="SP" {{ $siswa->jurusan == 'SP' ? 'selected' : '' }}>SP</option>
                    </select>
                </div>
                
                <!-- Select Kelas (otomatis berubah sesuai jenjang + jurusan) -->
                <div class="col-12 col-md-4">
                    <label class="form-label" style="color: white;">Kelas</label>
                    <select name="kelas" id="kelas" class="form-select" required>
                        <option value="">-- Pilih Kelas --</option>
                    </select>
                </div>
                
                <!-- Select Jenis Kelamin -->
                <div class="col-12 col-md-6">
                    <label class="form-label" style="color: white;">Jenis Kelamin</label>
                    <select name="jenis_kelamin" class="form-select" required>
                        <option value="">Pilih</option>
                        <option value="Laki-laki" {{ $siswa->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                        <option value="Perempuan" {{ $siswa->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                    </select>
                </div>
                
                <!-- Upload Foto -->
                <div class="col-12 col-md-6">
                    <label class="form-label" style="color: white;">Foto (Opsional, isi jika ingin ganti)</label>
                    <input type="file" name="foto" class="form-control">
                    @if($siswa->foto)
                        <p class="mt-2 text-white">Foto saat ini:</p>
                        <img src="{{ asset('storage/' . $siswa->foto) }}" alt="Foto" width="100" class="rounded-3 shadow-sm">
                    @endif
                </div>
                
                <!-- Input Alamat -->
                <div class="col-12">
                    <label class="form-label" style="color: white;">Alamat</label>
                    <textarea name="alamat" class="form-control" rows="3" required>{{ old('alamat', $siswa->alamat) }}</textarea>
                </div>
                
                <!-- Tombol Aksi -->
                <div class="col-12 d-flex flex-column flex-sm-row justify-content-between gap-3 mt-3">
                    <a href="{{ url('/siswa') }}"
                       class="btn" style="background-color: white; color: black; border-radius: 999px; border: 1px solid var(--outline);">
                        Kembali
                    </a>
                    <button type="submit" class="btn" style="background-color: #b0b0b0; color: white; border-radius: 999px;">
                        Update
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Script untuk mengatur kelas berdasarkan jenjang dan jurusan -->
<script>
    // Data kelas lengkap berdasarkan jenjang dan jurusan
    const kelasData = {
        // Format: Jenjang-Jurusan : [List kelas]
        'X-RPL': ['X RPL 1', 'X RPL 2', 'X RPL 3'],
        'X-GIM': ['X GIM 1', 'X GIM 2', 'X GIM 3'],
        'X-TJKT': ['X TJKT 1', 'X TJKT 2', 'X TJKT 3'],
        'X-MPLB': ['X MPLB 1', 'X MPLB 2', 'X MPLB 3'],
        'X-DPIB': ['X DPIB 1', 'X DPIB 2', 'X DPIB 3'],
        'X-AKL': ['X AKL 1', 'X AKL 2', 'X AKL 3'],
        'X-TO': ['X TO 1', 'X TO 2', 'X TO 3'],
        'X-SP': ['X SP 1', 'X SP 2', 'X SP 3'],
        'XI-RPL': ['XI RPL 1', 'XI RPL 2', 'XI RPL 3'],
        'XI-GIM': ['XI GIM 1', 'XI GIM 2', 'XI GIM 3'],
        'XI-TJKT': ['XI TJKT 1', 'XI TJKT 2', 'XI TJKT 3'],
        'XI-MPLB': ['XI MPLB 1', 'XI MPLB 2', 'XI MPLB 3'],
        'XI-DPIB': ['XI DPIB 1', 'XI DPIB 2', 'XI DPIB 3'],
        'XI-AKL': ['XI AKL 1', 'XI AKL 2', 'XI AKL 3'],
        'XI-TO': ['XI TO 1', 'XI TO 2', 'XI TO 3'],
        'XI-SP': ['XI SP 1', 'XI SP 2', 'XI SP 3'],
        'XII-RPL': ['XII RPL 1', 'XII RPL 2', 'XII RPL 3'],
        'XII-GIM': ['XII GIM 1', 'XII GIM 2', 'XII GIM 3'],
        'XII-TJKT': ['XII TJKT 1', 'XII TJKT 2', 'XII TJKT 3'],
        'XII-MPLB': ['XII MPLB 1', 'XII MPLB 2', 'XII MPLB 3'],
        'XII-DPIB': ['XII DPIB 1', 'XII DPIB 2', 'XII DPIB 3'],
        'XII-AKL': ['XII AKL 1', 'XII AKL 2', 'XII AKL 3'],
        'XII-TO': ['XII TO 1', 'XII TO 2', 'XII TO 3'],
        'XII-SP': ['XII SP 1', 'XII SP 2', 'XII SP 3'],
    };
    // Fungsi untuk memperbarui dropdown kelas saat jenjang/jurusan berubah
    function updateKelas() {
        const jenjang = document.getElementById('jenjang').value;
        const jurusan = document.getElementById('jurusan').value;
        const kelasSelect = document.getElementById('kelas');
        kelasSelect.innerHTML = '<option value="">-- Pilih Kelas --</option>';
        if (jenjang && jurusan) {
            const key = jenjang + '-' + jurusan;
            if (kelasData[key]) {
                kelasData[key].forEach(kelas => {
                    kelasSelect.innerHTML += `<option value="${kelas}">${kelas}</option>`;
                });
            }
        }
    }
    // Event listener saat pilihan jenjang atau jurusan berubah
    document.getElementById('jenjang').addEventListener('change', updateKelas);
    document.getElementById('jurusan').addEventListener('change', updateKelas);
    // Saat halaman dimuat, isi otomatis data kelas berdasarkan data lama
    document.addEventListener('DOMContentLoaded', function () {
        let kelas = "{{ $siswa->kelas }}";
        let jenjang = kelas.split(' ')[0] || '';
        let jurusan = kelas.split(' ')[1] || '';
        document.getElementById('jenjang').value = jenjang;
        document.getElementById('jurusan').value = jurusan;
        updateKelas();
        // Tunda pengisian kelas agar data sudah di-load
        setTimeout(() => {
            document.getElementById('kelas').value = kelas;
        }, 100);
    });
</script>
@endsection