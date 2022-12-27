@extends('template.master1')
@section('konten')
<div class="content-wrapper">
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-12">
          <h1>Tambah Data Penduduk</h1>
        </div>
        <div class="col-sm-12">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Tambah Data Penduduk</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <div class="col-md-12">
    <!-- jquery validation -->
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Silahkan Menambahkan Data Penduduk></h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->
      <form id="quickForm" novalidate="novalidate" action="prosesaddpenduduk92" method="post">
        @csrf
        <div class="card-body">
          <div class="form-group">
            <label for="exampleInputPassword1">NIK</label>
            <input type="text" class="form-control" id="nik" name="nik" placeholder="Masukkan NIK">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama">
          </div>
          <div class="form-group">
            <label for="exampleInputFile">Jenis Kelamin</label>
            <select class="form-control" id="kelamin" name="kelamin">
              <option value="Laki-laki">Laki-laki</option>
              <option value="Perempuan">Perempuan</option>
            </select>
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Alamat</label>
            <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Masukkan Alamat">
          </div>
          <div class="form-group">
            <label for="exampleInputFile">Status Perkawinan</label>
            <select class="form-control" name="status" id="status">
              <option value="Belum Kawin">Belum Kawin</option>
              <option value="Kawin">Kawin</option>
            </select>
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Pekerjaan</label>
            <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" placeholder="Masukkan Pekerjaan">
          </div>
          <div class="form-group">
            <label for="exampleInputFile">Kewarganegaraan</label>
            <select class="form-control" name="warga" id="warga">
              <option value="WNI">WNI</option>
              <option value="WNA">WNA</option>
            </select>
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Tempat Lahir</label>
            <input type="text" class="form-control" id="asal" name="asal" placeholder="Masukkan Tempat Lahir">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Tanggal Lahir</label>
            <input type="date" class="form-control" id="tanggal" name="tanggal">
          </div>
          <div class="form-group">
            <label for="exampleInputFile">Golongan Darah</label>
            <select class="form-control" name="golongan" id="golongan">
              <option value="A">A</option>
              <option value="AB">AB</option>
              <option value="O">O</option>
              <option value="B">B</option>
            </select>
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