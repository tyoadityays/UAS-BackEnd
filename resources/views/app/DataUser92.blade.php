@extends('template.master1')
@section('konten')
 
        <!-- Nav -->  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>DataTables</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">DataTables</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                
                </div>
          <div class="col-12">
          
            <div class="card">
                
                <div class="card-header">
                <h3 class="card-title">DataTable with default features</h3>
                 </div>
                </div>
                
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Tanggal daftar</th>
                    <th>Tanggal update</th>
                    <th>Role</th>
                    <th>Status aktif</th>
                    <th>Foto</th>
                    <th>Tool</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach ($datauser92 as $alldata)
                    <tr>
                        <td>{{ $alldata->id }}</td>
                        <td>{{ $alldata->name }}</td>
                        <td>{{ $alldata->email }}</td>
                        <td>{{ $alldata->created_at }}</td>
                        <td>{{ $alldata->updated_at }}</td>
                        <td>{{ $alldata->role }}</td>
                        <td>{{ $alldata->is_aktif }}</td>
                        <td><img class="profile-user-img img-fluid" style="height: 100px; width:100px;"
                            src="{{ url('foto/profil/' . $alldata->foto) }}" alt="User profile picture"></td>
                        <td> 
                          <form onsubmit="return confirm('Approve user ?');"
                            action="{{ url('approveuser92/'.$alldata->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="btn btn-sm btn-primary btn-lg">Approve</button>
                          </form>
                          <form onsubmit="return confirm('Unapprove user ?');"
                            action="{{ url('unapproveuser92/'.$alldata->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="btn btn-sm btn-danger shadow">Unapprove</button>
                          </form>
                          <a href="{{ url('detaildatauser92/'.Crypt::encryptString($alldata->id)) }}"> <button type="button" class="btn btn-sm btn-primary btn-lg">Detail</button></a>
                          <form onsubmit="return confirm('Hapus user ?');"
                            action="{{ url('hapusdatauser92/'.$alldata->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger shadow">Delete</button>
                          </form>
                        </td>
                      </tr>
                    @endforeach 
                    
                
                 
                  </tbody>
                  <!--<tfoot>
                  <tr>
                    <th>No</th>
                    <th>NIK</th>
                    <th>Nama</th>
                    <th>Jenis Kelamin</th>
                    <th>Alamat</th>
                    <th>Status</th>
                    <th>Pekerjaan</th>
                    <th>Kewarganegaraan</th>
                    <th>Tempat Lahir</th>
                    <th>Tanggal Lahir</th>
                    <th>Golongan Darah</th>
                  </tr>
                  </tfoot>-->
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection