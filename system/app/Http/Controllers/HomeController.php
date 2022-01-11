<?php 

namespace App\Http\Controllers;

class HomeController extends Controller{


function showDashboard(){
	return view ('dashboard');
}

function showKategori(){
	return view ('kategori');
}

function showAbout(){
	return view ('about');
}

function showShop(){
	return view ('shop');
}

function showContact(){
	return view ('contact');
}

function showProduk(){
	return view ('produk');
}

function showRegistrasi(){
	return view ('registrasi');
}

function showUser(){
	return view ('user');
}

function showHome(){
	return view ('home');
}
}