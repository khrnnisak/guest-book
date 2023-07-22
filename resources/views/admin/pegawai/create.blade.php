@extends('layouts.main')

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

                    <form method="POST" action="{{ route('pegawai.add') }}" enctype="multipart/form-data" id="myForm">
                        @csrf
                        <div class="form-group row">
                            <label for="nama" class="col-md-4 col-form-label text-md-right">{{ __('Nama Lengkap') }}</label>
                            <div class="col-md-6">
                                <input id="nama" type="text" class="form-control{{ $errors->has('nama') ? ' is-invalid' : '' }}" name="nama" value="{{ old('nama') }}" rows="3"></input>

                                @if ($errors->has('nama'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nama') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="jabatan" class="col-md-4 col-form-label text-md-right">{{ __('Jabatan') }}</label>
                            <div class="col-md-6">
                                <input id="jabatan" type="text" class="form-control{{ $errors->has('jabatan') ? ' is-invalid' : '' }}" name="jabatan" value="{{ old('jabatan') }}" rows="3"></input>

                                @if ($errors->has('jabatan'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('jabatan') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="bidang_id" class="col-md-4 col-form-label text-md-right">{{ __('Bidang') }}</label>

                            <div class="col-md-4">
                                <select  id="bidang_id" name='bidang_id' class="form-control{{ $errors->has('bidang_id') ? ' is-invalid' : '' }}" value="{{ old('bidang_id') }}" required autofocus>
                                    <option selected='selected'>Pilih Bidang</option>
                                @foreach ($bidangs as $bidang)
                                    <option value="{{$bidang->id}}">{{$bidang->name}}</option>
                                @endforeach
                                </select>
                                @if ($errors->has('bidang_id'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('bidang_id') }}</strong>
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
                                <a class="btn btn-success" href="{{ route('pegawai') }}">Batal</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection