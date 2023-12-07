@extends('layouts.index')
@section('title', 'CF '.env('APP_NAME'))

@section('content')
<div class="content-wrapper">

  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Gejala</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{url('/')}}">Beranda</a></li>
            <li class="breadcrumb-item active"><a href="{{url('/gejala')}}">Gejala</a></li>
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
            <a href="{{url('/gejala/create')}}" class="btn btn-primary rounded-0">Tambah gejala</a>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example2" class="table table-bordered table-hover">
              <thead>
              <tr>
                <th>No</th>
                <th>Nama Gejala</th>
                <th>Aksi</th>
              </tr>
              </thead>
              <tbody>
              @foreach($gejala as $key => $row)
              <tr>
                <td>{{$key+1}}</td>
                <td>{{$row->nama_gejala}}</td>
                <td>
                  <form action="{{url("/gejala/$row->id")}}" method="POST" class="flex gap-2">
                    @method('delete')
                    @csrf
                    <a href="{{url('/gejala/edit/'.$row->id)}}" class="btn btn-primary btn-sm rounded-0"><i class="fas fa-edit"></i></a>
                    <button type="submit" class="btn btn-danger btn-sm rounded-0"><i class="fas fa-trash"></i></button>
                  </form>
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

