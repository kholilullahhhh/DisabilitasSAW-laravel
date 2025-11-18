<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function login()
    {
        return view('pages.auth.login');
    }

    public function regisStore(Request $request)
    {
        $req = $request->all();
        $req['password'] = bcrypt($req['password']);
        $cek = User::create($req);
        if ($cek)
            return view('pages.auth.login');
        return redirect()->back()->with('message', 'gagal register');
    }

    public function regis()
    {
        return view('pages.auth.register');
    }
    public function login_action(Request $request)
    {
        $cek = Auth::attempt(['username' => $request->username, 'password' => $request->password]);
        $user = User::where('username', $request->username)->first();
        //Laravel automatically Hash check password for logins if you use the Auth::attempt(), and make sure your password column in your db is named password else this will not work
        if ($cek) {
            Session::put('user_id', $user->id);
            Session::put('name', $user->name);
            Session::put('username', $user->username);
            Session::put('role', $user->role);
            Session::put('cek', true);
            if ($user->role == 'admin')
                return redirect()->route('admin')->with('message', 'sukses login');
            return redirect()->route('warga.index')->with('message', 'sukses login');
        } else {
            return redirect()->back()->with('message', 'gagal login');
        }
    }
}
