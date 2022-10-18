<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\User;



class registerController extends Controller
{
  public function index()
  {
    return view('register.index', [
      'title' => 'Register',
      'active' => 'Register'
    ]);
  }

  // method untuk mengelola data yg dikirimkan dari form
  public function store(Request $request)
  {

    // validasi form 
    $Validatedata = $request->validate([
      'name' => 'required|min:5|max:255',
      'username' => 'required|min:5|max:255|unique:users',
      'email' => 'required|email:dns|unique:users',
      'password' => 'required|min:8|max:255'
    ]);

    $Validatedata['password'] = bcrypt($Validatedata['password']);

    User::create($Validatedata);

    // pindah ke halaman login dengan membawa 2 value dari flash data
    // $request->session()->flash('success', 'register berhasil, silahkan login');
    return redirect('/login')->with('success', 'Register Berhasil, Silahkan Login!!!');
  }
}
