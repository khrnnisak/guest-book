
@extends('layouts.users')

@section('content')
    <div class="container">
            <h4 class="card-title">Riwayat Kunjungan</h4>
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        <div class="float-right my-2">
            &nbsp;
            &nbsp;
            <a class="btn btn-success" href="{{ route('tamu.create') }}">Tambah Jadwal</a>
        </div>

        @if ($jadwal)
            <table class="table table-bordered">
                <tr>
                    <th>No</th>
                    <th>Jadwal Temu</th>
                    <th>Pegawai</th>
                    <th>Keperluan</th>
                    <th>Status</th>
                    <th> </th>
                </tr>
                @foreach ($jadwal as $a)
                    <tr>
                        <td>{{$loop->iteration }}</td>
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
                            <a class="btn btn-success" href="{{ route('tamu.edit', $a->id) }}">Jadwalkan Ulang</a>
                                <form action="{{ route('tamu.confirm', $a->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn btn-primary">Konfirmasi</button>
                                </form>
                                <form action="{{ route('tamu.cancel', $a->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('yakin?');">Batalkan</button>
                                </form>
                            </td>
                        @else
                        <td>
                            <a class="btn btn-info" href="{{ route('tamu.show-detail', $a->id) }}">Detail</a>
                        </td>
                        @endif
                    </tr>
                @endforeach
            </table>
        @endif
    </div>
@endsection

