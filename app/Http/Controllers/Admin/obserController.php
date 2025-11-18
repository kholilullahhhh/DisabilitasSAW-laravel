<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\tb_obser_disabilitas;
use App\Models\tb_disabilitas;
use App\Models\tb_warga;
use Illuminate\Support\Facades\DB;

class obserController extends Controller
{
    //
    public function index()
    {
        //$data = tb_obser_disabilitas::orderBy('kecamatan', 'DESC')->get();
        $data = DB::table('tb_obser_disabilitas')
            ->select('tb_obser_disabilitas.id', 'tb_wargas.nama', 'tb_disabilitas.kriteria', 'tb_disabilitas.ket', 'tb_obser_disabilitas.skor')
            ->leftJoin('tb_wargas', 'tb_obser_disabilitas.id_warga', '=', 'tb_wargas.id')
            ->leftJoin('tb_disabilitas', 'tb_obser_disabilitas.id_disabilitas', '=', 'tb_disabilitas.id')
            ->orderBy('tb_wargas.nama', 'asc')
            ->get();
        return view('pages.obser.index', ['menu' => 'obser'], compact('data'));
    }
    public function indexna(string $id)
    {
        $hore = DB::table('tb_obser_disabilitas')
            ->select('tb_obser_disabilitas.id', 'tb_wargas.nama', 'tb_disabilitas.kriteria', 'tb_disabilitas.ket', 'tb_obser_disabilitas.skor')
            ->leftJoin('tb_wargas', 'tb_obser_disabilitas.id_warga', '=', 'tb_wargas.id')
            ->leftJoin('tb_disabilitas', 'tb_obser_disabilitas.id_disabilitas', '=', 'tb_disabilitas.id')
            ->where('tb_wargas.id', '=', $id)
            ->orderBy('tb_wargas.nama', 'asc')
            ->get();
        $data = [];
        $data[0] = $hore;
        $data[1] = $id;
        return view('pages.warga.observasi', ['menu' => 'warga'], compact('data'));
    }
    public function store(Request $request, string $id)
    {
        $req = $request->all();
        tb_obser_disabilitas::create($req);

        // Pass the $id parameter to the route
        return redirect()->route('warga.observasi', ['id' => $id])->with('message', 'store');
    }
    /**
     * Display the specified resource.
     */
    public function viewBaru(string $id)
    {
        $xx = tb_warga::find($id);
        $xn = tb_disabilitas::get();
        $data = [];
        $data[0] = $xx;
        $data[1] = $xn;
        return view('pages.obser.create', ['menu' => 'obser'], compact('data', 'id'));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id, string $id2)
    {
        $data = [];
        $obser = tb_obser_disabilitas::find($id);
        $usr = tb_warga::find($id2);
        $data[2] = tb_disabilitas::get();
        $data[0] = $obser;
        $data[1] = $usr;
        return view('pages.obser.edit', ['menu' => 'obser'], compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $req = $request->all();
        $data = tb_obser_disabilitas::find($req['id']);
        $data->update($req);
        return redirect()->route('obser.index')->with('message', 'update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function hapus(string $id)
    {
        $data = tb_obser_disabilitas::find($id);
        $data->delete();
        return response()->json($data);
    }
}
