<?php

namespace App\Http\Controllers;

use App\Models\tb_kodepos;
use App\Models\tb_warga;
use App\Models\tb_obser_disabilitas;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index()
    {
        $totalKecamatan = DB::table("tb_kodepos")
            ->select(DB::raw("COUNT(DISTINCT kecamatan) as total"))
            ->first()->total;

        $totalPenyandang = DB::table("tb_obser_disabilitas")
            ->select(DB::raw("COUNT(DISTINCT id_warga) as total"))
            ->first()->total;

        $penyandangTerbanyak = DB::table("tb_obser_disabilitas as a")
            ->join("tb_disabilitas as b", "b.id", "=", "a.id_disabilitas")
            ->select("b.kriteria", DB::raw("COUNT(a.id) as jumlah"))
            ->groupBy("b.kriteria")
            ->orderByDesc("jumlah")
            ->first();

        // Query Kecamatan 
        $kecamatanData = DB::table('tb_kodepos')
            ->select('tb_kodepos.kecamatan as kecamatan')
            ->selectRaw("(SELECT COUNT(warga.kecamatan) FROM `warga` WHERE warga.kecamatan = tb_kodepos.kecamatan AND warga.jumlah='y') as disabilitas_count")
            ->groupBy('tb_kodepos.kecamatan')
            ->get();

        // Bubble Sort 
        $nilai = $kecamatanData;
        $n = count($nilai);
        for ($i = 0; $i < $n - 1; $i++) {
            for ($j = 0; $j < $n - $i - 1; $j++) {
                if ($nilai[$j]->disabilitas_count > $nilai[$j + 1]->disabilitas_count) {
                    $temp = $nilai[$j]->disabilitas_count;
                    $tempNama = $nilai[$j]->kecamatan;

                    $nilai[$j]->disabilitas_count = $nilai[$j + 1]->disabilitas_count;
                    $nilai[$j]->kecamatan = $nilai[$j + 1]->kecamatan;

                    $nilai[$j + 1]->disabilitas_count = $temp;
                    $nilai[$j + 1]->kecamatan = $tempNama;
                }
            }
        }

        $top5 = [];
        $xxx = 0;
        for ($c = count($nilai) - 1; $c > 0; $c--) {
            if ($xxx < 5) {
                $top5[$xxx] = [
                    'kecamatan' => $nilai[$c]->kecamatan,
                    'disabilitas_count' => '' . $nilai[$c]->disabilitas_count
                ];
                $xxx++;
            }
        }

        // =====================================================
        //              🔥 SAW METHOD DENGAN RATA-RATA
        // =====================================================

        // Hitung rata-rata jumlah disabilitas
        $totalDisabilitas = $kecamatanData->sum('disabilitas_count');
        $rataRataDisabilitas = count($kecamatanData) > 0
            ? $totalDisabilitas / count($kecamatanData)
            : 0;

        // Ambil nilai maksimum untuk normalisasi (benefit)
        $maxDisabilitas = $kecamatanData->max('disabilitas_count');

        // Bobot SAW (bisa disesuaikan)
        $bobotDisabilitas = 1; // hanya 1 kriteria, jadi bobot = 1

        // Normalisasi + perhitungan SAW dengan pertimbangan rata-rata
        $sawResults = [];

        foreach ($kecamatanData as $item) {
            // Normalisasi standar
            $normalisasi = $maxDisabilitas > 0
                ? $item->disabilitas_count / $maxDisabilitas
                : 0;

            // Score SAW dasar
            $scoreDasar = $normalisasi * $bobotDisabilitas;

            // Bonus/Malus berdasarkan perbandingan dengan rata-rata
            $deviasiDariRataRata = $rataRataDisabilitas > 0
                ? ($item->disabilitas_count - $rataRataDisabilitas) / $rataRataDisabilitas
                : 0;

            // Faktor koreksi berdasarkan deviasi (maksimal ±20%)
            $faktorKoreksi = 1 + ($deviasiDariRataRata * 0.2);

            // Score akhir dengan koreksi rata-rata
            $scoreAkhir = $scoreDasar * $faktorKoreksi;

            // Pastikan score tidak negatif dan tidak lebih dari 1
            $scoreAkhir = max(0, min(1, $scoreAkhir));

            $sawResults[] = [
                'kecamatan' => $item->kecamatan,
                'disabilitas_count' => $item->disabilitas_count,
                'normalisasi' => $normalisasi,
                'score_dasar' => $scoreDasar,
                'deviasi_rata_rata' => $deviasiDariRataRata,
                'faktor_koreksi' => $faktorKoreksi,
                'score' => $scoreAkhir,
                'status_vs_rata_rata' => $item->disabilitas_count > $rataRataDisabilitas ? 'di atas rata-rata' :
                    ($item->disabilitas_count < $rataRataDisabilitas ? 'di bawah rata-rata' : 'rata-rata')
            ];
        }

        // Ranking SAW dari yang terbesar
        usort($sawResults, function ($a, $b) {
            return $b['score'] <=> $a['score'];
        });

        // =====================================================
        //              📊 DATA RATA-RATA UNTUK VIEW
        // =====================================================

        $statistikRataRata = [
            'rata_rata_disabilitas' => round($rataRataDisabilitas, 2),
            'total_disabilitas' => $totalDisabilitas,
            'jumlah_kecamatan' => count($kecamatanData),
            'maksimum_disabilitas' => $maxDisabilitas,
            'minimum_disabilitas' => $kecamatanData->min('disabilitas_count')
        ];

        // Kecamatan dengan nilai di atas rata-rata
        $kecamatanAboveAverage = array_filter($sawResults, function ($item) use ($rataRataDisabilitas) {
            return $item['disabilitas_count'] > $rataRataDisabilitas;
        });

        // Kecamatan dengan nilai di bawah rata-rata
        $kecamatanBelowAverage = array_filter($sawResults, function ($item) use ($rataRataDisabilitas) {
            return $item['disabilitas_count'] < $rataRataDisabilitas;
        });

        return view('pages.landing.index', compact(
            'kecamatanData',
            'totalKecamatan',
            'totalPenyandang',
            'penyandangTerbanyak',
            'top5',
            'sawResults',
            'statistikRataRata', // 📊 Data statistik rata-rata
            'kecamatanAboveAverage', // 📈 Kecamatan di atas rata-rata
            'kecamatanBelowAverage'  // 📉 Kecamatan di bawah rata-rata
        ));
    }
}