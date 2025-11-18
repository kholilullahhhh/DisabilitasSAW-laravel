@extends('layouts.app', ['title' => 'Uji Method Saw'])

@section('content')
    @push('styles')
        <link rel="stylesheet" href="{{ asset('library/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">
        <link rel="stylesheet" href="{{ asset('library/datatables.net-select-bs4/css/select.bootstrap4.min.css') }}">
    @endpush

    <div class="main-content">
        <section class="section">
        <div class="col-md-8">
            <div class="form-group">
                    <p class="text-white fs-10">Filter</p>
                    <select required name="kecamatan" class="form-control">
                        <option value="-" selected>SEMUA</option>
                        @foreach ($wr[9] as $i => $item)
                        <option value="{{ $item->id }}">{{ $item->kecamatan }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                <h4>Kriteria Studi Kasus</h4>
                                </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th class="text-center">
                                                    Kode
                                                </th>
                                                <th>Kriteria</th>
                                                <th>Keterangan</th>
                                                <th>Bobot</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($wr[0] as $i => $item)
                                                <tr>
                                                    <td class="text-center"> {{ ++$i }} </td>
                                                    <td>{{ $item->kriteria }}</td>
                                                    <td>{{ $item->ket }}</td>
                                                    <td>{{ $item->poin . " %" }}</td>
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

        <section class="section">
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th class="text-center">
                                                    No
                                                </th>
                                                <th>Nama</th>
                                            @foreach ($wr[0] as $i => $item)
                                                <th>{{ $item->kode }}</th>
                                            @endforeach
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($wr[2] as $x => $it)
                                                <tr>
                                                    <td class="text-center"> {{ $x + 1 }} </td>
                                                    <td>{{ $it->nama }}</td>

                                                    @for ($m = 0; $m < count($wr[0]); $m++)
                                                    <td>{{ $wr[1][$x][$m] }}</td>
                                                    @endfor
                                                </tr>
                                        @endforeach
                                        </tbody>
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>MAX</th>
                                                @for ($q = 0; $q < count($wr[3]); $q++)
                                                <th>{{ $wr[3][$q] }}</th>
                                                @endfor
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="section">
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                <h4>Manual Matrix Normalisasi</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th class="text-center">
                                                    No
                                                </th>
                                                <th>Nama</th>
                                            @foreach ($wr[0] as $i => $item)
                                                <th>{{ $item->kode }}</th>
                                            @endforeach
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($wr[2] as $x => $it)
                                                <tr>
                                                    <td class="text-center"> {{ $x + 1 }} </td>
                                                    <td>{{ $it->nama }}</td>
                                                    @for ($m = 0; $m < count($wr[0]); $m++)
                                                        <td>{{ $wr[7][$x][$m] }}</td>
                                                    @endfor
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

        <section class="section">
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                <h4>Matrix Normalisasi</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th class="text-center">
                                                    No
                                                </th>
                                                <th>Nama</th>
                                            @foreach ($wr[0] as $i => $item)
                                                <th>{{ $item->kode }}</th>
                                            @endforeach
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($wr[2] as $x => $it)
                                                <tr>
                                                    <td class="text-center"> {{ $x + 1 }} </td>
                                                    <td>{{ $it->nama }}</td>
                                                    @for ($m = 0; $m < count($wr[0]); $m++)
                                                        <td>{{ strlen($wr[4][$x][$m]) > 1 ? number_format($wr[4][$x][$m],3) : $wr[4][$x][$m] }}</td>
                                                    @endfor
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



        <section class="section">
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                <h4>Manual Preferensi</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th class="text-center">
                                                    No
                                                </th>
                                                <th>Nama</th>
                                            @foreach ($wr[0] as $i => $item)
                                                <th>{{ $item->kode }}</th>
                                            @endforeach
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($wr[2] as $x => $it)
                                                <tr>
                                                    <td class="text-center"> {{ $x + 1 }} </td>
                                                    <td>{{ $it->nama }}</td>
                                                    @for ($m = 0; $m < count($wr[0]); $m++)
                                                        <td>{{ $wr[6][$x][$m] }}</td>
                                                    @endfor
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



        <section class="section">
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                <h4>Preferensi</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th class="text-center">
                                                    No
                                                </th>
                                                <th>Nama</th>
                                                <th>Hasil</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($wr[2] as $x => $it)
                                                <tr>
                                                    <td class="text-center"> {{ $x + 1 }} </td>
                                                    <td>{{ $it->nama }}</td>
                                                        <td>{{ $wr[5][$x] }}</td>
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
        <section class="section">
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                <h4>Ranking Prioritas</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th class="text-center">
                                                    No
                                                </th>
                                                <th>Nama</th>
                                                <th>Ranking</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @for ($c = count($wr[2]) - 1;$c >= 0;$c--)
                                                <tr>
                                                    <td class="text-center"> {{ count($wr[2]) - $c }} </td>
                                                    <td>{{ $wr[8][0][$c] }}</td>
                                                    <td>{{ $wr[8][1][$c] }}</td>
                                                </tr>
                                        @endfor
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
