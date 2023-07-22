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

                    <form method="POST" action="{{ route('tamu.update', $tamu->id) }}" enctype="multipart/form-data" id="myForm">
                        @csrf
                        
                        <div class="form-group row">
                            <label for="jadwal_temu" class="col-md-4 col-form-label text-md-right">{{ __('Jadwal') }}</label>
                            <div class="col-md-6">
                                <input id="jadwal_temu" type="datetime-local" class="form-control{{ $errors->has('jadwal_temu') ? ' is-invalid' : '' }}" name="jadwal_temu" value="{{ old('$tamu->jadwal temu') }}" rows="3"></input>

                                @if ($errors->has('jadwal_temu'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('jadwal_temu') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Simpan Jadwal Baru') }}
                                </button>
                            </div>
                            <div class="float-right my-2">
                                &nbsp;
                                &nbsp;
                                <a class="btn btn-success" href="{{ route('tamu.show') }}">Batal</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection