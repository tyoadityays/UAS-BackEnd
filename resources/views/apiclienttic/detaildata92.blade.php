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
            @foreach ($user['data'] as $detaildata92)
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
                                            src="{{ url('foto/profil/' . $detaildata92['user']['foto']) }}" alt="User profile picture">
                                    </div>                              
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <div class="card card-primary card-outline">
                                <div class="card-body box-profile">
                                    <div class="text-center">
                                        <h2>Foto KTP</h2>
                                        <img class="profile-user-img img-fluid" style="height: 100px; width:150px;"
                                            src="{{ url('foto/ktp/' . $detaildata92['foto_ktp']) }}" alt="User profile picture">
                                    </div>                                                             
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
                                            <form class="form-horizontal" action="/editprofileuser92" method="POST">
                                                @csrf
                                                <!-- @method('PUT') -->
                                                <div class="form-group row">
                                                    <label for="inputName"
                                                        class="col-sm-2 col-form-label">Nama Lengkap</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" name="name" class="form-control"
                                                            id="name" placeholder="Masukkan Nama"                                                            
                                                            value="{{ $detaildata92['user']['name'] }}" disabled>
                                                    </div>
                                                </div>                                           
                                                <div class="form-group row">
                                                    <label for="inputName"
                                                        class="col-sm-2 col-form-label">Email</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" name="email" class="form-control"
                                                            id="email" placeholder="Masukkan Email"                                                            
                                                            value="{{ $detaildata92['user']['email'] }}" disabled>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="inputName"
                                                        class="col-sm-2 col-form-label">Alamat</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" name="alamat" class="form-control"
                                                            id="alamat" placeholder="Masukkan Alamat"
                                                            value="{{ $detaildata92['alamat'] }}" disabled>    
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="inputName"
                                                        class="col-sm-2 col-form-label">Tempat Lahir</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" name="tempat" class="form-control"
                                                            id="tempat" placeholder="Masukkan Tempat Lahir"                                                            
                                                            value="{{ $detaildata92['tempat_lahir'] }}" disabled>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="inputName"
                                                        class="col-sm-2 col-form-label">Tanggal Lahir</label>
                                                    <div class="col-sm-10">
                                                        <input type="date" name="tanggal" class="form-control"
                                                            id="tanggal" placeholder="Masukkan Tanggal Lahir"                                                            
                                                            value="{{ $detaildata92['tanggal_lahir'] }}" disabled>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="inputName"
                                                        class="col-sm-2 col-form-label">Agama</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" name="agama" class="form-control"
                                                            id="agama" placeholder="Masukkan Agama"                                                            
                                                            value="{{ $detaildata92['agama']['nama_agama'] }}" disabled>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="inputName"
                                                        class="col-sm-2 col-form-label">Umur</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" name="umur" class="form-control"
                                                            id="umur" placeholder="Masukkan Umur"                                                            
                                                            value="{{ $detaildata92['umur'] }}" disabled>
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
            @endforeach
        </div>
@endsection
