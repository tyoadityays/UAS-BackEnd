<?php

namespace App\Http\Controllers;

use App\Models\Agama;
use App\Models\Detail;
use App\Models\User;
use Illuminate\Http\Request;
use GuzzleHttp\Client;


class ApiClientUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index92()
    {
        //
        $client = new Client();
        $response = $client->request('GET', 'http://127.0.0.1/UAS_V3421092/public/api/admin/datauser92');
        $statuscode = $response->getStatusCode();
        $body = $response->getBody();
        $data = json_decode($body,true);
        //dd($data);
        return view('apiclienttic/datauser92',['user' => $data]);
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
        $client = new Client();
        $response = $client->request('DELETE', 'http://127.0.0.1/UAS_V3421092/public/api/admin/hapusdatauser92/'.$id);
        return redirect ('/admin/clientapi/datauser92');
    }

    public function approve92(Request $request, $id)
    {
        //
        $client = new Client();
        $aktif = '1';
        $response = $client->request('PUT', 'http://127.0.0.1/UAS_V3421092/public/api/admin/approveuser92/'.$id,
        [
            'json' => [
                'is_aktif' => $aktif
            ]
        ]
        );
        return redirect ('/admin/clientapi/datauser92');
    }

    public function unapprove92(Request $request, $id)
    {
        //
        $client = new Client();
        $aktif = '0';
        $response = $client->request('PUT', 'http://127.0.0.1/UAS_V3421092/public/api/admin/unapproveuser92/'.$id,
        [
            'json' => [
                'is_aktif' => $aktif
            ]
        ]
        );
        return redirect ('/admin/clientapi/datauser92');
    }

    public function detail92($id)
    {
        $client = new Client();
        $response = $client->request('GET', 'http://127.0.0.1/UAS_V3421092/public/api/admin/detaildatauser92/'.$id);
        $statuscode = $response->getStatusCode();
        $body = $response->getBody();
        $data = json_decode($body,true);
        //dd($data);
        return view('apiclienttic/detaildata92',['user' => $data]);
    }

    public function profile92()
    {
        //
        $detaildata92 = Detail::with("user","agama")->where('id_user',auth()->user()->id)->get();
        $agama = Agama::all();
        $user = User::where("id",auth()->user()->id)->get();
        if (!$detaildata92->isEmpty()) {
            return view('apiclienttic/profileuser92')->with(compact('detaildata92'))->with(compact('agama'));
        }
        else {
            return view('apiclienttic/noprofileuser92')->with(compact('user'))->with(compact('agama'));
        }
    }

    public function editprofile92(Request $request, $id)
    {
        $client = new Client();
        $response = $client->request(
            'PUT',
            'http://127.0.0.1/UAS_V3421092/public/api/user/editprofileuser92/'. $id,
            [
                'json' => [
                    'alamat' => $request->alamat,
                    'tempat_lahir' => $request->tempat_lahir,
                    'tanggal_lahir' => $request->tanggal_lahir,
                    'id_agama' => $request->id_agama,
                    'umur' => $request->umur,
                    'name' => $request->name,
                    'email'=> $request->email
                ]
            ]
        );
        return redirect ('/user/clientapi/profileuser92');
    }

    public function password92()
    {
        return view('apiclienttic/updatepassword92');
    }

    public function prosespassword92(Request $request, $id)
    {
        $request->validate([
            'password_lama' => 'required',
            'password_baru' => 'required',
            'konfirmasi_password' => 'required|same:password_baru',
        ]);

        $client = new Client();
        $response = $client->request(
            'PUT',
            'http://127.0.0.1/UAS_V3421092/public/api/user/prosesupdatepassword92/'.$id,
            [
                'json' => [
                    'password_lama' => $request->password_lama,
                    'password_baru' => $request->password_baru,
                    'konfirmasi_password' => $request->konfirmasi_password,
                ]
            ]
        );
        //$body = $response->getBody();
        //$data = json_decode($body,true);
        //return dd($data);
        return back();
    }

    public function tambahprofile92(Request $request)
    {
        $client = new Client();
        $response = $client->request(
            'POST',
            'http://127.0.0.1/UAS_V3421092/public/api/user/prosesprofileuser92',
            [
                'json' => [
                    'id_user' => auth()->user()->id,
                    'alamat' => $request->alamat,
                    'tempat_lahir' => $request->tempat_lahir,
                    'tanggal_lahir' => $request->tanggal_lahir,
                    'id_agama' => $request->id_agama,
                    'umur' => $request->umur,
                ]
            ]
        );
        return redirect ('/user/clientapi/profileuser92');
    }

    public function uploadktp92(Request $request, $id)
    {
        $file = $request->file('foto_ktp');
        $fileName = time() . '.' . $file->getClientOriginalExtension();
        $destinationPath = base_path('public/foto/ktp/');
        $file->move($destinationPath, $fileName);
        $client = new Client();
        $response = $client->request(
            'PUT',
            'http://127.0.0.1/UAS_V3421092/public/api/user/uploadfotoktp92/'.$id,
            [
                'json' => [
                    'foto_ktp' => $fileName,
                ]
            ]
        );
        return back();
    }

    public function uploadfoto92(Request $request, $id)
    {
        $file = $request->file('foto');
        $fileName = time() . '.' . $file->getClientOriginalExtension();
        $destinationPath = base_path('public/foto/profil/');
        $file->move($destinationPath, $fileName);
        $client = new Client();
        $response = $client->request(
            'PUT',
            'http://127.0.0.1/UAS_V3421092/public/api/user/uploadfotoprofil92/'.$id,
            [
                'json' => [
                    'foto' => $fileName,
                ]
            ]
        );
        return back();
    }

    public function uuploadktp92(Request $request)
    {
        $file = $request->file('foto_ktp');
        $fileName = time() . '.' . $file->getClientOriginalExtension();
        $destinationPath = base_path('public/foto/ktp/');
        $file->move($destinationPath, $fileName);
        $client = new Client();
        $response = $client->request(
            'POST',
            'http://127.0.0.1/UAS_V3421092/public/api/user/uuploadfotoktp92',
            [
                'json' => [
                    'foto_ktp' => $fileName,
                ]
            ]
        );
        return back();
    }

    public function uuploadfoto92(Request $request)
    {
        $file = $request->file('foto');
        $fileName = time() . '.' . $file->getClientOriginalExtension();
        $destinationPath = base_path('public/foto/profil/');
        $file->move($destinationPath, $fileName);
        $client = new Client();
        $response = $client->request(
            'POST',
            'http://127.0.0.1/UAS_V3421092/public/api/user/uuploadfotoprofil92',
            [
                'json' => [
                    'foto' => $fileName,
                ]
            ]
        );
        return back();
    }
}