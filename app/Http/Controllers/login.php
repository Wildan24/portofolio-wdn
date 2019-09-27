<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\facades\DB;
use Illuminate\Support\facades\Session;

class login extends Controller
{
    public function index(){
      return view('login');
    }

    public function register (Request $request){
      //insert data untuk ke database table user
      DB::table('tbl_user')->insert([
        'username'  => $request->username,
        'email'     => $request->email,
        'password'  => $request->password
      ]);

      return redirect('/login');
    }

    public function masuk (Request $request){
      //untuk login
      $user = DB::table('tbl_user')->where('email', $request->email)->first();
      if($user->password == $request->password){
        session::put('id_user', $user->id);
        echo "data tersimpan dengan session id =".$request->session()->get('id');
        return redirect('/');
      } else {
        echo "anda gagal login";
      }
    }

    public function keluar () {
      Session::forget('id_user');
      return redirect ('/');
    }
  }
