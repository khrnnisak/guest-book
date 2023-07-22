@extends('layouts.main')

@section('content')
    <div class="container">
            <h4 class="card-title">Striped Table</h4>
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
                    <th> </th>
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
                        @if( $a->status == 'Belum' )
                            <td>
                                <form action="{{ route('confirm', $a->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn btn-primary">Konfirmasi</button>
                                </form>
                                <form action="{{ route('cancel', $a->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('yakin?');">Batalkan</button>
                                </form>
                            </td>
                        @else
                        <td>
                            <a class="btn btn-info" href="{{ route('tamu.detail', $a->id) }}">Detail</a>
                        </td>
                        @endif
                    </tr>
                @endforeach
            </table>
        @endif
    </div>
@endsection