@extends('layouts.app')
@section('content')
    <div class="container py-4">
        <div class="card shadow-lg" style="background-color: #2d2c2c; color: white;">
            <div class="card-body">
                <!-- Judul Form -->
                <h3 class="fw-bold mb-4" style="color: white;">Edit Data Siswa</h3>
                <!-- Form Edit Siswa -->
                <form action="{{ url('/siswa/' . $siswa->id) }}" method="POST" enctype="multipart/form-data" class="row g-3">
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
                        <select id="kelas" name="kelas_id" class="form-select" required>
                            <option value="">-- Pilih Kelas --</option>
                            <!-- Opsi kelas akan diisi oleh JS -->
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
                        @if ($siswa->foto)
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
                        <a href="{{ url('/siswa') }}" class="btn" style="background-color: white; color: black; border-radius: 999px; border: 1px solid var(--outline);">
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
        // Data kelas dari backend (pastikan variabel $kelas dikirim dari controller)
        const kelasData = @json($kelas);

        function updateKelas() {
            const jenjang = document.getElementById('jenjang').value;
            const jurusan = document.getElementById('jurusan').value;
            const kelasSelect = document.getElementById('kelas');

            kelasSelect.innerHTML = '<option value="">-- Pilih Kelas --</option>';

            if (jenjang && jurusan) {
                // Filter kelas berdasarkan awalan nama kelas: jenjang + jurusan
                const filteredKelas = kelasData.filter(k => {
                    return k.nama_kelas.startsWith(jenjang + ' ' + jurusan);
                });

                filteredKelas.forEach(k => {
                    const option = document.createElement('option');
                    option.value = k.id;
                    option.textContent = k.nama_kelas;
                    kelasSelect.appendChild(option);
                });
            }
        }

        document.getElementById('jenjang').addEventListener('change', updateKelas);
        document.getElementById('jurusan').addEventListener('change', updateKelas);

        document.addEventListener('DOMContentLoaded', () => {
            const kelasSelect = document.getElementById('kelas');
            const jenjangSelect = document.getElementById('jenjang');
            const jurusanSelect = document.getElementById('jurusan');

            // Ambil data kelas terpilih siswa
            const kelasTerpilih = kelasData.find(k => k.id == "{{ $siswa->kelas_id }}");

            if (kelasTerpilih) {
                const parts = kelasTerpilih.nama_kelas.split(' ');
                jenjangSelect.value = parts[0]; // Contoh: "X"
                jurusanSelect.value = parts[1]; // Contoh: "RPL"
            }

            updateKelas();

            // Set kelas yang dipilih setelah opsi terisi
            setTimeout(() => {
                kelasSelect.value = "{{ $siswa->kelas_id }}";
            }, 100);
        });
    </script>
@endsection
