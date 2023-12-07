@extends('layouts.index')
@section('title', 'CF '.env('APP_NAME'))

@section('content')
<div class="content-wrapper">

  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Beranda</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active"><a href="/">Beranda</a></li>
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
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
          <div class="inner">
            <h3>{{$gejala_count}}</h3>

            <p>Total Gejala</p>
          </div>
          <div class="icon">
            <i class="ion ion-thermometer"></i>
          </div>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
          <div class="inner">
            <h3>{{$penyakit_count}}</h3>

            <p>Total Penyakit</p>
          </div>
          <div class="icon">
            <i class="ion ion-bug"></i>
          </div>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-warning">
          <div class="inner">
            <h3>{{$pengetahuan_count}}</h3>

            <p>Total Pengetahuan</p>
          </div>
          <div class="icon">
            <i class="ion ion-flash"></i>
          </div>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-danger">
          <div class="inner">
            <h3>{{$diagnosa_count}}</h3>

            <p>Total Riwayat Diagnosa</p>
          </div>
          <div class="icon">
            <i class="ion ion-person-add"></i>
          </div>
        </div>
      </div>
      <!-- ./col -->
    </div>
    <!-- /.row -->

    <div class="row">
      <div class="col-md-12">
        <div class="card mb-3">
          <div class="row no-gutters">
            <div class="col-md-4">
              <img src="{{asset('assets')}}/Mengenal-Sistem-Ekskresi-Paru-Paru-Manusia.jpg" class="img-fluid" alt="...">
            </div>
            <div class="col-md-8">
              <div class="card-body">
                <h2 class="">Paru Paru</h2>
                <p class="card-text">Paru–paru merupakan salah satu organ pernapasan pada manusia. Paru–paru termasuk kedalam organ tubuh yang sangat penting untuk pernapasan. Paru–paru terdiri dari paru–paru bagian kanan dan paru–paru bagian kiri. Ukuran paru–paru bagian kiri lebih kecil dari ukuran paru–paru bagian kanan.
                <p>
                Bentuk paru–paru seperti bunga karang besar yang berada di dalam rongga dada(toraks) pada sisi lain jantung dan pembuluh darah besar
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      @foreach($penyakits as $key => $penyakit)
      <div class="col-sm-6">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">{{$penyakit->nama_penyakit}}</h5>
            <p class="card-text">{{$penyakit->det_penyakit}}</p>
          </div>
        </div>
      </div>
      @endforeach
    </div>

  </div><!-- /.container-fluid -->
</section>
</div>

@endsection

