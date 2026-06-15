<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class AuthController extends Controller
{
    //digunakan untuk menampilkan view login
    public function login()
    {
        return view('login', ["title" => "login",]);
    }
    public function authenticating(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);
        if (Auth::attempt($credentials)) {
            Alert::success('Success', 'Login successfull');
            if (Auth::user()->role_id == 1) {
                return redirect('dashboard');
            } elseif (Auth::user()->role_id == 2) {
                return redirect('home');
            }
        }
        Alert::error('Error', 'The credentials do not match our records');
        return redirect('login');
    }
    //digunakan untuk melakukan logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('login');
    }
}
