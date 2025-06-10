@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="card shadow-lg" style="background-color: #2d2c2c; color: white;">
        <div class="card-body">
            <h3 class="fw-bold mb-4" style="color: white;">Tambah Data Siswa</h3>
            <form action="{{ url('/siswa') }}" method="POST" enctype="multipart/form-data" class="row g-3">
                @csrf
                <div class="col-12 col-md-6">
                    <label class="form-label" style="color: white;">Nama</label>
                    <input type="text" name="nama" class="form-control" value="{{ old('nama') }}" required>
                </div>
                <div class="col-12 col-md-6">
                    <label class="form-label" style="color: white;">NIS</label>
                    <input type="text" name="nis" class="form-control" value="{{ old('nis') }}" required>
                </div>
                <div class="col-12 col-md-4">
                    <label class="form-label" style="color: white;">Jenjang</label>
                    <select id="jenjang" name="jenjang" class="form-select" required>
                        <option value="">Pilih Jenjang</option>
                        <option value="X">X</option>
                        <option value="XI">XI</option>
                        <option value="XII">XII</option>
                    </select>
                </div>
                <div class="col-12 col-md-4">
                    <label class="form-label" style="color: white;">Jurusan</label>
                    <select id="jurusan" name="jurusan" class="form-select" required>
                        <option value="">Pilih Jurusan</option>
                        <option value="RPL">RPL</option>
                        <option value="GIM">GIM</option>
                        <option value="TJKT">TJKT</option>
                        <option value="MPLB">MPLB</option>
                        <option value="DPIB">DPIB</option>
                        <option value="AKL">AKL</option>
                        <option value="TO">TO</option>
                        <option value="SP">SP</option>
                    </select>
                </div>
                <div class="col-12 col-md-4">
                    <label class="form-label" style="color: white;">Kelas</label>
                    <select name="kelas_id" id="kelas_id" class="form-select" required>
                        <option value="">-- Pilih Kelas --</option>
                        {{-- Kelas diisi lewat JavaScript --}}
                    </select>
                </div>
                <div class="col-12 col-md-6">
                    <label class="form-label" style="color: white;">Jenis Kelamin</label>
                    <select name="jenis_kelamin" class="form-select" required>
                        <option value="">Pilih</option>
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>
                <div class="col-12 col-md-6">
                    <label class="form-label" style="color: white;">Foto (Opsional)</label>
                    <input type="file" name="foto" class="form-control">
                </div>
                <div class="col-12">
                    <label class="form-label" style="color: white;">Alamat</label>
                    <textarea name="alamat" class="form-control" rows="3" required>{{ old('alamat') }}</textarea>
                </div>
                <div class="col-12 d-flex flex-column flex-sm-row justify-content-between gap-3 mt-3">
                    <a href="{{ url('/siswa') }}" class="btn"
                        style="background-color: white; color: black; border-radius: 999px; border: 1px solid #2f2f30;">
                        Kembali
                    </a>
                    <button type="submit" class="btn"
                        style="background-color: #b0b0b0; color: white; border-radius: 999px;">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    @if ($errors->has('nis'))
        Swal.fire({
            icon: 'error',
            title: 'NIS sudah digunakan!',
            text: '{{ $errors->first('nis') }}',
        });
    @endif
</script>

<script>
    const kelasList = @json($kelasList);

    function updateKelas() {
        const jenjang = document.getElementById('jenjang').value;
        const jurusan = document.getElementById('jurusan').value;
        const kelasSelect = document.getElementById('kelas_id');

        kelasSelect.innerHTML = '<option value="">-- Pilih Kelas --</option>';

        kelasList.forEach(kelas => {
            if (kelas.jenjang === jenjang && kelas.jurusan === jurusan) {
                const option = document.createElement('option');
                option.value = kelas.id;
                option.text = kelas.nama_kelas;
                kelasSelect.appendChild(option);
            }
        });
    }

    document.getElementById('jenjang').addEventListener('change', updateKelas);
    document.getElementById('jurusan').addEventListener('change', updateKelas);
</script>
@endsection
