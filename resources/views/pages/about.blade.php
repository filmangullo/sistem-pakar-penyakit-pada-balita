@extends('layouts.index')
@section('title', 'CF '.env('APP_NAME'))

@section('content')
<div class="content-wrapper">

  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Tentang</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/">Beranda</a></li>
            <li class="breadcrumb-item active">Tentang</li>
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
        <div class="col-lg-6 col-12">
          <div class="card">
            <div class="card-body">
              <div class="text-center d-flex flex-column align-items-center justify-content-center">
                  <h2>Wafiq Khairiyah Azizah</h2>
                  <p class="lead mb-5">Universitas Negeri Medan, Ilmu Komputer<br>
                    Wafiq Khairiyah Azizah
                  </p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- /.row -->

    </div><!-- /.container-fluid -->
  </section>
</div>

@endsection