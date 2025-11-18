@extends('layouts.app', ['title' => 'Edit Observasi'])
@section('content')
    @push('styles')
        <!-- Summernote CSS -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.css" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('library/select2/dist/css/select2.min.css') }}">

    @endpush

    <div class="main-content">
        <section class="section">
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('obser.update') }}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="id" class="id" value="{{ $data[0]->id }}">
                                        <h2>Observasi untuk {{ $data[1]->nama }}</h2>
                                        <div class="row">
                                        <div class="col-md-8">
                                                <div class="form-group">
                                                    <label>Jenis Disabilitas</label>
                                                    <select required name="id_disabilitas" class="form-control">
                                                        @foreach ($data[2] as $i => $item)
                                                        <option value="{{ $item->id }}">{{ $item->kriteria.' ('.$item->ket.')' }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                            <div class="form-group ">
                                                <label>Skor</label>
                                                <input type="number" name="skor" class="form-control" required value="{{ $data[0]->skor }}">
                                            </div>
                                        </div>
                                        </div>
                                        <hr>
                                    </div>
                                    <div class="card-footer text-right">
                                        <a href="{{ route('obser.index') }}" class="btn btn-warning" >Kembali</a>
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
