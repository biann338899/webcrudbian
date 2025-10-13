@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card card-shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-between align-items-center">
                <h6 class="m-0 font-weight-bold text-primary">Data Karyawan</h6>
                <a href="{{ route('karyawan.create') }}" class="btn btn-primary btn-sm">+ Tambah Data</a>
            </div>

            <div class="card-body">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Foto Karyawan</th>
                                <th>Nip</th>
                                <th>Nama Karyawan</th>
                                <th>Jenis Kelamin</th>
                                <th>Gaji Karyawan</th>
                                <th>Departemen</th>
                                <th>Alamat</th>
                                <th width="180">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($karyawan as $karyawan)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                      <td>
                                    @if ($karyawan->foto)
                                    <img style="width: 100px; height: 100px; object-fit: cover;" src="{{ url('foto').'/'.$karyawan->foto}}">
                                    @endif
                                      </td>
                                    <td>{{ $karyawan->nip }}</td>
                                    <td>{{ $karyawan->nama_karyawan }}</td>
                                    <td>{{ $karyawan->jenis_kelamin }}</td>
                                    <td>{{ $karyawan->gaji_karyawan }}</td>
                                    <td>{{ $karyawan->departemen->nama_departemen }}</td>
                                    <td>{{ $karyawan->alamat }}</td>
                                    <td>
                                        <a class="btn btn-sm btn-primary" href="{{ url('karyawan/'.$karyawan->id.'/edit') }}">Edit</a>

                                        <form action="{{ url('karyawan/'.$karyawan->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" onclick="return confirm('Yakin ingin menghapus data ini?')" class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center">Tidak ada data karyawan</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<!-- jQuery & DataTables -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css"/>

<script>
    $(document).ready(function () {
        $('#dataTable').DataTable();
    });
</script>
@endpush
