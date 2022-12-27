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
      @foreach ($agama['data'] as $all)
      <form id="quickForm" novalidate="novalidate" method="POST" action=" {{ url ('/agama/clientapi/proseseditagama92/'.$all['id']) }}">
        @csrf
        @method('PUT');
        <div class="card-body">
          <div class="form-group">
            <label for="agama">Agama</label>
            <input type="text" name="nama_agama" class="form-control" id="nama_agama" placeholder="Silahkan Masukkan Agama" value="{{ $all['nama_agama'] }}">
          </div>
          
          </div>
        <!-- /.card-body -->
        <div class="card-footer">
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </form>
      @endforeach
    </div>
    <!-- /.card -->
    </div>
@endsection