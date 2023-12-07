@extends('layouts.index')
@section('title', 'CF '.env('APP_NAME'))

@section('content')
<div class="content-wrapper">

  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Riwayat Konsultasi</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{url('/')}}">Beranda</a></li>
            <li class="breadcrumb-item active"><a href="{{url('/riwayat_diagnosa')}}">Riwayat Diagnosa</a></li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->
  
<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <a href="{{url('/diagnosa')}}" class="btn btn-primary rounded-0">Melakukan Diagnosa</a>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example2" class="table table-bordered table-hover">
              <thead>
              <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Usia</th>
                <th>Penyakit</th>
                <th>Nilai CF</th>
                <th>Aksi</th>
              </tr>
              </thead>
              <tbody>
              @foreach($diagnosas as $key => $row)
              <tr>
                <td>{{$key+1}}</td>
                <td>{{$row->nama_pasien}}</td>
                <td>{{$row->usia_pasien}}</td>
                <td>{{$row->penyakit->nama_penyakit}}</td>
                <td>{{$row->hasil_cf}}</td>
                <td>
                  <a href="{{url("/diagnosa/$row->id")}}" class="btn btn-primary btn-sm rounded-0"><i class="fas fa-info"></i></a>
                </td>
              </tr>
              @endforeach
              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
    </div>
    <!-- /.row -->
  </div><!-- /.container-fluid -->
</section>
</div>

@endsection

@section('script')
<script>
  $(function () {
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
@endsection
