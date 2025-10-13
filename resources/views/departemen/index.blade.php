@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card card-shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-between align-items-center">
                <h6 class="m-0 font-weight-bold text-primary">Data Departemen</h6>
                <a href="{{ route('departemen.create') }}" class="btn btn-primary btn-sm">+ Tambah Data</a>
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
                                <th>Nama Departemen</th>
                                <th width="180">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($departemen as $index => $row)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $row->nama_departemen }}</td>
                                    <td>
                                        <a href="{{ route('departemen.edit', $row->id) }}" 
                                           class="btn btn-primary btn-sm">Edit</a>
                                        
                                        <form action="{{ route('departemen.destroy', $row->id) }}" 
                                              method="POST" 
                                              class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" 
                                                    class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Yakin ingin menghapus data ini?')">
                                                Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="text-center">Tidak ada data departemen</td>
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
