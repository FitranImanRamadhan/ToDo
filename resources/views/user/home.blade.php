@extends('adminlayout')
@section('content')
<div class="container">
  <div class="card-header bg-primary text-white">
    <h4>Admin : {{ Auth::user()->nama }}</h4>
  </div>
  <br>
  <div class="row">
    <div class="col-md-6 mb-4">
      <div class="card">
        <div class="card-header bg-primary text-white text-center">
          <h5>Jumlah Data Pengguna</h5>
        </div>
        <div class="card-body">
          <div class="text-center mb-4">
            <p><i class="fas fa-users fa-3x text-primary"></i></p>
            {{-- <h3>{{ $jumlahUsers }}</h3> --}}
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-6 mb-4">
      <div class="card">
        <div class="card-header bg-primary text-white text-center">
          <h5>Jumlah Data Pegawai</h5>
        </div>
        <div class="card-body">
          <div class="text-center mb-4">
            <p><i class="fas fa-users fa-3x text-primary"></i></p>
            {{-- <h3>{{ $jumlahPegawais }}</h3> --}}
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6 mb-4">
      <div class="card">
        <div class="card-header bg-primary text-white text-center">
          <h5>Jumlah Data Absensi</h5>
        </div>
        <div class="card-body">
          <div class="text-center mb-4">
            <p><i class="fas fa-calendar-alt fa-3x text-primary"></i></p>
            {{-- <h3>{{ $jumlahAbsensis }}</h3> --}}
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-6 mb-4">
      <div class="card">
        <div class="card-header bg-primary text-white text-center">
          <h5>Jumlah Data Gaji</h5>
        </div>
        <div class="card-body">
          <div class="text-center mb-4">
            <p><i class="fas fa-money-bill fa-3x text-primary"></i></p>
            {{-- <h3>{{ $jumlahGajis }}</h3> --}}
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
