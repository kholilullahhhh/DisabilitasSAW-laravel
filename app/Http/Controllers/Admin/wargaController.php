<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\tb_warga;

class wargaController extends Controller
{
    //
    public function index()
    {
        $data = tb_warga::get();
        return view('pages.warga.index', ['menu' => 'warga'], compact('data'));
    }
    
    public function store(Request $request)
    {
        $req = $request->all();
        tb_warga::create($req);
        return redirect()->route('warga.index')->with('message', 'store');
    }

    /**
     * Display the specified resource.
     */
    public function viewBaru()
    {
        return view('pages.warga.create', ['menu' => 'warga']);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = tb_warga::find($id);
        return view('pages.warga.edit', ['menu' => 'warga'], compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $req = $request->all();
        $data = tb_warga::find($req['id']);
        $data->update($req);
        return redirect()->route('warga.index')->with('message', 'update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function hapus(string $id)
    {
        $data = tb_warga::find($id);
        $data->delete();
        return response()->json($data);
    }
    
}
