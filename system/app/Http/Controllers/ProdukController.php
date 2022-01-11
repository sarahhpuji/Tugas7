<?php

namespace App\Http\Controllers;
use App\Models\Produk;

class ProdukController extends Controller {
    function index2(){
		$data['list_produk'] = Produk::all();
        return view('produk.index2', $data);
    }
    function create(){
        return view('produk.create');
    }
    function store(){
        $Produk = new Produk;
        $Produk->nama = request('nama');
        $Produk->harga = request('harga');
        $Produk->berat = request('berat');
        $Produk->deskripsi = request('deskripsi');
        $Produk->stok = request('stok');
        $Produk->save();

        return redirect('/produk')->with('success', 'Data Berhasil Ditambahkan');
    }
    function show(produk $Produk){
        $data['produk'] = $Produk;
        return view('produk.show', $data);
    }
    function edit(produk $Produk){
        $data['produk'] = $Produk;
        return view('produk.edit', $data);
    }
    function update(produk $Produk){
        $Produk->nama = request('nama');
        $Produk->harga = request('harga');
        $Produk->berat = request('berat');
        $Produk->deskripsi = request('deskripsi');
        $Produk->stock = request('stock');
        $Produk->save();

        return redirect('/produk')->with('success', 'Data Berhasil Diedit');
    }
    function destroy(produk $Produk){
        $Produk->delete();

        return redirect('/produk')->with('danger', 'Data Berhasil Dihapus');

    }
    function filter (){

        // where
        $nama= request('nama');
        $data['nama']= $nama;
    
         $data['list_produk'] = Produk::where('nama', 'like', "%$nama%")->get();
    
    
        //  wherein
        $stok= explode(",", request('stok'));
        $data['stok'] = request('stok');
    
        // $data['list_produk'] = Produk::whereIn('stok', $stok)->get();
    
    
    
        // where betwen
    
        $harga_min = request('harga_min');
        $harga_max = request('harga_max');
        $data['harga_min'] = $harga_min;
        $data['harga_max'] = $harga_max;
    
        // $data['list_produk'] = produk::whereBetween('harga', [$harga_min, $harga_max])->get();
    
        // where not
    
        // $data['list_produk'] = produk::where('stok', '<>' ,$stok)->get();
    
    
        // where not in
    
        // $data['list_produk'] = produk::whereNotIn('stok',  $stok)->get();
    
    
        // where not between
    
        // $data['list_produk'] = produk::whereNotBetween('harga', [$harga_min, $harga_max])->get();
    
        // where null
        // $data['list_produk'] = produk::whereNull('stok')->get();
    
        // where not null
        // $data['list_produk'] = produk::whereNotNull('stok')->get();
    
    
        // where date
    
        // $data['list_produk'] = produk::whereDate('created_at', '2021-11-21'  )->get();
    
        // where group
    
        // $data['list_produk'] = produk::whereBetween('harga', [$harga_min, $harga_max])->whereIn('stok', [10])->get();
    
    
        // result
        return view('produk.index2', $data);
      }
}