@extends('layouts.index')
@section('title', 'CF '.env('APP_NAME'))

@section('content')
<div class="content-wrapper">

  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Tambah Data Penyakit</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{url('/')}}">Beranda</a></li>
            <li class="breadcrumb-item active"><a href="{{url('/penyakit')}}">Penyakit</a></li>
            <li class="breadcrumb-item active"><a href="{{url('/penyakit/create')}}">Tambah Data</a></li>
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
      <div class="col-md-6">
        <div class="card">
          <form action="{{url('/penyakit')}}" method="POST">
            @csrf
            <div class="card-body">
              <div class="form-group">
                <label for="nama_penyakit">Nama Penyakit</label>
                <input type="text" class="form-control" name="nama_penyakit" id="nama_penyakit" placeholder="Masukkan nama penyakit" required>
              </div>
              <div class="form-group">
                <label for="det_penyakit">Detail Penyakit</label>
                <textarea rows="5" class="form-control" name="det_penyakit" id="det_penyakit" placeholder="Masukkan detail penyakit" required></textarea>
              </div>
              <div class="form-group">
                <label for="srn_penyakit">Saran Penyakit</label>
                <textarea rows="5" class="form-control" name="srn_penyakit" id="srn_penyakit" placeholder="Masukkan saran penyakit" required></textarea>
              </div>
              {{-- <div class="form-group">
                <label for="min_cf">Min CF</label>
                <input type="number"  step="0.01" class="form-control" name="min_cf" id="min_cf" placeholder="Masukkan nilai min cf" required>
              </div>
              <div class="form-group">
                <label for="max_cf">Max CF</label>
                <input type="number"  step="0.01" class="form-control" name="max_cf" id="max_cf" placeholder="Masukkan nilai max cf" required>
              </div> --}}
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </form>
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

