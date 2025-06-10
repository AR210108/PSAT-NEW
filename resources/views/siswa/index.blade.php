@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="card shadow border-0" style="background-color: #2d2c2c; color: white;">
        <div class="card-body">
            <h3 class="mb-4 fw-bold text-white">Daftar Siswa</h3>
            <a href="{{ route('siswa.create') }}" class="btn mb-4"
                style="background-color: #b0b0b0; color: white; border-radius: 999px;">Tambah Siswa</a>

            <!-- Form filter dan pencarian -->
            <form method="GET" action="{{ url('/siswa') }}" class="row gy-2 gx-3 mb-4 align-items-end">
                <div class="col-md-4">
                    <input type="text" name="search" class="form-control" value="{{ request('search') }}"
                        placeholder="Masukkan nama atau NIS" style="border-radius: 28px;">
                </div>
                <div class="col-md-2">
                    <select name="jenjang" class="form-select" style="border-radius: 28px;">
                        <option value="">Semua Jenjang</option>
                        <option value="X" {{ request('jenjang') == 'X' ? 'selected' : '' }}>X</option>
                        <option value="XI" {{ request('jenjang') == 'XI' ? 'selected' : '' }}>XI</option>
                        <option value="XII" {{ request('jenjang') == 'XII' ? 'selected' : '' }}>XII</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <select name="jurusan" class="form-select" style="border-radius: 28px;">
                        <option value="">Semua Jurusan</option>
                        @foreach (['RPL', 'GIM', 'TJKT', 'MPLB', 'DPIB', 'AKL', 'TO', 'SP'] as $jurusan)
                            <option value="{{ $jurusan }}" {{ request('jurusan') == $jurusan ? 'selected' : '' }}>{{ $jurusan }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-2">
                    <select name="kelas" class="form-select" style="border-radius: 28px;">
                        <option value="">Semua</option>
                        @foreach ($listKelas as $kelas)
                            <option value="{{ $kelas }}" {{ request('kelas') == $kelas ? 'selected' : '' }}>{{ $kelas }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-2 d-grid">
                    <button type="submit" class="btn"
                        style="background-color: #b0b0b0; color: white; border-radius: 999px;">Filter</button>
                </div>
            </form>

            @if (session('success'))
                <div class="alert alert-success" style="background-color: #c8e6c9; color: #256029; border: none;">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Tabel Siswa -->
            <div class="table-responsive">
                <table class="table table-bordered align-middle text-center table-hover shadow-sm"
                    style="background-color: white; color: black;">
                    <thead style="background-color: #2e2e2e; color: white;">
                        <tr>
                            <th>No</th>
                            <th>Foto</th>
                            <th>Nama</th>
                            <th>NIS</th>
                            <th>Kelas</th>
                            <th>JK</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($siswa as $index => $s)
                            <tr>
                                <td>{{ $siswa->firstItem() + $index }}</td>
                                <td>
                                    @php
                                        $defaultFoto = $s->jenis_kelamin == 'Laki-laki'
                                            ? asset('images/default-laki.jpg')
                                            : asset('images/default-perempuan.jpg');
                                    @endphp
                                    <img src="{{ $s->foto ? asset('storage/' . $s->foto) : $defaultFoto }}"
                                        alt="Foto" width="60" height="60"
                                        class="rounded-circle border border-2 border-secondary"
                                        style="cursor:pointer; object-fit:cover"
                                        onclick="showPopup({{ $s->toJson() }})">
                                </td>
                                <td>{{ $s->nama }}</td>
                                <td>{{ $s->nis }}</td>
                               <td><span class="badge bg-light text-dark border">{{ $s->kelas->nama_kelas ?? '-' }}</span></td>
                                <td>
                                    @if ($s->jenis_kelamin == 'Laki-laki')
                                        <span class="badge bg-primary">Laki-laki</span>
                                    @elseif ($s->jenis_kelamin == 'Perempuan')
                                        <span class="badge bg-danger">Perempuan</span>
                                    @else
                                        <span class="badge bg-secondary">-</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('siswa.edit', $s->id) }}" class="btn btn-sm"
                                        style="background-color: #b0b0b0; color: white; border-radius: 999px;">Edit</a>
                                    <button class="btn btn-sm"
                                        style="background-color: #2e2e2e; color: white; border-radius: 999px;"
                                        onclick="confirmDelete('{{ route('siswa.destroy', $s->id) }}')">Hapus</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <!-- Pagination -->
                <div class="mt-3">
                    {{ $siswa->withQueryString()->links() }}
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Detail -->
<div class="modal fade" id="popupSiswa" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content shadow-lg" style="background-color: #2d2c2c; color: white;">
            <div class="modal-header" style="background-color: #2e2e2e; color: white;">
                <h5 class="modal-title">Detail Siswa</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body text-center" id="popupContent">
                <!-- JS akan isi -->
            </div>
        </div>
    </div>
</div>

<!-- Modal Konfirmasi Hapus -->
<div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content shadow-lg" style="background-color: #2d2c2c; color: white;">
            <div class="modal-header" style="background-color: #2e2e2e; color: white;">
                <h5 class="modal-title">🗑️ Konfirmasi Hapus</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body text-center">
                <p class="mb-3">Apakah kamu yakin ingin menghapus siswa ini?</p>
                <form id="deleteForm" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="btn btn-secondary me-2" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Script -->
<script>
    function showPopup(siswa) {
        let foto = siswa.foto ? '/storage/' + siswa.foto :
            (siswa.jenis_kelamin === 'Laki-laki' ? '/images/default-laki.jpg' : '/images/default-perempuan.jpg');

        let content = `
            <img src="${foto}" class="rounded-circle mb-3" width="100" height="100" style="object-fit:cover">
            <p><strong>Nama:</strong> ${siswa.nama}</p>
            <p><strong>NIS:</strong> ${siswa.nis}</p>
            <p><strong>Kelas:</strong> ${siswa.kelas.nama_kelas ?? '-'}</p>
            <p><strong>Jenis Kelamin:</strong> ${siswa.jenis_kelamin}</p>
        `;
        document.getElementById('popupContent').innerHTML = content;
        new bootstrap.Modal(document.getElementById('popupSiswa')).show();
    }

    function confirmDelete(url) {
        document.getElementById('deleteForm').action = url;
        new bootstrap.Modal(document.getElementById('confirmDeleteModal')).show();
    }
</script>
@endsection
