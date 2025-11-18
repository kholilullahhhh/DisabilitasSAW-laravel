@extends('layouts.app', ['title' => 'Laporan'])

@section('content')
    @push('styles')
        <link rel="stylesheet" href="{{ asset('library/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">
        <link rel="stylesheet" href="{{ asset('library/datatables.net-select-bs4/css/select.bootstrap4.min.css') }}">
    @endpush

    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Admins</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Modules</a></div>
                    <div class="breadcrumb-item">Admins</div>
                </div>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped" id="table-1">
                                        <thead>
                                            <tr>
                                                <th class="text-center">
                                                    #
                                                    <!-- id, id_stok, nota, nama, jenis, umur, jumlah, modal, harga, status_beli, via_bayar -->
                                                </th>
                                                <th>NO</th>
                                                <th>NAMA</th>
                                                <th>JENIS</th>
                                                <th>JUMLAH LAKU</th>
                                                <th>PENDAPATAN</th>
                                                <th>MODAL</th>
                                                <th>PROFIT</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data as $i => $item)
                                                <tr>
                                                    <td>
                                                        {{ ++$i }}
                                                    </td>
                                                    <td>{{ $i }}</td>
                                                    <td>{!! $item->nama !!}</td>
                                                    <td class="align-middle">
                                                        {{ $item->jenis }}
                                                    </td>
                                                    <td>
                                                        {!! number_format($item->total) !!}
                                                    </td>
                                                    <td>
                                                        {!! number_format($item->pendatan) !!}
                                                    </td>
                                                    <td>
                                                        {!! number_format($item->modal) !!}
                                                    </td>
                                                    <td>
                                                        {!! number_format($item->pendatan -$item->modal) !!}
                                                    </td>
                                                    <td>
                                                        <a class="btn btn-warning">DETAIL</a>
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
        <script src="{{ asset('library/prismjs/prism.js') }}"></script>
        <script src="{{ asset('js/page/bootstrap-modal.js') }}"></script>
    @endpush
@endsection
