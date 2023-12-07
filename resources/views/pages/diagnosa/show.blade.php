@extends('layouts.index')
@section('title', 'CF '.env('APP_NAME'))

@section('content')
<div class="content-wrapper">

  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Hasil Diagnosa  <button class="btn btn-primary btn-sm mr-2" onclick="window.print();return false;" ><i class="fas fa-print"></i>Cetak</button></h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{url('/')}}">Beranda</a></li>
            <li class="breadcrumb-item"><a href="{{url('/riwayat_diagnosa')}}">Riwayat Diagnosa</a></li>
            <li class="breadcrumb-item active">Hasil Diagnosa</li>
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
            <table>
              <tr>
                <th>Nama Pasien</th>
                <td>:</td>
                <td>{{$diagnosa->nama_pasien}}</td>
              </tr>
              <tr>
                <th>Usia</th>
                <td>:</td>
                <td>{{$diagnosa->usia_pasien}} Tahun</td>
              </tr>
            </table>
          </div>
          <!-- /.card-header -->
          <div class="card-header card-primary">
                Gejala Pasien
              </div>
              <div class="card-body bg-light">
                <table id="example2" class="table table-bordered table-hover">
                <thead>
              <tr>
                <th>No</th>
                <th>Kode</th>
                <th>Gejala</th>
                <th>Pilihan</th>
              </tr>
              </thead>
              <tbody>
                @foreach($data_input as $key => $row)
                  <tr>
                    <td>{{$key+1}}</td>
                    <td>G{{$row->kode_rule}}</td>
                    <td>{{$row->nama_gejala}}</td>
                    <td>{{$row->persentase_user}}</td>
                  </tr>
                @endforeach
              </tbody>
                </table>
              </div>

            <div class="card mt-4">
              <div class="card-body bg-light">
                <h1>Hasil Diagnosa</h1>
                <p>{{env('APP_NAME')}} yang diderita adalah</p>
              </div>
            </div>
            <div class="row">
            @foreach($diagnosaSame as $diagnosa)
            @if($diagnosa['det'])
            <div class="col">
              <div class="card">
                <div class="card-header card-primary">
                  <h2 class="text-success mb-4">{{$diagnosa['name']}} {{number_format($diagnosa['hasil'])}}%</h2>
                  Detail {{$diagnosa['name']}}
                </div>
                <div class="card-body bg-light">
                  <p>{{$diagnosa['det']}}</p>
                </div>
                @if($diagnosa['srn'] != '-')
                <div class="card-header">
                  Saran {{$diagnosa['name']}}
                </div>
                <div class="card-body bg-light">
                  <p>{{$diagnosa['srn']}}</p>
                </div>
                @endif
              </div>
            </div>
            @endif
            @endforeach
            </div>
            <div class="card mt-4">
              <div class="card-header card-primary">
                Kemungkinan Penyakit Lain
              </div>
              <div class="card-body bg-light">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Kode</th>
                    <th>Penyakit</th>
                    <th>Hasil</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($list_penyakit as $key => $row)
                      <tr>
                        <td>G{{$row->kode_case}}</td>
                        <td>{{$row->nama_penyakit}}</td>
                        <td>{{$row->hasil}}%</td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
        <div class="row mb-3">
          <div class="col-md-2">
            <a href="{{ redirect()->back()->getTargetUrl() }}" class="btn btn-warning btn sm"><i class="fas fa-arrow-left"></i> Kembali</a>
          </div>
        </div>
      </div>
    </div>
    <!-- /.row -->
  </div><!-- /.container-fluid -->
</section>
</div>

@endsection

