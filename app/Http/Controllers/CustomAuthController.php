<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomAuthController extends Controller
{
    public function credentials(Request $request)
    {
        $user = User::where('username', $request->username)->first();
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
        if (Auth::attempt($credentials)) {
            session(['id' => $user->id, 'email' => $request->email, 'name' => $user->name]);
            $session = [
                'message' => 'Selamat datang di Website Digital Festival!',
                'title' => 'Login',
                'icon' => 'success',
            ];
            return redirect()->route('user.dashboard')->with($session);
        }
        return redirect()->back()->with(['message' => 'Email atau password salah, harap login kembali!', 'title' => 'Credentials Error', 'icon' => 'error']);
    }

    public function logout()
    {
        session()->flush();
        Auth::logout();
        return redirect()->route('login')->with([
            'message' => 'Anda berhasil logout',
            'title' => 'Logout',
            'icon' => 'success'
        ]);
    }
}
