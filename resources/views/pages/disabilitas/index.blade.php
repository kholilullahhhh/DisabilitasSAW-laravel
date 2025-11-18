@extends('layouts.app', ['title' => 'Data Disabilitas'])

@section('content')
    @push('styles')
        <link rel="stylesheet" href="{{ asset('library/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">
        <link rel="stylesheet" href="{{ asset('library/datatables.net-select-bs4/css/select.bootstrap4.min.css') }}">
    @endpush

    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Disabilitas</h1>
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
                                <h4>Data Disabilitas</h4>
                                <a href="{{ route('disabilitas.tambah') }}" class="btn btn-success justi mt-4 p-2">+ Tambah Disabilitas</a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped" id="table-1">
                                        <thead>
                                            <tr>
                                                <th class="text-center">
                                                    Nomor
                                                </th>
                                                <th>Kode</th>
                                                <th>Kriteria</th>
                                                <th>Keterangan</th>
                                                <th>Poin</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data as $i => $item)
                                                <tr>
                                                    <td class="text-center">
                                                        {{ ++$i }}
                                                    </td>
                                                    <td>{{ $item->kode }}</td>
                                                    <td>{{ $item->kriteria }}</td>
                                                    <td>{{ $item->ket }}</td>
                                                    <td>{{ $item->poin }}</td>
                                                    <td>
                                                        <a href="{{ route('disabilitas.edit', $item->id) }}"
                                                            class="btn btn-warning">Edit</a>
                                                        <button onclick="deleteData({{ $item->id }}, 'disabilitas')"
                                                            class="btn btn-danger">Hapus</button>
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
