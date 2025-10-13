@extends('layouts.app')
@section('content')

<form action="{{ route('karyawan.update', $karyawan->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="row">
        <div class="col-12">
            <div class="card card-shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Form Edit Karyawan</h6>
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <label for="nip">NIP</label>
                        <input type="number" class="form-control" name="nip" value="{{ old('nip', $karyawan->nip) }}">
                        @error('nip') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <div class="form-group">
                        <label for="nama_karyawan">Nama Karyawan</label>
                        <input type="text" class="form-control" name="nama_karyawan" value="{{ old('nama_karyawan', $karyawan->nama_karyawan) }}">
                        @error('nama_karyawan') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <div class="form-group">
                        <label for="gaji_karyawan">Gaji Karyawan</label>
                        <input type="number" class="form-control" name="gaji_karyawan" value="{{ old('gaji_karyawan', $karyawan->gaji_karyawan) }}">
                        @error('gaji_karyawan') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea class="form-control" name="alamat">{{ old('alamat', $karyawan->alamat) }}</textarea>
                        @error('alamat') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <div class="form-group">
                        <label for="jenis_kelamin">Jenis Kelamin</label>
                        <select name="jenis_kelamin" class="form-control">
                            <option value="" disabled>--Pilih Jenis Kelamin--</option>
                            <option value="Pria" @selected(old('jenis_kelamin', $karyawan->jenis_kelamin) == 'Pria')>Pria</option>
                            <option value="Wanita" @selected(old('jenis_kelamin', $karyawan->jenis_kelamin) == 'Wanita')>Wanita</option>
                        </select>
                        @error('jenis_kelamin') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    {{-- Foto lama --}}
                    @if($karyawan->foto)
                        <div class="form-group">
                            <label>Foto Saat Ini:</label><br>
                            <img style="width: 100px; height: 100px; object-fit: cover;" src="{{ url('foto/'.$karyawan->foto) }}">
                        </div>
                    @endif
                    <div class="form-group">
                        <label>Departemen</label>
                        <select name="departemen_id" class="form-control">
    <option value="" selected disabled hidden>--Pilih Departemen--</option>
    @foreach ($departemen as $d)
        <option value="{{ $d->id }}" {{ $d->id == $karyawan->departemen_id ? 'selected' : '' }}>
            {{ $d->nama_departemen }}
        </option>
    @endforeach
</select>


                    {{-- Upload foto baru --}}
                    <div class="form-group">
                        <label for="foto">Upload Foto Karyawan</label>
                        <input type="file" class="form-control-file" id="foto" name="foto">
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </div>
    </div>
</form>

@endsection
