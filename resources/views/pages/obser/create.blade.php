@extends('layouts.app', ['title' => 'Data Observasi'])

@section('content')
    @push('styles')
        <link rel="stylesheet" href="{{ asset('library/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">
        <link rel="stylesheet" href="{{ asset('library/datatables.net-select-bs4/css/select.bootstrap4.min.css') }}">
    @endpush

    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Edit Observasi</h1>
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
                                <h4>Data Observasi untuk {{ $data[0]->nama }}</h4>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('obser.store', ['id' => $id]) }}" method="post">
                                    @csrf
                                    <div class="row">
                                    <input hidden type="text" name="id_warga" value="{{ $data[0]->id }}" class="form-control">
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <label>Jenis Disabilitas</label>
                                                    <select required name="id_disabilitas" class="form-control">
                                                        @foreach ($data[1] as $i => $item)
                                                        <option value="{{ $item->id }}">{{ $item->kriteria.' ('.$item->ket.')' }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        <div class="col-md-4">
                                            <div class="form-group ">
                                                <label>Skor</label>
                                                <input type="number" name="skor" class="form-control" required>
                                            </div>
                                        </div>
                                    <div class="row">
                                        <div class="col-md">
                                            <button type="submit" class="btn btn-success justi mt-4 p-2">Simpan Data Baru</button>
                                        </div>
                                    </div>
                                </form>
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
