<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\tb_kodepos;

class kodeposController extends Controller
{
    //
    public function index()
    {
        $data = tb_kodepos::orderBy('kecamatan', 'DESC')->get();
        return view('pages.kodepos.index', ['menu' => 'kodepos'], compact('data'));
    }
}
