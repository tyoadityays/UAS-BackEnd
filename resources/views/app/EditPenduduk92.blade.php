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
      <form id="quickForm" novalidate="novalidate" action="{{ url('proseseditpenduduk92/'.$datapenduduk92->id) }}" method="post">
        @csrf
        @method('PUT')
        <div class="card-body">
          <div class="form-group">
            <label for="exampleInputPassword1">NIK</label>
            <input type="text" class="form-control" id="nik" name="nik" placeholder="Masukkan NIK" value="{{ $datapenduduk92->nik }}">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama" value="{{ $datapenduduk92->nama }}">
          </div>
          <div class="form-group">
            <label for="exampleInputFile">Jenis Kelamin</label>
            <select class="form-control" id="kelamin" name="kelamin">
              <option value="Laki-laki" @if($datapenduduk92->kelamin=="Laki-laki") selected @endif >Laki-laki</option>
              <option value="Perempuan" @if($datapenduduk92->kelamin=="Perempuan") selected @endif >Perempuan</option>
            </select>
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Alamat</label>
            <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Masukkan Alamat" value="{{ $datapenduduk92->alamat }}">
          </div>
          <div class="form-group">
            <label for="exampleInputFile">Status Perkawinan</label>
            <select class="form-control" name="status" id="status" value="{{ $datapenduduk92->status }}">
              <option value="Belum Kawin" @if($datapenduduk92->status=="Belum Kawin") selected @endif >Belum Kawin</option>
              <option value="Kawin" @if($datapenduduk92->status=="Kawin") selected @endif >Kawin</option>
            </select>
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Pekerjaan</label>
            <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" placeholder="Masukkan Pekerjaan" value="{{ $datapenduduk92->pekerjaan }}">
          </div>
          <div class="form-group">
            <label for="exampleInputFile">Kewarganegaraan</label>
            <select class="form-control" name="warga" id="warga" value="{{ $datapenduduk92->warga }}">
              <option value="WNI" @if($datapenduduk92->warga=="WNI") selected @endif >WNI</option>
              <option value="WNA" @if($datapenduduk92->warga=="WNA") selected @endif >WNA</option>
            </select>
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Tempat Lahir</label>
            <input type="text" class="form-control" id="asal" name="asal" placeholder="Masukkan Tempat Lahir" value="{{ $datapenduduk92->asal }}">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Tanggal Lahir</label>
            <input type="date" class="form-control" id="tanggal" name="tanggal" value="{{ $datapenduduk92->tanggal }}">
          </div>
          <div class="form-group">
            <label for="exampleInputFile">Golongan Darah</label>
            <select class="form-control" name="golongan" id="golongan" value="{{ $datapenduduk92->golongan }}">
              <option value="A" @if($datapenduduk92->golongan=="A") selected @endif>A</option>
              <option value="AB" @if($datapenduduk92->golongan=="AB") selected @endif>AB</option>
              <option value="O" @if($datapenduduk92->golongan=="O") selected @endif>O</option>
              <option value="B" @if($datapenduduk92->golongan=="B") selected @endif>B</option>
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