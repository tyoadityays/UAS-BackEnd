@extends('template.master1')
@section('konten')
<div class="content-wrapper">
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-12">
          <h1>Tambah Data Agama</h1>
        </div>
        <div class="col-sm-12">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Tambah Data Agama</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <div class="col-md-12">
    <!-- jquery validation -->
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Silahkan Menambahkan Data Agama</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->
      <form id="quickForm" novalidate="novalidate" action="prosesaddagama92" method="post">
        @csrf
        <div class="card-body">
          <div class="form-group">
            <label for="exampleInputPassword1">Nama Agama</label>
            <input type="text" class="form-control" id="nama_agama" name="nama_agama" placeholder="Masukkan Agama">
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