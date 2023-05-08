<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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
            return redirect('/dashboard-admin')->with('success', 'Berhasil Login');
        } else {
            return redirect('session')->withErrors('Username & Password Yang Dimasukkan Salah');    
        }

    }

    function logout()
    {
        Auth::logout();
        return redirect('/dashboard')->with('success', 'Berhasil Logout');
    }

    function register() 
    {
        return view('session/register');
    }

    function create(Request $request) 
    {
        Session::flash('name', $request->name);
        Session::flash('email', $request->email);

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8'
        ], [
            'name.required' => 'Nama Wajib Di Isi',
            'email.required' => 'Email Wajib Di Isi',
            'email.email' => 'Masukkan Email yang Valid',
            'email.unique' => 'Email Sudah Pernah Digunakan',
            'password.required' => 'Password Wajib Di Isi',
            'password.min' => 'Password Minimum Berisi 8 Character'
        ]);
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ];
        User::create($data);
        
        $infoLogin = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (Auth::attempt($infoLogin)) {
            return redirect('/dashboard-admin')->with('success', Auth::user()->name . ' Berhasil Login');
        } else {
            return redirect('session')->withErrors('Username & Password Yang Dimasukkan Salah');
        }
    }

    
}

