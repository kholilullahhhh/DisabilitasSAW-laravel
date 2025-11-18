@extends('layouts.app', ['title' => 'Edit Disabilitas'])
@section('content')
    @push('styles')
        <!-- Summernote CSS -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.css" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('library/select2/dist/css/select2.min.css') }}">

    @endpush

    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Form User</h1>
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
                            <div class="card-body">
                                <form action="{{ route('disabilitas.update') }}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="id" class="id" value="{{ $data->id }}">
                                        <h2>Disabilitas</h2>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Kode</label>
                                                    <input type="text"  name="kode" required value="{{ $data->kode }}" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Kriteria</label>
                                                    <input type="text"  name="kriteria" required value="{{ $data->kriteria }}" class="form-control">
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-4">
                                                <div class="form-group ">
                                                    <label>Keterangan</label>
                                                    <input type="text" name="ket" value="{{ $data->ket }}" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group ">
                                                    <label>Poin</label>
                                                    <input type="number" name="poin" value="{{ $data->poin }}" class="form-control" required>
                                                </div>
                                            </div>
                                        <hr>
                                    </div>
                                    <div class="card-footer text-right">
                                        <a href="{{ route('disabilitas.index') }}" class="btn btn-warning" >Kembali</a>
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
