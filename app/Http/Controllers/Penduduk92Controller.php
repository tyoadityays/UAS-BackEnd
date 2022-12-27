<?php

namespace App\Http\Controllers;

use App\Models\Penduduk;
use Illuminate\Http\Request;
//edit
use Illuminate\Support\Facades\Crypt;

class Penduduk92Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index92()
    {
        //
        $datapenduduk92 = Penduduk::latest()->get();
        return view('app.ListPenduduk92', compact('datapenduduk92'));
        //return view('template.adminLTE');
    }

    public function adddatapenduduk92()
    {
        //
        return view('app.AddPenduduk92');
        //return view('template.adminLTE');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store92(Request $request)
    {
       //dd($request);
        $addpenduduk92 = Penduduk::create([
            'id' => $request->id,
            'nik' => $request->nik,
            'nama' => $request->nama,
            'kelamin' => $request->kelamin,
            'alamat' => $request->alamat,
            'status' => $request->status,
            'pekerjaan' => $request->pekerjaan,
            'warga' => $request->warga,
            'asal' => $request->asal,
            'tanggal' => $request->tanggal,
            'golongan' => $request->golongan,
        ]);
        if ($addpenduduk92){
            return redirect('/datapenduduk92');
        }
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
    public function editdata92($id)
    {
        //
        $datapenduduk92 = Penduduk::findOrFail(Crypt::decryptString($id));
        return view('app.EditPenduduk92', compact('datapenduduk92'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update92(Request $request, $id)
    {
        //
        $penduduk92 = Penduduk::findOrFail($id);
        $penduduk92->update([
            'id' => $request->id,
            'nik' => $request->nik,
            'nama' => $request->nama,
            'kelamin' => $request->kelamin,
            'alamat' => $request->alamat,
            'status' => $request->status,
            'pekerjaan' => $request->pekerjaan,
            'warga' => $request->warga,
            'asal' => $request->asal,
            'tanggal' => $request->tanggal,
            'golongan' => $request->golongan,
        ]);
        return redirect('/datapenduduk92');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy92($id)
    {
        //
        $penduduk92 = Penduduk::findOrFail($id);
        $penduduk92->delete();
        return redirect('/datapenduduk92');
    }
}