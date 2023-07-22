@extends('layouts.main')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card border-primary">

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <h5 align="center"><b>Detail Kunjungan</b> </h5>
                    @if($tamu)
                          <table class="table table-sm">
                            <tbody>
                              <tr>
                                <td class="table-info" width="200px">Nama : </td>
                                <td>: {{ $tamu->nama_lengkap}}</td>
                              </tr>
                              <tr>
                                <td class="table-info">Instansi</td>
                                <td>: {{ $tamu->instansi }}</td>
                              </tr>
                              <tr>
                                <td class="table-info" width="200px">Jadwal</td>
                                <td>: {{ $tamu ->jadwal_temu }}</td>
                              </tr>
                              <tr>
                              <tr>
                                <td class="table-info" width="200px">Yang ingin ditemui : </td>
                                <td>: {{ $tamu->pegawai->nama }}</td>
                              </tr>
                              <tr>
                                <td class="table-info">Keperluan</td>
                                <td>: {{ $tamu->keperluan }}</td>
                              </tr>
                              <tr>
                                <td class="table-info" width="200px">Status</td>
                                <td>: {{ $tamu ->status }}</td>
                              </tr>
                              <tr>
                            </tbody>
                          </table>
                    @endif 
            </div>
        </div>
    </div>
</div>
@endsection