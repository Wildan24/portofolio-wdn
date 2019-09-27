<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\facades\DB;
use Illuminate\Support\facades\Session;

class order extends Controller
{
    public function order (Request $request) {
      DB::table ('tbl_keranjang') -> insert([
        'id_user' => Session::get('id_user'),
        'id_barang' => $request->id_barang,
        'jumlah' => $request->jumlah
      ]);
      return redirect('/');
    }

    public function keranjang(){
      $keranjang = DB::table('vw_keranjang')->get();
      return view ('keranjang',['keranjang' => $keranjang]);
    }
}
