<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pegawai;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pegawai = Pegawai::all();
        return view('pegawai.index')->with('pegawai', $pegawai);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pegawai.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'status_pernikahan' => 'required',
            'tanggal_lahir' => 'required',
            'alamat' => 'required',
        ]);

        $pegawai = new Pegawai();
        $pegawai->nama = $request->input('nama');
        $pegawai->jenis_kelamin = $request->input('jenis_kelamin');
        $pegawai->status_pernikahan = $request->input('status_pernikahan');
        $pegawai->tanggal_lahir = $request->input('tanggal_lahir');
        $pegawai->alamat = $request->input('alamat');
        $pegawai->save();

        return redirect('/pegawai')->with('success', 'Data pegawai berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pegawai = Pegawai::findOrFail($id);
        return view('pegawai.edit')->with('pegawai', $pegawai);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'status_pernikahan' => 'required',
            'tanggal_lahir' => 'required',
            'alamat' => 'required',
        ]);

        $pegawai = Pegawai::findOrFail($id);
        $pegawai->nama = $request->input('nama');
        $pegawai->jenis_kelamin = $request->input('jenis_kelamin');
        $pegawai->status_pernikahan = $request->input('status_pernikahan');
        $pegawai->tanggal_lahir = $request->input('tanggal_lahir');
        $pegawai->alamat = $request->input('alamat');
        $pegawai->save();

        return redirect('/pegawai')->with('success', 'Data pegawai berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pegawai = Pegawai::findOrFail($id);
        $pegawai->delete();
        return redirect('/pegawai')->with('error', 'Data pegawai berhasil dihapus');
    }
}
