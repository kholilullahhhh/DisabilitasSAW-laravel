<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $data = User::get();
        return view('pages.user.index', ['menu' => 'user'], compact('data'));
    }
    public function store(Request $request)
    {
        $req = $request->all();
        $req['password'] = bcrypt($req['password']);
        User::create($req);
        return redirect()->route('user.index')->with('message', 'store');
    }

    /**
     * Display the specified resource.
     */
    public function viewBaru()
    {
        return view('pages.user.create', ['menu' => 'user']);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = User::find($id);
        return view('pages.user.edit', ['menu' => 'user'], compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $req = $request->all();
        $req['password'] = bcrypt($req['password']);

        $data = User::find($req['id']);
        $data->update($req);

        return redirect()->route('user.index')->with('message', 'update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function hapus(string $id)
    {
        $data = User::find($id);
        $data->delete();
        return response()->json($data);
    }
}
