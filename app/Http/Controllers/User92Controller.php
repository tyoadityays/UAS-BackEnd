<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Crypt;
use App\Models\User;
use App\Models\Detail;
use App\Models\Agama;
use Illuminate\Support\Facades\Hash;

class User92Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index92()
    {
        //
        $datauser92 = User::latest()->get();
        return view('app.DataUser92', compact('datauser92'));
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
    public function store(Request $request)
    {
        //
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
        //

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
        //

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
        $user = User::findOrFail($id);
        $user->delete();
        return redirect('/datauser92');
    }

    public function approve92($id)
    {
        //
        $user = User::findOrFail($id);
        $aktif = '1';
        $user->update([
            'is_aktif' => $aktif
        ]);
        return redirect('/datauser92');
    }

    public function unapprove92($id)
    {
        //
        $user = User::findOrFail($id);
        $aktif = '0';
        $user->update([
            'is_aktif' => $aktif
        ]);
        return redirect('/datauser92');
    }

    public function detail92($id)
    {
        $detaildata92 = Detail::with("user","agama")->where('id_user',Crypt::decryptString($id))->get();
        if (!$detaildata92->isEmpty()) {
            return view('app.DetailData92', compact('detaildata92'));
        }
        else {
            return view('app.NoData92');
        }

    }

    public function profile92()
    {
        $detaildata92 = Detail::with("user","agama")->where('id_user',auth()->user()->id)->get();
        $agama = Agama::all();
        $user = User::where("id",auth()->user()->id)->get();
        if (!$detaildata92->isEmpty()) {
            return view('app.ProfileUser92')->with(compact('detaildata92'))->with(compact('agama'));
        }
        else {
            return view('app.NoProfileUser92')->with(compact('user'))->with(compact('agama'));
        }
    }

    public function editprofile92(Request $request)
    {
        $adddetaildata92 = Detail::where('id_user',auth()->user()->id)->update([
            'id_user' => auth()->user()->id,
            'alamat' => $request->alamat,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'id_agama' => $request->id_agama,
            'umur' => $request->umur,
        ]);
        $adddetailuser92 = User::where('id',auth()->user()->id)->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        if ($adddetaildata92 && $adddetailuser92){
            return redirect('/profileuser92');
        }
    }
   
    public function uploadktp92(Request $request)
    {
        $file = request()->file('foto_ktp');
        $fileName = time() . '.' . $file->getClientOriginalExtension();
        $destinationPath = base_path('public/foto/ktp/');
        $file->move($destinationPath, $fileName);
        $adddetaildata92 = Detail::where('id_user',auth()->user()->id)->update([
            'foto_ktp' => $fileName,
        ]);

        if ($adddetaildata92){
            return redirect('/profileuser92');
        }
    }

    public function uploadfoto92(Request $request)
    {
        $file = request()->file('foto');
        $fileName = time() . '.' . $file->getClientOriginalExtension();
        $destinationPath = base_path('public/foto/profil/');
        $file->move($destinationPath, $fileName);
        $adddetailuser92 = User::where('id',auth()->user()->id)->update([
            'foto' => $fileName,
        ]);

        if ($adddetailuser92){
            return redirect('/profileuser92');
        }
    }

    public function uuploadktp92(Request $request)
    {
        $file = request()->file('foto_ktp');
        $fileName = time() . '.' . $file->getClientOriginalExtension();
        $destinationPath = base_path('public/foto/ktp');
        $file->move($destinationPath, $fileName);
        $adddetaildata92 = Detail::create([
            'id_user' => auth()->user()->id,
            'foto_ktp' => $fileName,
        ]);

        if ($adddetaildata92){
            return redirect('/profileuser92');
        }
    }

    public function uuploadfoto92(Request $request)
    {
        $file = request()->file('foto');
        $fileName = time() . '.' . $file->getClientOriginalExtension();
        $destinationPath = base_path('public/foto/profil/');
        $file->move($destinationPath, $fileName);
        $adddetaildata92 = Detail::create([
            'id_user' => auth()->user()->id,
        ]);
        $adddetailuser92 = User::create([
            'name' => null,
            'email' => null,
            'foto' => $fileName,
        ]);

        if ($adddetaildata92 && $adddetailuser92){
            return redirect('/profileuser92');
        }
    }

    public function password92()
    {
        return view('app.UpdatePassword92');
    }

    public function prosespassword92(Request $request)
    {
        $request->validate([
            'password_lama' => 'required',
            'password_baru' => 'required',
            'konfirmasi_password' => 'required|same:password_baru',
        ]);


        $userData = User::find(auth()->user()->id);

        if (!Hash::check($request->password_lama, $userData->password)) {
            return back()->with('error', 'Password lama tidak sesuai');
        }

        $userData->password = bcrypt($request->password_baru);
        $updatePassword = $userData->save();

        if ($updatePassword) {
            return back()->with('success', 'Update password berhasil');
        } else {
             return back()->with('error', 'Update password gagal');
        }
    }

    public function tambahprofile92(Request $request)
    {
        $adddetaildata92 = Detail::create([
            'id_user' => auth()->user()->id,
            'alamat' => $request->alamat,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'id_agama' => $request->id_agama,
            'umur' => $request->umur,
        ]);

        if ($adddetaildata92){
            return redirect('/profileuser92');
        }
    }
}