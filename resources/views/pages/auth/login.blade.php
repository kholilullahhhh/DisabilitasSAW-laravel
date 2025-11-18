@extends('layouts.auth', ['title' => 'Login'])
@section('content')
    @push('styles')
        <link rel="stylesheet" href="{{ asset('library/bootstrap-social/bootstrap-social.css') }}">
    @endpush

    <div class="card card-primary">
        <div class="card-header">
            <h4>Login</h4>
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('login_action') }}" class="needs-validation" novalidate="">
                @csrf
                <div class="form-group">
                    <label for="email">Username</label>
                    <input id="email" type="text" class="form-control" name="username" tabindex="1" required
                        autofocus>
                    <div class="invalid-feedback">
                        Please fill in your username
                    </div>
                </div>

                <div class="form-group">
                    <div class="d-block">
                        <label for="password" class="control-label">Password</label>
                        <div class="float-right">
                            <a href="#" class="text-small">
                                Forgot Password?
                            </a>
                            {{-- <a href="{{ route('auth.forgot-password')}}" class="text-small">
                                Forgot Password?
                            </a> --}}
                        </div>
                    </div>
                    <input id="password" type="password" class="form-control" name="password" tabindex="2" required>
                    <div class="invalid-feedback">
                        please fill in your password
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                        Login
                    </button>
                </div>
            </form>

        </div>
    </div>
    <div class="mt-5 text-muted text-center">
        Belum punya akun? <a href="{{ route('regis') }}">Akun Baru</a>
    </div>
    @push('scripts')

    @endpush
@endsection
