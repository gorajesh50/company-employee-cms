<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserAuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }  
	public function userLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
   
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
			  return view('links_views');
            //return redirect()->intended('dashboard')
            //            ->withSuccess('Signed in');
        }
	return redirect('login')->with('completed', 'Login details are not valid');
      
   }

}
