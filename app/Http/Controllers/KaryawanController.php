<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use App\Models\Departemen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class KaryawanController extends Controller
{
    public function index()
    {
        $karyawan = Karyawan::with('departemen')->get(); // eager loading relasi
        return view('karyawan.index', compact('karyawan'));
    }

    public function create()
    {
        $departemen = Departemen::all();
        return view('karyawan.create', compact('departemen'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nip'           => 'required|numeric|unique:karyawan,nip',
            'nama_karyawan' => 'required',
            'gaji_karyawan' => 'required|numeric',
            'alamat'        => 'required',
            'jenis_kelamin' => 'required',
            'departemen_id' => 'required|exists:departemen,id',
            'foto'          => 'required|mimes:jpeg,png,jpg,gif'
        ]);

        // upload foto
        $foto_file = $request->file('foto');
        $foto_ekstensi = $foto_file->extension();
        $foto_nama = date('ymdhis') . '.' . $foto_ekstensi;
        $foto_file->move(public_path('foto'), $foto_nama);

        // simpan ke database
        $data = [
            'nip'           => $request->input('nip'),
            'nama_karyawan' => $request->input('nama_karyawan'),
            'gaji_karyawan' => $request->input('gaji_karyawan'),
            'alamat'        => $request->input('alamat'),
            'jenis_kelamin' => $request->input('jenis_kelamin'),
            'departemen_id' => $request->input('departemen_id'),
            'foto'          => $foto_nama
        ];

        Karyawan::create($data);

        return redirect()->route('karyawan.index')->with('success', 'Data karyawan berhasil ditambahkan');
    }

    public function edit(Karyawan $karyawan)
    {
        $departemen = Departemen::all();
        return view('karyawan.edit', compact('karyawan', 'departemen'));
    }

    public function update(Request $request, Karyawan $karyawan)
    {
        $request->validate([
            'nip'           => 'required|numeric|unique:karyawan,nip,' . $karyawan->id,
            'nama_karyawan' => 'required',
            'gaji_karyawan' => 'required|numeric',
            'alamat'        => 'required',
            'jenis_kelamin' => 'required',
            'departemen_id' => 'required|exists:departemen,id',
        ]);

        if ($request->hasFile('foto')) {
            $request->validate([
                'foto' => 'mimes:jpeg,png,jpg,gif'
            ]);

            // upload foto baru
            $foto_file = $request->file('foto');
            $foto_ekstensi = $foto_file->extension();
            $foto_nama = date('ymdhis') . '.' . $foto_ekstensi;
            $foto_file->move(public_path('foto'), $foto_nama);

            // hapus foto lama
            File::delete(public_path('foto') . '/' . $karyawan->foto);

            $karyawan->foto = $foto_nama;
        }

        $karyawan->update([
            'nip'           => $request->input('nip'),
            'nama_karyawan' => $request->input('nama_karyawan'),
            'gaji_karyawan' => $request->input('gaji_karyawan'),
            'alamat'        => $request->input('alamat'),
            'jenis_kelamin' => $request->input('jenis_kelamin'),
            'departemen_id' => $request->input('departemen_id'),
            'foto'          => $karyawan->foto
        ]);

        return redirect()->route('karyawan.index')->with('success', 'Data karyawan berhasil diupdate');
    }

    public function destroy(Karyawan $karyawan)
    {
        File::delete(public_path('foto') . '/' . $karyawan->foto);
        $karyawan->delete();

        return redirect()->route('karyawan.index')->with('success', 'Data karyawan berhasil dihapus');
    }
}
