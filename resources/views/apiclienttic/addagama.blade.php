@extends('template.mastertemplate')
@section('konten')
<div class="col-md-12">
    <!-- jquery validation -->
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Silahkan Menambahkan Agama Kedalam Sistem</small></h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->
      <form id="quickForm" novalidate="novalidate" method="POST" action=" {{ url ('/agama/clientapi/prosesaddagama92') }}">
        @csrf
        <div class="card-body">
          <div class="form-group">
            <label for="agama">Agama</label>
            <input type="text" name="nama_agama" class="form-control" id="nama_agama" placeholder="Silahkan Masukkan Agama">
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
@endsection