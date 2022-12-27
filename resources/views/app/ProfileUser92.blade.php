@extends('template.master1')
@section('konten')
<!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Profile</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">User Profile</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card card-primary card-outline">
                                <div class="card-body box-profile">
                                    <div class="text-center">
                                        <h2>Foto Profil</h2>
                                        <img class="profile-user-img img-fluid" style="height: 100px; width:100px;"
                                            src="{{ url('foto/profil/' . $detaildata92[0]->user->foto) }}" alt="User profile picture">
                                    </div>
                                    <form enctype='multipart/form-data' action="{{ url('/uploadfotoprofil92') }}" method="POST">
                                        @csrf
                                        <div class="mt-3 form-group">
                                            <label for="exampleInputFile">Ubah Foto Profil</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" name="foto"
                                                        class="custom-file-input" id="exampleInputFile">
                                                    <label class="custom-file-label" for="exampleInputFile">Pilih Foto</label>
                                                </div>
                                            </div>
                                            <button type="submit" class="mt-3 btn btn-primary btn-block"><b>Edit Foto</b></button>
                                        </div>
                                    </form>                                  
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <div class="card card-primary card-outline">
                                <div class="card-body box-profile">
                                    <div class="text-center">
                                        <h2>Foto KTP</h2>
                                        <img class="profile-user-img img-fluid" style="height: 100px; width:150px;"
                                            src="{{ url('foto/ktp/' . $detaildata92[0]->foto_ktp) }}" alt="User profile picture">
                                    </div>
                                    <form enctype='multipart/form-data' action="{{ url('/uploadfotoktp92') }}" method="POST">
                                        @csrf
                                        <div class="mt-3 form-group">
                                            <label for="exampleInputFile">Ubah Foto KTP</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" name="foto_ktp"
                                                        class="custom-file-input" id="exampleInputFile">
                                                    <label class="custom-file-label" for="exampleInputFile">Pilih Foto</label>
                                                </div>
                                            </div>
                                            <button type="submit" class="mt-3 btn btn-primary btn-block"><b>Edit Foto</b></button>
                                        </div>
                                    </form>                                  
                                </div>
                                <!-- /.card-body -->
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-body">
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="settings">
                                            <form class="form-horizontal" action="{{ url('/editprofileuser92') }}" method="POST">
                                                @csrf
                                                <!-- @method('PUT') -->
                                                <div class="form-group row">
                                                    <label for="inputName"
                                                        class="col-sm-2 col-form-label">Nama Lengkap</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" name="name" class="form-control"
                                                            id="name" placeholder="Masukkan Nama"                                                            
                                                            value="{{ $detaildata92[0]->user->name }}">
                                                    </div>
                                                </div>                                           
                                                <div class="form-group row">
                                                    <label for="inputName"
                                                        class="col-sm-2 col-form-label">Email</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" name="email" class="form-control"
                                                            id="email" placeholder="Masukkan Email"                                                            
                                                            value="{{ $detaildata92[0]->user->email }}">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="inputName"
                                                        class="col-sm-2 col-form-label">Alamat</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" name="alamat" class="form-control"
                                                            id="alamat" placeholder="Masukkan Alamat"                                                            
                                                            value="{{ $detaildata92[0]->alamat }}">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="inputName"
                                                        class="col-sm-2 col-form-label">Tempat Lahir</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" name="tempat_lahir" class="form-control"
                                                            id="tempat" placeholder="Masukkan Tempat Lahir"                                                            
                                                            value="{{ $detaildata92[0]->tempat_lahir }}">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="inputName"
                                                        class="col-sm-2 col-form-label">Tanggal Lahir</label>
                                                    <div class="col-sm-10">
                                                        <input type="date" name="tanggal_lahir" class="form-control"
                                                            id="tanggal" placeholder="Masukkan Tanggal Lahir"                                                            
                                                            value="{{ $detaildata92[0]->tanggal_lahir }}">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="exampleInputFile"
                                                        class="col-sm-2 col-form-label">Agama</label>
                                                    <div class="col-sm-10">
                                                        <select class="form-control" name="id_agama" id="agama"> 
                                                        @foreach($agama as $a)
                                                            <option value="{{ $a->id }}" {{ ($a->id == $detaildata92[0]->id_agama)? 'selected' : '' }} >{{ $a->nama_agama }}</option>
                                                        @endforeach                                                                                                      
                                                        </select>
                                                    </div> 
                                                </div>
                                                <div class="form-group row">
                                                    <label for="inputName"
                                                        class="col-sm-2 col-form-label">Umur</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" name="umur" class="form-control"
                                                            id="umur" placeholder="Masukkan Umur"                                                            
                                                            value="{{ $detaildata92[0]->umur }}">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div
                                                        style="width: 100%; display:flex; justify-content:flex-end;">
                                                        <button type="submit" class="btn btn-sm btn-primary btn-lg">Update</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
@endsection
