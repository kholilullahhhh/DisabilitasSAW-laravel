@extends('layouts.auth', ['title' => 'Register'])
@section('content')
    @push('styles')
        <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css')}}">
    @endpush

    <div class="card card-primary">
        <div class="card-header">
            <h4>Register</h4>
        </div>

        <div class="card-body">
            <form action="{{ route('regisStore') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group ">
                            <label>Nama User</label>
                            <input type="text" name="name" class="form-control" id="" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group ">
                            <label>Alamat</label>
                            <input type="text" name="alamat" class="form-control" id="" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Jenis Kelamin</label>
                            <select name="jk" id="" class="form-control">
                                <option value="L">Laki-Laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" name="username" class="form-control" id="" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" id="" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Role</label>
                            <select name="role" id="" class="form-control">
                                <option value="penjual">Penjual</option>
                                <option value="member">Member</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block">
                        Register
                    </button>
                </div>
            </form>
        </div>
    </div>

    @push('scripts')
        <script src="{{ asset('library/jquery-pwstrength/pwstrength.js')}}"></script>
        <script src="{{ asset('library/selectric/public/jquery.selectric.min.js')}}"></script>
        <script src="{{ asset('js/page/auth-register.js')}}"></script>
    @endpush
@endsection
