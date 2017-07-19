<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use App\User;

class LoginController extends Controller
{

    public function __construct()
      {
        $this->middleware('guest');
      }

    public function getLogin()
    {
      return view('login.formLogin');
    }

    public function postLogin(Request $request)
    {
        //dd($request['emailuser']);
        $sessionRecord = User::where([['email','=',$request['emailuser']]])->first();
        //dd($sessionRecord['email']);

        $request->session()->put('id', $sessionRecord['id']);
        $request->session()->put('role_id',$sessionRecord['roles_id']);
        $request->session()->put('username',$sessionRecord['username']);
        $request->session()->put('email',$sessionRecord['email']);
        //dd($request);
        if (Auth::attempt([
                'email' => $request->emailuser,
                'password' => $request->password
            ])) {
            return redirect('/admin/siswa');
        } elseif (Auth::attempt([
                'username' => $request->emailuser,
                'password' => $request->password
            ])) {
            return redirect('/admin/siswa');
        } else {
            return 'salah input';
        }
    }
}
