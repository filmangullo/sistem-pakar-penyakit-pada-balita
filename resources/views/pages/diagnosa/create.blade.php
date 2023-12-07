@extends('layouts.index')
@section('title', 'CF '.env('APP_NAME'))

@section('content')
<div class="content-wrapper">

  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0"> Mengidentifikasi Penyakit Paru-Paru</h1>
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
          @if(session('warning'))
          <div class="alert alert-warning" role="alert">
            {{session('warning')}}
          </div>
          @endif
          <div class="card">
            <!-- /.card-header -->
            <div class="card-body">
              <form action="{{url('/diagnosa')}}" method="POST">
                @csrf
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="nama_pasien">Nama</label>
                      <input type="text" class="form-control" name="nama_pasien" id="nama_pasien" placeholder="Masukkan nama pasien" required>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="usia_pasien">Usia</label>
                      <input type="number" class="form-control" name="usia_pasien" id="usia_pasien" placeholder="Masukkan usia pasien" required>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group d-none">
                      <label for="kelas_pasien">Kelas</label>
                      <input type="text" class="form-control" name="kelas_pasien" id="kelas_pasien" placeholder="Masukkan kelas pasien">
                    </div>
                  </div>
                </div>
                <table id="example2" class="table table-borderless table-sm table-hover">
                  <thead>
                    <tr>
                     
                      <th class="d-none">Kode</th>
                      <th>Gejala</th>
                      <th>Pilih Kondisi</th>
                    
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($gejala as $key => $row)
                    <tr>
                      <input type="hidden" name="gejala_ids[]" value="{{$row->id}}">
                     
                      <td class="d-none">G{{$row->id}}</td>
                      <td>{{$row->nama_gejala}}</td>
                      <td>
                        <select name="result[]" class="form-control">
                          <option value="0">Tidak</option>
                          <option value="0.4">Mungkin</option>
                          <option value="0.6">Kemungkinan Besar</option>
                          <option value="0.8">Hampir Pasti</option>
                          <option value="1">Pasti</option>
                        </select>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
                <button class="btn bt-sm btn-info mb-2" type="submit" >Lakukan Diagnosa</button>
              </form>
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