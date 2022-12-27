<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\FormatApi;
use App\Models\Agama;

class ControllerApiAgama extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index92()
    {
        //
        
        $dataagama = Agama::latest()->get();
        return new FormatApi(true, 'Detail Data', $dataagama);
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
        //
        $addagama = Agama::create([
            'nama_agama' => $request->nama_agama,
        ]);

        return new FormatApi(true, 'Add data agama berhasil', $addagama);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show92($id)
    {
        //
        $data = Agama::where('id', '=', $id)->get();
        return new FormatApi(true, 'Detail Data Agama', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $agama = Agama::findOrFail($id);

        $agama->update([
            'nama_agama' => $request->nama_agama,
        ]);
        return new FormatApi(true, 'Update Data Agama Berhasil', $agama);
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
        $agama = Agama::findOrFail($id);
        $agama->delete();
        return new FormatApi(true, 'Hapus Data Agama Berhasil', $agama);
    }
}
