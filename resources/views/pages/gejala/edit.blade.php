@extends('layouts.index')
@section('title', 'CF '.env('APP_NAME'))

@section('content')
<div class="content-wrapper">

  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Edit Data Gejala</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{url('/')}}">Beranda</a></li>
            <li class="breadcrumb-item active"><a href="{{url('/gejala')}}">Gejala</a></li>
            <li class="breadcrumb-item active"><a href="{{url('/gejala/edit')}}">Edit Data</a></li>
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
          <form action="{{url("/gejala/$gejala->id")}}" method="POST">
            @method('put')
            @csrf
            <input type="hidden" name="id" value="{{$gejala->id}}">
            <div class="card-body">
              <div class="form-group">
                <label for="nama_gejala">Nama Gejala</label>
                <input type="text" class="form-control" name="nama_gejala" id="nama_gejala" placeholder="Masukkan nama gejala" required value="{{$gejala->nama_gejala}}">
              </div>
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

