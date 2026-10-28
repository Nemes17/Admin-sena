<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AuthLogin extends Controller
{

    
    public function showLoginForm()
    {
        
        return view('auth.login');
    }

   
    public function login(Request $request)
    {
        
        $credentials = $request->validate([
            'username' => ['required', 'string'],
            'password' => ['required', 'string'],
        ]);

        
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $rol = Auth::user()->rol;
            
            
            if ($rol === 'admin') {
                return redirect()->intended('/administrative'); 
            } elseif ($rol === 'instructor') {
                return redirect()->intended('/teacher/home'); 
            } else {
                return redirect()->intended('/apprentice/home'); 
            }
        }

        
        return back()->withErrors([
            'username' => 'Las credenciales proporcionadas no coinciden con nuestros registros.',
        ])->onlyInput('username');
    }

   
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}

