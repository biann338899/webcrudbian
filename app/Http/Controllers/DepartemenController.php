<?php

namespace App\Http\Controllers;

use App\Models\Departemen;
use Illuminate\Http\Request;

class DepartemenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
{
        //
    $departemen = Departemen::all();
    return view('departemen.index',['departemen'=> $departemen]);
}
/**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('departemen.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'nama_departemen' => 'required',
        ]);
        Departemen::create([
            'nama_departemen' => $request->nama_departemen,
        ]);
        return redirect()->route('departemen.index')->with('success', 'Departemen berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Departemen  $departemen
     * @return \Illuminate\Http\Response
     */
    public function show(Departemen $departemen)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Departemen  $departemen
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $data = Departemen::findOrFail($id);
        return view('departemen.edit')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Departemen  $departemen
     * @return \Illuminate\Http\Response
     */
  public function update(Request $request, $id)
    {
    $request->validate([
        'nama_departemen' => 'required',
    ]);

    $data = Departemen::findOrFail($id);
    $data->update([
        'nama_departemen' => $request->nama_departemen,
    ]);

    return redirect()->route('departemen.index')
                     ->with('success', 'Departemen berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Departemen  $departemen
     * @return \Illuminate\Http\Response
     */
   public function destroy($id) 
   {
    $data = Departemen::findOrFail($id);
    $data->delete(); // Hapus dari database

    return redirect()->route('departemen.index')
                     ->with('success', 'Departemen berhasil dihapus.');
   }

}
