<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class SessionController extends Controller
{
    public function index()
    {
        return view('sesi.index'); // pakai titik sesuai konvensi view
    }

    public function login(Request $request)
    {
        Session::flash('email', $request->email);

        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ], [
            'email.required' => 'Email wajib diisi',
            'password.required' => 'Password wajib diisi'
        ]);

        $infologin = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::attempt($infologin)) {
            // redirect ke departemen.index sesuai resource route
            return redirect()->route('departemen.index')->with('success', 'Berhasil Login');
        } else {
            // redirect balik ke halaman login
            return redirect()->route('login')->with('error', 'Username atau Password Salah');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // redirect balik ke login page
        return redirect()->route('login')->with('success', 'Berhasil Logout');
    }
}
