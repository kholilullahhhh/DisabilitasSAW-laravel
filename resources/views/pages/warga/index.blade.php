@extends('layouts.app', ['title' => 'Data Warga'])

@section('content')
    @push('styles')
        <link rel="stylesheet" href="{{ asset('library/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">
        <link rel="stylesheet" href="{{ asset('library/datatables.net-select-bs4/css/select.bootstrap4.min.css') }}">
    @endpush

    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Data Akun Warga</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Modules</a></div>
                    <div class="breadcrumb-item">DataTables</div>
                </div>
            </div>

            <div class="section-body">


                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                <h4>Akun Warga </h4>
                                <a href="{{ route('warga.tambah') }}" class="btn btn-success justi mt-4 p-2">+ Tambah Warga</a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped" id="table-1">
                                        <thead>
                                            <tr>
                                                <th class="text-center">  NO </th>
                                                <th>NIK</th>
                                                <th>Nama</th>
                                                <th>Alamat</th>
                                                <th>Tempat & Tanggal Lahir</th>
                                                <th>Gender</th>
                                                <th>Agama</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data as $i => $item)
                                                <tr>
                                                    <td>
                                                        {{ ++$i }}
                                                    </td>
                                                    <td>{{ $item->nik }}</td>
                                                    <td>{{ $item->nama }}</td>
                                                    <td>{{ $item->alamat }}</td>
                                                    <td>{{ $item->tempat_lahir.', '.explode(" ", $item->tgl_lahir)[0] }}</td>
                                                    <td>{{  $item->jk == 'l' ? 'Laki-laki' : 'Perempuan' }}</td>
                                                    <td>{{ $item->agama }}</td>
                                                    <td>
                                                        <a href="{{ route('warga.edit', $item->id) }}"
                                                            class="btn btn-warning">Edit</a>
                                                        <button onclick="deleteData({{ $item->id }}, 'warga')"
                                                            class="btn btn-danger">Hapus</button>
                                                        <a href="{{ route('warga.observasi', $item->id) }}"
                                                            class="btn btn-success">Observasi</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>
    </div>

    @push('scripts')
        <script src="{{ asset('library/datatables/media/js/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('library/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('library/datatables.net-select-bs4/js/select.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('js/page/modules-datatables.js') }}"></script>
    @endpush
@endsection
