<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">


    <title>{{ $title }} &mdash; Stisla {{ session('message') }}</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">


    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/summernote/dist/summernote-bs4.css') }}">

    @stack('styles')

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/components.css') }}">
</head>

<body class="{{ $title == 'Layout Transparent' ? 'layout-2' : ($title == 'Layout Top Navigation' ? 'layout-3' : '') }}">

    <div id="app">
        <div class="main-wrapper">


            @include('components.default.header')

            @include('components.default.sidebar')

            <!-- Main Content -->
            @yield('content')

            {{-- Footer --}}
            @include('components.footer')

        </div>
    </div>

    <!-- General JS Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="{{ asset('js/stisla.js') }}"></script>

    <!-- JS Libraies -->
    @stack('scripts')

    <!-- JS Libraies -->
    <script src="{{ asset('library/izitoast/dist/js/iziToast.min.js') }}"></script>
    <script src="{{ asset('library/sweetalert/dist/sweetalert.min.js') }}"></script>
    <script src="{{ asset('library/summernote/dist/summernote-bs4.js')}}"></script>


    <!-- Template JS File -->
    <script src="{{ asset('js/scripts.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
    {{-- success store data --}}
    @if (session('message') == 'store')
        <script>
            // iziToast.success({
            //     title: 'Sukses',
            //     message: 'Berhasil tambah data',
            //     position: 'topRight'
            // });
            swal("Berhasil", "Berhasil tambah data", "success");
        </script>
    @endif

    {{-- success update data --}}
    @if (session('message') == 'update')
        <script>
            // iziToast.success({
            //     title: 'Sukses',
            //     message: 'Berhasil update data',
            //     position: 'topRight'
            // });
            swal("Berhasil", "Berhasil ubah data", "success");
        </script>
    @endif

    {{-- success login --}}
    @if (session('message') == 'sukses login')
        <script>
            swal("Berhasil", "Berhasil Login", "success");
        </script>
    @endif

    {{-- validasi barang keluar --}}
    @if (session('message') == 'stok error')
        <script>
            swal("Warning", "Jumlah yang anda masukkan tidak valid dengan Stok barang", "error");
        </script>
    @endif

    {{-- failed login --}}
    @if (session('message') == 'gagal login')
        <script>
            swal("Warning", "Periksa kembali username dan password anda", "error");
        </script>
    @endif

    {{--  login dulu --}}
    @if (session('message') == 'need login')
        <script>
            swal("Warning", "Anda harus login terlebih dahulu", "error");
        </script>
    @endif

</body>

</html>
