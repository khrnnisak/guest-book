
@extends('layouts.main')

@section('content')
    <div class="container">
            <h4 class="card-title">Data Pegawai</h4>
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        <div class="float-right my-2">
            &nbsp;
            &nbsp;
            <a class="btn btn-success" href="{{ route('pegawai.create') }}">Tambah Pegawai</a>
        </div>
        
        @if ($pegawai)
            <table class="table table-bordered">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Jabatan</th>
                    <th>Bidang</th>
                    <th> </th>
                </tr>
                @foreach ($pegawai as $a)
                    <tr>
                        <td>{{$loop->iteration }}</td>
                        <td>{{ $a->nama }}</td>
                        <td>{{ $a->jabatan }}</td>
                        <td>{{ $a->name}}</td>
                        <td>
                            <a class="btn btn-success" href="{{ route('pegawai.edit', $a->id) }}">Edit</a>
                            <form action="{{ route('pegawai.delete', $a->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"
                                onclick="return confirm('yakin?');">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
        @endif
    </div>
@endsection