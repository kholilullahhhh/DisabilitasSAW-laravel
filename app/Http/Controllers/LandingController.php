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

        // Query Kecamatan (tidak diubah)
        $kecamatanData = DB::table('tb_kodepos')
            ->select('tb_kodepos.kecamatan as kecamatan')
            ->selectRaw("(SELECT COUNT(warga.kecamatan) FROM `warga` WHERE warga.kecamatan = tb_kodepos.kecamatan AND warga.jumlah='y') as disabilitas_count")
            ->groupBy('tb_kodepos.kecamatan')
            ->get();

        // Bubble Sort (tidak diubah)
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
        //              🔥 SAW METHOD DITAMBAHKAN
        // =====================================================

        // Ambil nilai maksimum untuk normalisasi (benefit)
        $maxDisabilitas = $kecamatanData->max('disabilitas_count');

        // Bobot SAW (bisa disesuaikan)
        $bobotDisabilitas = 1; // hanya 1 kriteria, jadi bobot = 1

        // Normalisasi + perhitungan SAW
        $sawResults = [];

        foreach ($kecamatanData as $item) {
            $normalisasi = $maxDisabilitas > 0
                ? $item->disabilitas_count / $maxDisabilitas
                : 0;

            $score = $normalisasi * $bobotDisabilitas;

            $sawResults[] = [
                'kecamatan' => $item->kecamatan,
                'disabilitas_count' => $item->disabilitas_count,
                'normalisasi' => $normalisasi,
                'score' => $score
            ];
        }

        // Ranking SAW dari yang terbesar
        usort($sawResults, function ($a, $b) {
            return $b['score'] <=> $a['score'];
        });

        // =====================================================

        return view('pages.landing.index', compact(
            'kecamatanData',
            'totalKecamatan',
            'totalPenyandang',
            'penyandangTerbanyak',
            'top5',
            'sawResults' // ⬅ dikirim ke view
        ));
    }
}
