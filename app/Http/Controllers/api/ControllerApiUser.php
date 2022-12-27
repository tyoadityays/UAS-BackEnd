<?php


namespace App\Http\Controllers\api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\FormatApi;
use App\Models\User;
use App\Models\Detail;
use App\Models\Agama;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ControllerApiUser extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index92()
    {
        //
        $datauser = User::latest()->get();
        return new FormatApi(true, 'List Data User', $datauser);
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
        return new FormatApi(true, 'Hapus Data User Berhasil', $user);
    }

    public function approve92($id)
    {
        //
        $user = User::findOrFail($id);
        $aktif = '1';
        $user->update([
            'is_aktif' => $aktif
        ]);
        return new FormatApi(true, 'Approve User berhasil', $user);
    }

    public function unapprove92($id)
    {
        //
        $user = User::findOrFail($id);
        $aktif = '0';
        $user->update([
            'is_aktif' => $aktif
        ]);
        return new FormatApi(true, 'Unapprove User berhasil', $user);
    }

    public function detail92($id)
    {
        $detaildata92 = Detail::with("user","agama")->where('id_user',Crypt::decryptString($id))->get();
        return new FormatApi(true, 'Detail Data User', $detaildata92);
    }
    
    public function editprofile92(Request $request, $id)
    {
        $adddetaildata92 = Detail::where('id_user',$id)->update([
            'id_user' => $id,
            'alamat' => $request->alamat,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'id_agama' => $request->id_agama,
            'umur' => $request->umur,
        ]);
        $adddetailuser92 = User::where('id',$id)->update([
             'name' => $request->name,
             'email' => $request->email,
        ]);

        return new FormatApi(true, 'Detail Data User', [$adddetaildata92,$adddetailuser92]);
    }

    public function prosespassword92(Request $request, $id)
    {
        $request->validate([
            'password_lama' => 'required',
            'password_baru' => 'required',
            'konfirmasi_password' => 'required|same:password_baru',
        ]);

        $userData = User::find($id);

        //return new FormatApi(true, null, $userData->get()[0]->password);

        if (!Hash::check($request->password_lama, $userData->password)) {
            return new FormatApi(false, 'Password lama tidak cocok', null);
        }

        $userData->password = bcrypt($request->password_baru);
        $updatePassword = $userData->save();

        if ($updatePassword) {
            return new FormatApi(true, 'Password Berhasil Diupdate', $updatePassword);
        } else {
            return new FormatApi(false, 'Password Gagal Diupdate', $updatePassword);
        }
    }

    public function tambahprofile92(Request $request)
    {
        $adddetaildata92 = Detail::create([
            'id_user' => $request->id_user,
            'alamat' => $request->alamat,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'id_agama' => $request->id_agama,
            'umur' => $request->umur,
        ]);

        if ($adddetaildata92){
            return new FormatApi(true, 'Berhasil Diupdate', $adddetaildata92);
        }
    }

    public function uploadktp92(Request $request, $id)
    {
        $file = $request->foto_ktp;
        $adddetaildata92 = Detail::where('id_user',$id)->update([
            'foto_ktp' => $file,
        ]);

        return new FormatApi(true, 'Data Berhasil Diupdate', $adddetaildata92);
    }

    public function uploadfoto92(Request $request, $id)
    {
        $file = $request->foto;
        $adddetailuser92 = User::where('id',$id)->update([
            'foto' => $file,
        ]);

        return new FormatApi(true, 'Data Berhasil Diupdate', $adddetailuser92);
    }

    public function uuploadktp92(Request $request)
    {
        $file = $request->foto_ktp;
        // $adddetaildata92 = Detail::where('id_user',$id)->update([
        //     'foto_ktp' => $file,
        // ]);
        $adddetaildata92 = Detail::create([
            'id_user' => $request->id_user,
            'foto_ktp' => $file,
        ]);

        return new FormatApi(true, 'Data Berhasil Diupdate', $adddetaildata92);
    }

    public function uuploadfoto92(Request $request)
    {
        $file = $request->foto;
        // $adddetailuser92 = User::where('id',$id)->update([
        //     'foto' => $file,
        // ]);
        $adddetaildata92 = Detail::create([
            'id_user' => $request->id_user,
        ]);
        $adddetailuser92 = User::create([
            'name' => null,
            'email' => null,
            'password' => null,
            'foto' => $file,
        ]);

        if ($adddetaildata92 && $adddetailuser92){
            return redirect('/profileuser92');
        }

        return new FormatApi(true, 'Data Berhasil Diupdate', $adddetailuser92);
    }
}
