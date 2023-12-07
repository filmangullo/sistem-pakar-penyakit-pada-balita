@extends('layouts.index')
@section('title', 'CF '.env('APP_NAME'))

@section('content')
<div class="content-wrapper">

  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Edit Data Pengetahuan</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{url('/')}}">Beranda</a></li>
            <li class="breadcrumb-item active"><a href="{{url('/pengetahuan')}}">Pengetahuan</a></li>
            <li class="breadcrumb-item active"><a href="{{url('/pengetahuan/edit')}}">Edit Data</a></li>
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
          <form action="{{url("/pengetahuan")}}" method="POST">
            @method('put')
            @csrf
            <input type="hidden" name="id" value="{{$pengetahuan->id}}">
            <div class="card-body">
              <div class="form-group">
                <label for="penyakit_id" >Penyakit</label>
                <select name="penyakit_id" id="penyakit_id" class="form-control">
                  <option value="">--Pilih Penyakit--</option>
                  @foreach($penyakit as $key => $row)
                    @if($row->id == $pengetahuan->penyakit_id)
                    <option selected value="{{$row->id}}">{{$row->nama_penyakit}}</option>
                    @else
                    <option value="{{$row->id}}">{{$row->nama_penyakit}}</option>
                    @endif
                  @endforeach
                </select>
              </div>
              <div class="form-group">
                <label for="gejala_id">Gejala</label>
                <select id="gejala_id" name="gejala_id" class="form-control">
                  <option value="">--Pilih Gejala--</option>
                  @foreach($gejala as $key => $row)
                    @if($row->id == $pengetahuan->gejala_id)
                    <option selected value="{{$row->id}}">{{$row->nama_gejala}}</option>
                    @else
                    <option value="{{$row->id}}">{{$row->nama_gejala}}</option>
                    @endif
                  @endforeach
                </select>
              </div>
              {{-- <div class="form-group">
                <label for="mb">MB</label>
                <input type="number" value="{{$pengetahuan->mb}}" step="0.01" class="form-control" name="mb" id="mb" placeholder="Masukkan nilai MB" required>
              </div>
              <div class="form-group">
                <label for="md">MD</label>
                <input type="number" value="{{$pengetahuan->md}}" step="0.01" class="form-control" name="md" id="md" placeholder="Masukkan nilai MD" required>
              </div> --}}
              <div class="form-group">
                <label for="cf">CF</label>
                <input type="number" value="{{$pengetahuan->cf}}" step="0.01" class="form-control" name="cf" id="cf" placeholder="Masukkan nilai CF" required>
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

