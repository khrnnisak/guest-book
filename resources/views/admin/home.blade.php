@extends('layouts.main')

@section('title', 'Dashboard')


@section('content')
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                  <h3 class="font-weight-bold">Welcome {{ Auth::user()->name }}</h3>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card tale-bg">
                <div class="card-people mt-auto">
                  <img src="{{asset('assets/img/dashboard/people.svg')}}" alt="people">
                </div>
              </div>
            </div>
            <div class="col-md-6 grid-margin transparent">
              <div class="row">
                <div class="col-md-6 mb-4 stretch-card transparent">
                  <div class="card card-tale">
                    <div class="card-body">
                      <p class="mb-4">Tamu Hari Ini</p>
                      <p class="fs-30 mb-2">{{$today}}</p>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 mb-4 stretch-card transparent">
                  <div class="card card-dark-blue">
                    <div class="card-body">
                      <p class="mb-4">Telah Berkunjung</p>
                      <p class="fs-30 mb-2">{{$sudah}}</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 mb-4 mb-lg-0 stretch-card transparent">
                  <div class="card card-light-blue">
                    <div class="card-body">
                      <p class="mb-4">Belum Berkunjung</p>
                      <p class="fs-30 mb-2">{{$belum}}</p>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 stretch-card transparent">
                  <div class="card card-light-danger">
                    <div class="card-body">
                      <p class="mb-4">Batal</p>
                      <p class="fs-30 mb-2">{{$batal}}</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="container">
            <h4 class="card-title">Tamu hari ini</h4>
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        

        @if ($jadwal)
            <table class="table table-striped">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Instasi</th>
                    <th>Jadwal Temu</th>
                    <th>Pegawai</th>
                    <th>Keperluan</th>
                    <th>Status</th>
                </tr>
                @foreach ($jadwal as $a)
                    <tr>
                        <td>{{$loop->iteration }}</td>
                        <td>{{ $a->nama_lengkap }}</td>
                        <td>{{ $a->instansi }}</td>
                        <td>{{ $a->jadwal_temu }}</td>
                        <td>{{ $a->nama }}</td>
                        <td>{{ $a->keperluan }}</td>
                        <td class="align-middle text-center text-sm">
                            @if($a->status == 'Batal')
                                <span class="badge badge-sm bg-gradient-danger">{{ $a->status }}</span>
                            @elseif($a->status == 'Belum')
                                <span class="badge badge-sm bg-gradient-warning">{{ $a->status }}</span>
                            @elseif($a->status == 'Selesai')
                                <span class="badge badge-sm bg-gradient-primary">{{ $a->status }}</span>
                            @else
                                <span class="badge badge-sm bg-gradient-success">{{ $a->status }}</span>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </table>
        @endif
    </div>
@endsection