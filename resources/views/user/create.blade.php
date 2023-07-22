@extends('layouts.users')

@section('content')
<br><br>
<br><br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">{{ __('Profil') }}</div>

                <div class="card-body">

                    @if(session()->has('success'))
                        <div class="alert alert-success">{{ session()->get('success') }}</div>
                    @endif

                    <form method="POST" action="{{ route('tamu.add') }}" enctype="multipart/form-data" id="myForm">
                        @csrf
                        <div class="form-group row">
                            <label for="nama_lengkap" class="col-md-4 col-form-label text-md-right">{{ __('Nama Lengkap') }}</label>
                            <div class="col-md-6">
                                <input id="nama_lengkap" type="text" class="form-control{{ $errors->has('nama_lengkap') ? ' is-invalid' : '' }}" name="nama_lengkap" value="{{ old('nama_lengkap') }}" rows="3"></input>

                                @if ($errors->has('nama_lengkap'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nama_lengkap') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="instansi" class="col-md-4 col-form-label text-md-right">{{ __('instansi') }}</label>
                            <div class="col-md-6">
                                <input id="instansi" type="text" class="form-control{{ $errors->has('instansi') ? ' is-invalid' : '' }}" name="instansi" value="{{ old('instansi') }}" rows="3"></input>

                                @if ($errors->has('instansi'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('instansi') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="jadwal_temu" class="col-md-4 col-form-label text-md-right">{{ __('Jadwal') }}</label>
                            <div class="col-md-6">
                                <input id="jadwal_temu" type="datetime-local" class="form-control{{ $errors->has('jadwal_temu') ? ' is-invalid' : '' }}" name="jadwal_temu" value="{{ old('jadwal_temu') }}" rows="3"></input>

                                @if ($errors->has('jadwal_temu'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('jadwal_temu') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="pegawai_id" class="col-md-4 col-form-label text-md-right">{{ __('Pegawai') }}</label>

                            <div class="col-md-4">
                                <select  id="pegawai_id" name='pegawai_id' class="form-control{{ $errors->has('pegawai_id') ? ' is-invalid' : '' }}" value="{{ old('pegawai_id') }}" required autofocus>
                                    <option selected='selected'>Pilih Pegawai</option>
                                @foreach ($pegawais as $pegawai)
                                    <option value="{{$pegawai->id}}">{{$pegawai->nama}}</option>
                                @endforeach
                                </select>
                                @if ($errors->has('pegawai_id'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('pegawai_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="keperluan" class="col-md-4 col-form-label text-md-right">{{ __('Keperluan') }}</label>
                            <div class="col-md-6">
                                <textarea id="keperluan" type="textarea" class="form-control{{ $errors->has('keperluan') ? ' is-invalid' : '' }}" name="keperluan" value="{{ old('keperluan') }}" rows="3"></textarea>

                                @if ($errors->has('keperluan'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('keperluan') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Kirim') }}
                                </button>
                            </div>
                            <div class="float-right my-2">
                                &nbsp;
                                &nbsp;
                                <a class="btn btn-success" href="{{ route('user.home') }}">Batal</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection