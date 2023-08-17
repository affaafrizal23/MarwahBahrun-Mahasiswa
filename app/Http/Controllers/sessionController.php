<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class sessionController extends Controller
{
    function index(){
        return view('login.index');
    }
    function cek(Request $req){
        $req->session()->flash('uname', $req->uname);
        $req->validate([
            'uname' => 'required' ,
            'paswd' => 'required' ,
        ],[
            'uname.required' => 'USERNAME wajib diisi',
            'paswd.required' => 'PASSWORD wajib diisi'
        ]);

        $infoLogin = [
            'username' => $req->uname,
            'password' => $req->paswd,
        ];
        if(Auth::attempt($infoLogin)){
            return redirect('mahasiswa')->with('success', 'Berhasil Login'); 
        }else{
            return redirect('login')->withErrors('Username & Password salah');
        }

    }
    function logout() {
        Auth::logout();
        return redirect('login')->with('success', 'Berhasil Log out');
    }
}
