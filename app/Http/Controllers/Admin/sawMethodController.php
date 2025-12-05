<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\tb_disabilitas;
use App\Models\tb_warga;
use App\Models\tb_kodepos;
use App\Models\tb_obser_disabilitas;
use Illuminate\Support\Facades\DB;
use App\Models\modelObservasi as modelObser;

class sawMethodController extends Controller
{
    //
    public function index()
    {
        $table = [];
        $rowna = [];
        $kali = [];
        $hasil = [];
        $infoMatrix = [];
        $info = [];
        $xnama = [];
        // mengambil data dari database
        $data = tb_disabilitas::orderBy('poin', 'DESC')->get();
        $warga = tb_warga::orderBy('nama', 'ASC')->get();

        foreach ($warga as $i => $ix) {
            $xnama[$i] = $ix->nama;
            foreach ($data as $j => $an) {
                $skor = tb_obser_disabilitas::where('id_warga', '=', $ix->id)->where('id_disabilitas', '=', $an->id)->first();
                if ($skor != null) {
                    $table[$i][$j] = $skor->skor;
                } else
                    $table[$i][$j] = 0;
            }
        }
        //
        foreach ($data as $i => $ix) {
            foreach ($warga as $j => $an) {
                $rowna[$i][$j] = $table[$j][$i];
            }
        }
        //ambil nilai max dari setiap kriteria
        foreach ($data as $i => $ix) {
            $rowMax[$i] = max($rowna[$i]);
        }
        $wr[0] = $data;
        $wr[1] = $table;
        $wr[2] = $warga;
        $wr[3] = $rowMax;

        // matrix normalisasi
        foreach ($wr[2] as $x => $it) {
            for ($m = 0; $m < count($wr[0]); $m++) {
                if ((int) $wr[3][$m] == 0) {
                    $kali[$x][$m] = 0;
                    $infoMatrix[$x][$m] = ' - ';
                } elseif ((int) $wr[1][$x][$m] == 0) {
                    $kali[$x][$m] = 0;
                    $infoMatrix[$x][$m] = ' - ';
                } else {
                    $kali[$x][$m] = $wr[1][$x][$m] / $wr[3][$m];
                    $infoMatrix[$x][$m] = ($wr[1][$x][$m]) . ' / ' . ($wr[3][$m]);
                }
            }
        }

        $wr[4] = $kali;

        // mANUAL PREFERENSI
        foreach ($wr[2] as $x => $it) {
            $tempx = 0;
            foreach ($wr[0] as $m => $itemp) {
                $tempx = ($kali[$x][$m] * $itemp->poin) + $tempx;
                $info[$x][$m] = '(' . $kali[$x][$m] . ' * ' . ($itemp->poin / 100) . ')';
            }
            $hasil[$x] = $tempx / 100;
        }


        $wr[5] = $hasil;
        $wr[6] = $info;
        $wr[7] = $infoMatrix;

        //mengurutkan data berdasarkan preferensi
        $n = count($hasil);
        for ($i = 0; $i < $n - 1; $i++) {
            for ($j = 0; $j < $n - $i - 1; $j++) {
                if ($hasil[$j] > $hasil[$j + 1]) {
                    $temp = $hasil[$j];
                    $tempNama = $xnama[$j];

                    $hasil[$j] = $hasil[$j + 1];
                    $xnama[$j] = $xnama[$j + 1];

                    $hasil[$j + 1] = $temp;
                    $xnama[$j + 1] = $tempNama;
                }
            }
        }
        $xr = [];
        $xr[0] = $xnama;
        $xr[1] = $hasil;

        $wr[8] = $xr;
        $wr[9] = DB::table('tb_kodepos')
            ->select('id', 'kodepos', 'kecamatan')
            ->groupBy('kecamatan')
            ->get();
        return view('pages.uji.index', ['menu' => 'uji'], compact('wr'));
    }
}