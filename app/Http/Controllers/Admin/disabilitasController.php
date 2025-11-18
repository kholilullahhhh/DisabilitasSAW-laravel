<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\tb_disabilitas;

class disabilitasController extends Controller
{
    //
    public function index()
    {
        $data = tb_disabilitas::get();
        return view('pages.disabilitas.index', ['menu' => 'disabilitas'], compact('data'));
    }
    public function store(Request $request)
    {
        $req = $request->all();
        tb_disabilitas::create($req);
        return redirect()->route('disabilitas.index')->with('message', 'store');
    }

    /**
     * Display the specified resource.
     */
    public function viewBaru()
    {
        return view('pages.disabilitas.create', ['menu' => 'disabilitas']);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = tb_disabilitas::find($id);
        return view('pages.disabilitas.edit', ['menu' => 'disabilitas'], compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $req = $request->all();
        $data = tb_disabilitas::find($req['id']);
        $data->update($req);
        return redirect()->route('disabilitas.index')->with('message', 'update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function hapus(string $id)
    {
        $data = tb_disabilitas::find($id);
        $data->delete();
        return response()->json($data);
    }
}
