<?php 

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\UserDetail;

class UserController extends Controller {

  function index(){
    $data['list_user'] = User::withCount('produk')->get();
    return view('/user.index', $data);
  } 

  function store (){
    $user = new User;
    $user->nama = request('nama');
    $user->username = request('username');
    $user->email = request('email');
    $user->password = bcrypt(request('password'));
    $user->save();

    $user_detail = new UserDetail();
    $user_detail->id_user = $user->id;
    $user_detail->no_handphone = request('no_handphone');
    $user_detail->save();
    
    return redirect('admin/user')->with('success', 'data berhasil ditambahkan');
  }

  function create() {
    return view('user.create');
  }

  function show(User $user) {
    $data['user'] = $user;
    return view('user.show', $data);
  }

  function edit(User $user) {
    $data['user'] = $user;
    return view('user.edit', $data);
  }

  function update(User $user){
    $user->nama = request('nama');
    $user->username = request('username');
    $user->email = request('email');
    if (request("password"))$user->password = bcrypt(request('password'));   
    $user->save();
    return redirect('/user')->with('success', 'data berhasil edit');

  }
  
  function destroy (User $user){
    $user->delete();

    return redirect('/user')->with('danger', 'data berhasil dihapus');
  }

}