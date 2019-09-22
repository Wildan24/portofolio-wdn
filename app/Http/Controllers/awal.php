<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\m_barang;
use Illuminate\Support\facades\DB;

class awal extends Controller
{
    public function index() {
      $barang = DB::table('tbl_barang')->get();
      return view('awal',['barang' => $barang]);
    }
    public function toko (Request $request) {
      $this->validate($request, [
        'file' => 'required|max:2048'
      ]);
      $file = $request->file('file');
      $nama_file = time()."_".$file->getClientOriginalName();
      $tujuan_upload = 'data_file';
      if($file->move($tujuan_upload,$nama_file)){
        $data = m_barang::create([
          'nama_produk' => $request->nama_produk,
          'harga' => $request->harga,
          'gambar' => $nama_file
        ]);
        $res['message'] = "Success!";
        $res['values'] = $data;
        return response($res);
      }
    }
}
