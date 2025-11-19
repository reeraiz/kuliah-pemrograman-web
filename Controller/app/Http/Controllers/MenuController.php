<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index()
    {
        $menus = [
            ['id'=>1,'nama_menu'=>'Snack A','harga'=>17500,'deskripsi'=>'Teh kotak kecil, lemper ayam dan cake siram agar2 jeruk.','gambar'=>'Produk A.jpg'],
            ['id'=>2,'nama_menu'=>'Snack B','harga'=>17500,'deskripsi'=>'Teh botol sosro, bolu gula merah dan brownies.','gambar'=>'Produk B.jpg'],
            ['id'=>3,'nama_menu'=>'Snack C','harga'=>17500,'deskripsi'=>'Teh kotak, roti coklat dan lemper ayam.','gambar'=>'Produk C.jpg'],
            ['id'=>4,'nama_menu'=>'Snack D','harga'=>15000,'deskripsi'=>'Risoles, cake sakura gula merah dan air gelas.','gambar'=>'Produk D.jpg'],
        ];

        return view('produk', compact('menus'));
    }
}
