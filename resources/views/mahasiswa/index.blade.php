@extends('layout.template')
@section('konten')
    <!-- START DATA -->
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <!-- FORM PENCARIAN -->
        <div class="pb-3">
            <form class="d-flex" action="{{ url('mahasiswa') }}" method="get">
                <input class="form-control me-1" type="search" name="katakunci" value="{{ Request::get('katakunci') }}"
                    placeholder="Masukkan kata kunci" aria-label="Search">
                <button class="btn btn-secondary" type="submit">Cari</button>
            </form>
        </div>

        <!-- TOMBOL TAMBAH DATA -->
        <div class="pb-3">
            <a href='{{ url('mahasiswa/create') }}' class="btn btn-primary">+ Tambah Data</a>
        </div>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th class="col-md-1">No</th>
                    <th class="col-md-3">NIM</th>
                    <th class="col-md-4">Nama</th>
                    <th class="col-md-2">Jurusan</th>
                    <th class="col-md-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = $data->firstItem(); ?>
                @foreach ($data as $d)
                    <tr>
                        <td>{{ $no }}</td>
                        <td>{{ $d->nim }}</td>
                        <td>{{ $d->nama }}</td>
                        <td>{{ $d->jurusan }}</td>
                        <td>
                            <a href='{{ url('mahasiswa/' . $d->nim . '/edit') }}' class="btn btn-warning btn-sm">Edit</a>
                            <form onsubmit="return confirm('Yakin di Hapus ?')" class="d-inline"
                                action="{{ url('mahasiswa/' . $d->nim) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" name="submit" class="btn btn-danger btn-sm">Del</button>
                            </form>
                        </td>
                    </tr>
                    <?php $no++; ?>
                @endforeach
            </tbody>
        </table>
        {{ $data->withQueryString()->links() }}

    </div>
    <div class="d-grid">
        <a href="{{ url('login/out')}}" class="btn btn-danger">KELUAR</a>
    </div>

    <!-- AKHIR DATA -->
@endsection
