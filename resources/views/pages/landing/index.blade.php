<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Penyandang Disabilitas | Sistem Informasi Inklusi</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Animate.css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <!-- AOS Animation -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <style>
        :root {
            --primary: #4361ee;
            --secondary: #3f37c9;
            --accent: #4895ef;
            --light: #f8f9fa;
            --dark: #212529;
            --success: #4cc9f0;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f9fafb;
            color: var(--dark);
            overflow-x: hidden;
        }

        .navbar {
            background: rgba(255, 255, 255, 0.95);
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1);
            padding: 1rem 0;
            transition: all 0.3s ease;
        }

        .navbar.scrolled {
            padding: 0.5rem 0;
            background: rgba(67, 97, 238, 0.95) !important;
        }

        .navbar.scrolled .nav-link {
            color: white !important;
        }

        .navbar-brand {
            font-weight: 700;
            color: var(--primary);
            font-size: 1.5rem;
        }

        .navbar.scrolled .navbar-brand {
            color: white !important;
        }

        .nav-link {
            font-weight: 500;
            margin: 0 0.5rem;
            color: var(--dark);
            position: relative;
        }

        .nav-link:after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: 0;
            left: 0;
            background-color: var(--accent);
            transition: width 0.3s ease;
        }

        .nav-link:hover:after {
            width: 100%;
        }

        .hero-section {
            background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
            color: white;
            padding: 8rem 0 6rem;
            position: relative;
            overflow: hidden;
        }

        .hero-section:before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url('https://images.unsplash.com/photo-1517842645767-c639042777db?auto=format&fit=crop&w=1350&q=80') no-repeat center center;
            background-size: cover;
            opacity: 0.1;
        }

        .hero-title {
            font-weight: 800;
            font-size: 3.5rem;
            line-height: 1.2;
            margin-bottom: 1.5rem;
        }

        .hero-subtitle {
            font-size: 1.25rem;
            opacity: 0.9;
            margin-bottom: 2rem;
        }

        .btn-cta {
            background-color: white;
            color: var(--primary);
            font-weight: 600;
            padding: 0.75rem 2rem;
            border-radius: 50px;
            transition: all 0.3s ease;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }

        .btn-cta:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2);
            color: var(--secondary);
        }

        .section-title {
            font-weight: 700;
            color: var(--primary);
            margin-bottom: 3rem;
            position: relative;
            display: inline-block;
        }

        .section-title:after {
            content: '';
            position: absolute;
            width: 50%;
            height: 4px;
            bottom: -10px;
            left: 0;
            background: linear-gradient(90deg, var(--primary), var(--accent));
            border-radius: 2px;
        }

        .stats-card {
            background: white;
            border-radius: 15px;
            padding: 2rem;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
            text-align: center;
            height: 100%;
            border: none;
        }

        .stats-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.1);
        }

        .stats-icon {
            font-size: 2.5rem;
            color: var(--accent);
            margin-bottom: 1rem;
        }

        .counter {
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--primary);
            margin: 0.5rem 0;
        }

        .stats-label {
            color: #6c757d;
            font-weight: 500;
        }

        .chart-container {
            background: white;
            border-radius: 15px;
            padding: 2rem;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
            margin-bottom: 3rem;
        }

        .data-table {
            background: white;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
            overflow: hidden;
        }

        .data-table thead th {
            background: var(--primary);
            color: white;
            font-weight: 600;
            border: none;
            padding: 1rem;
        }

        .data-table tbody tr {
            transition: all 0.2s ease;
        }

        .data-table tbody tr:hover {
            background-color: rgba(67, 97, 238, 0.05);
        }

        .badge-count {
            background-color: var(--accent);
            color: white;
            font-weight: 600;
            padding: 0.5rem 1rem;
            border-radius: 50px;
        }

        .feature-card {
            background: white;
            border-radius: 15px;
            padding: 2rem;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
            height: 100%;
            text-align: center;
            border: none;
        }

        .feature-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.1);
        }

        .feature-icon {
            font-size: 2.5rem;
            color: var(--accent);
            margin-bottom: 1.5rem;
        }

        .feature-title {
            font-weight: 600;
            margin-bottom: 1rem;
            color: var(--primary);
        }

        footer {
            background: linear-gradient(135deg, var(--dark) 0%, #343a40 100%);
            color: white;
            padding: 5rem 0 2rem;
        }

        .footer-title {
            font-weight: 700;
            margin-bottom: 1.5rem;
        }

        .footer-links a {
            color: rgba(255, 255, 255, 0.7);
            display: block;
            margin-bottom: 0.5rem;
            transition: all 0.2s ease;
            text-decoration: none;
        }

        .footer-links a:hover {
            color: white;
            transform: translateX(5px);
        }

        .social-icon {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            margin-right: 0.5rem;
            transition: all 0.3s ease;
        }

        .social-icon:hover {
            background: var(--accent);
            transform: translateY(-5px);
        }

        .back-to-top {
            position: fixed;
            bottom: 30px;
            right: 30px;
            width: 50px;
            height: 50px;
            background: var(--primary);
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.25rem;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
            z-index: 999;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .back-to-top.active {
            opacity: 1;
            visibility: visible;
        }

        .back-to-top:hover {
            background: var(--secondary);
            transform: translateY(-5px);
        }

        @media (max-width: 768px) {
            .hero-title {
                font-size: 2.5rem;
            }

            .hero-subtitle {
                font-size: 1rem;
            }

            .section-title {
                font-size: 1.75rem;
            }
        }
    </style>
</head>

<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">
                <i class="fas fa-wheelchair me-2"></i>DISABILITAS DATA
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="#home">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#data">Data</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#tentang">Tentang</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#kontak">Kontak</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section" id="home">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6" data-aos="fade-right">
                    <h1 class="hero-title animate__animated animate__fadeInDown">Sistem Informasi Penyandang Disabilitas
                    </h1>
                    <p class="hero-subtitle animate__animated animate__fadeIn animate__delay-1s">
                        Platform terintegrasi untuk memantau dan mengelola data penyandang disabilitas di seluruh
                        kecamatan.
                    </p>
                    <a href="#data" class="btn btn-cta animate__animated animate__fadeIn animate__delay-2s">
                        Lihat Data <i class="fas fa-arrow-down ms-2"></i>
                    </a>
                </div>
                <div class="col-lg-6" data-aos="fade-left">
                    <img src="https://media.giphy.com/media/v1.Y2lkPTc5MGI3NjExcTZwZmhrN2d6bDNmM3M4OTF1bG05azNpaXBhMHV5NHZqcWN1OWQ0ZSZlcD12MV9naWZzX3NlYXJjaCZjdD1n/YTzh3zw4mj1XpjjiIb/giphy.gif"
                        class="img-fluid rounded-4 shadow-lg animate__animated animate__fadeIn animate__delay-1s"
                        alt="Inklusi Disabilitas">
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row g-4">
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="stats-card">
                        <div class="stats-icon">
                            <i class="fas fa-map-marked-alt"></i>
                        </div>
                        <div class="counter" id="totalKecamatan">{{ $totalKecamatan }}</div>
                        <p class="stats-label">Kecamatan Terdata</p>
                    </div>
                </div>
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="stats-card">
                        <div class="stats-icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <div class="counter" id="totalDisabilitas">{{ $totalPenyandang }}</div>
                        <p class="stats-label">Penyandang Disabilitas</p>
                    </div>
                </div>
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="stats-card">
                        <div class="stats-icon">
                            <i class="fas fa-chart-line"></i>
                        </div>
                        <div class="counter" id="topKecamatan">{{ $penyandangTerbanyak->jumlah ?? 0 }}</div>
                        <p class="stats-label">{{ $penyandangTerbanyak->kriteria ?? 'Data' }} Terbanyak</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Data Section -->
    <section class="py-5" id="data">
        <div class="container">
            <h2 class="text-center section-title" data-aos="fade-up">Visualisasi Data</h2>
            <p class="text-center mb-5" data-aos="fade-up" data-aos-delay="100">
                Distribusi penyandang disabilitas berdasarkan wilayah dan jenis disabilitas
            </p>

            <!-- <div class="chart-container mb-5" data-aos="fade-up" data-aos-delay="200">
                <canvas id="disabilitasChart"></canvas>
            </div> -->
            <canvas id="sawChart" height="120"></canvas>


            <div class="card mt-4">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">📊 Hasil Perhitungan SAW (Simple Additive Weighting)</h5>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead class="text-center">
                                <tr>
                                    <th>#</th>
                                    <th>Kecamatan</th>
                                    <th>Jumlah Penyandang</th>
                                    <th>Normalisasi</th>
                                    <th>Skor SAW</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($sawResults as $i => $row)
                                    <tr>
                                        <td class="text-center">{{ $i + 1 }}</td>
                                        <td>{{ $row['kecamatan'] }}</td>
                                        <td class="text-center">{{ $row['disabilitas_count'] }}</td>
                                        <td class="text-center">{{ number_format($row['normalisasi'], 4) }}</td>
                                        <td class="text-center fw-bold text-primary">
                                            {{ number_format($row['score'], 4) }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>



            <!-- <h3 class="text-center mb-4" data-aos="fade-up">Distribusi per Kecamatan</h3>
            <div class="data-table" data-aos="fade-up">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kecamatan</th>
                                <th>Jumlah Penyandang</th>
                            </tr>
                        </thead>
                        <tbody>
                            @for ($i = 0; $i < count($top5); $i++)
                                <tr>
                                    <td>{{ $i + 1 }}</td>
                                    <td>{{ $top5[$i]['kecamatan'] }}</td>
                                    <td>
                                        <span class="badge-count">{{ $top5[$i]['disabilitas_count'] }}</span>
                                    </td>
                            @endfor
                        </tbody>
                    </table>
                </div>
            </div> -->
        </div>
    </section>

    <!-- Features Section -->
    <section class="py-5 bg-light" id="tentang">
        <div class="container">
            <h2 class="text-center section-title" data-aos="fade-up">Fitur Sistem</h2>
            <p class="text-center mb-5" data-aos="fade-up" data-aos-delay="100">
                Platform kami menyediakan berbagai fitur untuk mendukung inklusi disabilitas
            </p>

            <div class="row g-4">
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-database"></i>
                        </div>
                        <h3 class="feature-title">Data Terpusat</h3>
                        <p>Pusat data terintegrasi untuk seluruh penyandang disabilitas dengan informasi yang selalu
                            diperbarui.</p>
                    </div>
                </div>
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-chart-pie"></i>
                        </div>
                        <h3 class="feature-title">Analisis Visual</h3>
                        <p>Visualisasi data interaktif untuk memahami distribusi dan tren penyandang disabilitas.</p>
                    </div>
                </div>
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="400">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-bell"></i>
                        </div>
                        <h3 class="feature-title">Notifikasi</h3>
                        <p>Sistem peringatan untuk memastikan tidak ada penyandang disabilitas yang terlewat dari
                            program bantuan.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-4 mb-lg-0">
                    <h3 class="footer-title">DISABILITAS DATA</h3>
                    <p class="mt-3">
                        Sistem informasi terintegrasi untuk memantau dan mengelola data penyandang disabilitas di
                        seluruh wilayah.
                    </p>
                    <div class="mt-4">
                        <a href="https://github.com/kholilullahhhh" class="social-icon me-2"><i
                                class="fab fa-facebook-f"></i></a>
                        <a href="https://github.com/kholilullahhhh" class="social-icon me-2"><i
                                class="fab fa-twitter"></i></a>
                        <a href="https://github.com/kholilullahhhh" class="social-icon me-2"><i
                                class="fab fa-instagram"></i></a>
                        <a href="https://github.com/kholilullahhhh" class="social-icon me-2"><i
                                class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 mb-4 mb-md-0">
                    <h3 class="footer-title">Tautan</h3>
                    <div class="footer-links mt-3">
                        <a href="#home"><i class="fas fa-chevron-right me-2"></i> Beranda</a>
                        <a href="#data"><i class="fas fa-chevron-right me-2"></i> Data</a>
                        <a href="#tentang"><i class="fas fa-chevron-right me-2"></i> Tentang</a>
                        <a href="#kontak"><i class="fas fa-chevron-right me-2"></i> Kontak</a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 mb-4 mb-md-0">
                    <h3 class="footer-title">Layanan</h3>
                    <div class="footer-links mt-3">
                        <a href="#"><i class="fas fa-chevron-right me-2"></i> Pendataan</a>
                        <a href="#"><i class="fas fa-chevron-right me-2"></i> Analisis</a>
                        <a href="#"><i class="fas fa-chevron-right me-2"></i> Pemantauan</a>
                        <a href="#"><i class="fas fa-chevron-right me-2"></i> Pelaporan</a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4">
                    <h3 class="footer-title">Newsletter</h3>
                    <p class="mt-3">
                        Berlangganan newsletter kami untuk mendapatkan update terbaru.
                    </p>
                    <div class="input-group mb-3 mt-4">
                        <input type="email" class="form-control" placeholder="Email Anda">
                        <button class="btn btn-primary" type="button">
                            <i class="fas fa-paper-plane"></i>
                        </button>
                    </div>
                </div>
            </div>
            <hr class="mt-5 mb-4" style="border-color: rgba(255,255,255,0.1);">
            <div class="row">
                <div class="col-md-6 text-center text-md-start">
                    <p class="mb-0">&copy; 2023 Disabilitas Data. All rights reserved.</p>
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <p class="mb-0">Made with <i class="fas fa-heart text-danger"></i> Luluuu Coding</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Back to Top Button -->
    <a href="#home" class="back-to-top">
        <i class="fas fa-arrow-up"></i>
    </a>

    <!-- Bootstrap 5 JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- AOS Animation -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <!-- Font Awesome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script>

    <script>
        // Initialize AOS animation
        AOS.init({
            duration: 800,
            easing: 'ease-in-out',
            once: true
        });

        // Navbar scroll effect
        $(window).scroll(function () {
            if ($(this).scrollTop() > 100) {
                $('.navbar').addClass('scrolled');
            } else {
                $('.navbar').removeClass('scrolled');
            }

            // Back to top button
            if ($(this).scrollTop() > 300) {
                $('.back-to-top').addClass('active');
            } else {
                $('.back-to-top').removeClass('active');
            }
        });

        // Smooth scrolling for anchor links
        $('a[href*="#"]').on('click', function (e) {
            e.preventDefault();

            $('html, body').animate(
                {
                    scrollTop: $($(this).attr('href')).offset().top - 70,
                },
                500,
                'linear'
            );
        });

        // Counter Animation
        $(document).ready(function () {
            $('.counter').each(function () {
                $(this).prop('Counter', 0).animate({
                    Counter: $(this).text()
                }, {
                    duration: 2000,
                    easing: 'swing',
                    step: function (now) {
                        $(this).text(Math.ceil(now));
                    }
                });
            });

            // Main Chart
            const ctx = document.getElementById('disabilitasChart').getContext('2d');
            const kecamatanNames = @json($kecamatanData->pluck('kecamatan'));
            const disabilitasCounts = @json($kecamatanData->pluck('disabilitas_count'));

            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: kecamatanNames,
                    datasets: [{
                        label: 'Jumlah Penyandang Disabilitas',
                        data: disabilitasCounts,
                        backgroundColor: '#4361ee',
                        borderColor: '#3f37c9',
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'top',
                        },
                        title: {
                            display: true,
                            text: 'Distribusi Penyandang Disabilitas per Kecamatan',
                            font: {
                                size: 16
                            }
                        },
                        tooltip: {
                            backgroundColor: '#212529',
                            titleFont: {
                                size: 14,
                                weight: 'bold'
                            },
                            bodyFont: {
                                size: 13
                            },
                            padding: 12,
                            cornerRadius: 8
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            grid: {
                                color: 'rgba(0, 0, 0, 0.05)'
                            },
                            ticks: {
                                stepSize: 1
                            }
                        },
                        x: {
                            grid: {
                                display: false
                            }
                        }
                    },
                    animation: {
                        duration: 2000,
                        easing: 'easeOutQuart'
                    }
                }
            });

            // Dummy data for additional charts (replace with real data)
            const jenisDisabilitasData = {
                labels: ['Fisik', 'Sensorik', 'Intelektual', 'Mental', 'Lainnya'],
                datasets: [{
                    data: [35, 25, 20, 15, 5],
                    backgroundColor: [
                        '#4361ee',
                        '#4895ef',
                        '#4cc9f0',
                        '#3f37c9',
                        '#560bad'
                    ],
                    borderWidth: 0
                }]
            };

            const demografiData = {
                labels: ['0-18 Tahun', '19-30 Tahun', '31-45 Tahun', '46-60 Tahun', '>60 Tahun'],
                datasets: [{
                    data: [15, 30, 25, 20, 10],
                    backgroundColor: [
                        '#4361ee',
                        '#4895ef',
                        '#4cc9f0',
                        '#3f37c9',
                        '#560bad'
                    ],
                    borderWidth: 0
                }]
            };



        });

        const sawLabels = @json(array_column($sawResults, 'kecamatan'));
        const sawScores = @json(array_column($sawResults, 'score'));

        new Chart(document.getElementById('sawChart').getContext('2d'), {
            type: 'bar',
            data: {
                labels: sawLabels,
                datasets: [{
                    label: "Skor SAW",
                    data: sawScores,
                    borderWidth: 2,
                    backgroundColor: 'rgba(67, 97, 238, 0.5)',
                    borderColor: 'rgba(67, 97, 238, 1)',
                    borderRadius: 8
                }]
            },
            options: {
                scales: { y: { beginAtZero: true } },
                plugins: { legend: { display: false } }
            }
        });
    </script>
</body>

</html>