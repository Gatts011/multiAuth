<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class LoginController extends Controller
{
   public function login(Request $request){
       

       if(Auth::attempt([
           'email' => $request->email,
           'password' => $request->password
       ])) //if this method returns true =>
       {
           $user = User::where('email', $request->email)->first();
           if($user->is_admin())
           {
               return redirect()->route('dashboard');
 
           }
           return redirect()->route('home');
       }

       return redirect()->back;
   }
}
