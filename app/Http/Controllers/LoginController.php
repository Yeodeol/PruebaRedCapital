<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    
    public function show(){
        return view('login.index');
    }

    public function login(Request $request){  
        $credentials = $request->only('email', 'password');
        
        if (Auth::attempt($credentials)) {

            $user = Auth::getProvider()->retrieveByCredentials($credentials);
            Auth::login($user);
            return $this->authenticated($request,$user);
        }else{
            $user = Auth::getLastAttempted();
            if($user){
                if ($user->status != 'active') {
                    return redirect()->back()->withInput()->withErrors(['msg' => 'El usuario no esta Activo.']);
                }else{
                    return redirect()->back()->withInput()->withErrors(['msg' => 'Email o Contraseña Invalidos']);
                }
            }else{
                return redirect()->back()->withInput()->withErrors(['msg' => 'Email o Contraseña Invalidos']);
            }
        }
    }

    public function authenticated(Request $request,$user){
        return redirect()->to('/');
    }

    public function logout(){
        Session::flush();
        Auth::logout();
        return redirect()->to('login');
    }
}
