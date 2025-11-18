@extends('layouts.app', ['title' => 'Edit Warga'])
@section('content')
    @push('styles')
        <!-- Summernote CSS -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.css" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('library/select2/dist/css/select2.min.css') }}">

    @endpush

    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Form Warga</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Bootstrap Components</a></div>
                    <div class="breadcrumb-item">Form</div>
                </div>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                
                            </div>
                            <div class="card-body">
                                <form action="{{ route('warga.update') }}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="id" class="id" value="{{ $data->id }}">
                                        <h2>Warga</h2>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Nama</label>
                                                    <input required type="text"  name="nama" value="{{ $data->nama }}" class="form-control ">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Alamat</label>
                                                    <input required  type="text" name="alamat" class="form-control" value="{{ $data->alamat }}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>POS</label>
                                                    <input required  type="text" name="id_pos" class="form-control" value="{{ $data->id_pos }}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Dusun</label>
                                                    <input required  type="text" name="dusun" class="form-control" value="{{ $data->dusun }}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Tempat Lahir</label>
                                                    <input required  type="text" name="tempat_lahir" class="form-control" value="{{ $data->tempat_lahir }}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Tanggal Lahir</label>
                                                    <input required  type="date" name="tgl_lahir" class="form-control" value="{{ $data->tgl_lahir }}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Jenis Kelamin</label>
                                                    <select required name="jk" class="form-control">
                                                        <option {{ $data->jk == 'l' ? 'selected' : '' }} value="l">Laki-Laki</option>
                                                        <option {{ $data->jk == 'p' ? 'selected' : '' }} value="p">Perempuan</option>

                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Agama</label>
                                                <select name="agama" class="form-control">
                                                    <option {{ $data->agama == 'islam' ? 'selected' : '' }} value="islam">Islam</option>
                                                    <option {{ $data->agama == 'kristen' ? 'selected' : '' }} value="kristen">Kristen</option>
                                                    <option {{ $data->agama == 'katolik' ? 'selected' : '' }} value="katolik">Katolik</option>
                                                    <option {{ $data->agama == 'budha' ? 'selected' : '' }} value="budha">Budha</option>
                                                    <option {{ $data->agama == 'budha' ? 'selected' : '' }} value="hindu">Hindu</option>
                                                    <option {{ $data->agama == 'konghucu' ? 'selected' : '' }} value="konghucu">Konghucu</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>NIK</label>
                                                <input type="text" name="nik" class="form-control"  required value="{{ $data->nik }}">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>KK</label>
                                                <input type="text" name="kk" class="form-control" value="{{ $data->kk }}" required>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Ibu Kandung</label>
                                                <input type="text" name="ibu_kandung" class="form-control" value="{{ $data->ibu_kandung }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Ayah Kandung</label>
                                                <input type="text" name="ayah_kandung" class="form-control" value="{{ $data->ayah_kandung }}" required >
                                            </div>
                                        </div>
                                    </div>

                                        </div>
                                        <hr>
                                    </div>
                                    <div class="card-footer text-right">
                                        <a href="{{ route('warga.index') }}" class="btn btn-warning" >Kembali</a>
                                        <button class="btn btn-primary mr-1" type="submit">Submit</button>
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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.js"></script>
        <script src="{{ asset('library/select2/dist/js/select2.full.min.js') }}"></script>
    @endpush
@endsection
