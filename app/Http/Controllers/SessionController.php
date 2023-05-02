<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class SessionController extends Controller
{
    function index()
    {
        return view("session.index");
    }

    function login(Request $request) 
    {
        Session::flash('email', $request->email);
        
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ], [
            'email.required' => 'Email Wajib Di Isi',
            'password.required' => 'Password Wajib Di Isi'
        ]);

        $infoLogin = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if(Auth::attempt($infoLogin)){
            return redirect('mahasiswa')->with('success', 'Berhasil Login');
        } else {
            return redirect('session')->withErrors('Username & Password Yang Dimasukkan Salah');    
        }
    }
}
