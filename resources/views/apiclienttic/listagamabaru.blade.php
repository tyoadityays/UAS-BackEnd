@extends('template.mastertemplate')
@section('konten')
<div class="card">
    <div class="card-header">
      <h3 class="card-title">DataTable with default features</h3>
      <a href="{{ url ('/agama/clientapi/addagama92') }}"><button type="button" class="btn btn-block btn-primary btn-sm">Tambah Agama</button></a>
    </div>
    
    <!-- /.card-header -->
    <div class="card-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>Agama</th>
          <th>Tool</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($agama['data'] as $all)
        <tr>
            <td>{{ $all['nama_agama'] }}</td>
            
            <td>

              <a href="{{ url('/agama/clientapi/editagama92/'.$all['id']) }}"> <button type="button" class="btn btn-sm btn-primary btn-lg">Edit</button></a>

              <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                action="{{ url('/agama/clientapi/hapusagama92/'.$all['id']) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm btn-danger shadow">Delete</button>
              </form>

            </td>
          </tr>
        @endforeach
        
        
        
        </tbody>
        <tfoot>
        <tr>
          <th>Agama</th>
          <th>Tool</th>
        </tr>
        </tfoot>
      </table>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
@endsection