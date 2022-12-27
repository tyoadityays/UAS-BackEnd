@extends('template.master1')
@section('konten')
<div class="content-wrapper">
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-12">
          <h1>Update Password</h1>
        </div>
        <div class="col-sm-12">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Update Password</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <div class="col-md-12">
    <!-- jquery validation -->
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Silahkan Update Password</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->
      <form id="quickForm" novalidate="novalidate" action="prosesupdatepassword92" method="post">
        @csrf
        <div class="card-body">
          <div class="form-group">
            <label for="exampleInputPassword1">Masukkan Password Lama</label>
            <input type="password" class="form-control" id="password_lama" name="password_lama" placeholder="Masukkan Password Lama">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Masukkan Password Baru</label>
            <input type="password" class="form-control" id="password_baru" name="password_baru" placeholder="Masukkan Password Baru">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Konfirmasi Password Baru</label>
            <input type="password" class="form-control" id="konfirmasi_password" name="konfirmasi_password" placeholder="Konfirmasi Password Baru">
          </div>                                
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </form>
    </div>
    <!-- /.card -->
    </div>
</div>

@endsection