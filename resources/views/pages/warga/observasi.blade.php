@extends('layouts.app', ['title' => 'Data Observasi'])

@section('content')
    @push('styles')
        <link rel="stylesheet" href="{{ asset('library/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">
        <link rel="stylesheet" href="{{ asset('library/datatables.net-select-bs4/css/select.bootstrap4.min.css') }}">
    @endpush

    <div class="main-content">
        <section class="section">
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                <h4>Observasi {{ $data[1] }}</h4>
                                <a href="{{ route('obser.tambah', $data[1]) }}" class="btn btn-success justi mt-4 p-2">+ Tambah Observasi</a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped" id="table-1">
                                        <thead>
                                            <tr>
                                                <th class="text-center">
                                                    NO
                                                </th>
                                                <th>Nama</th>
                                                <th>Kriteria</th>
                                                <th>Keterangan</th>
                                                <th>Skor</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data[0] as $i => $item)
                                                <tr>
                                                    <td>
                                                        {{ ++$i }}
                                                    </td>
                                                    <td>{{ $item->nama }}</td>
                                                    <td>{{ $item->kriteria }}</td>
                                                    <td>{{ $item->ket }}</td>
                                                    <td>{{ $item->skor }}</td>
                                                    <td>
                                                        <a href="{{ route('obser.edit', ['id'=>$item->id,'id2'=>$data[1]]) }}"
                                                            class="btn btn-warning">Edit</a>
                                                        <button onclick="deleteData({{ $item->id }}, 'obser')"
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
