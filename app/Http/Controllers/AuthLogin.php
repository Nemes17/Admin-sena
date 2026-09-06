<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AuthLogin extends Controller
{

    // 1. Mostrar la vista del login
    public function showLoginForm()
    {
        // Asegúrate de que tu vista esté en resources/views/auth/login.blade.php
        return view('auth.login');
    }

    // 2. Procesar las credenciales cuando el usuario le da a "Ingresar"
    public function login(Request $request)
    {
        // Validar los datos del formulario
        $credentials = $request->validate([
            'username' => ['required', 'string'],
            'password' => ['required', 'string'],
        ]);

        // Intentar iniciar sesión
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $rol = Auth::user()->rol;
            
            // Redirecciones dependiendo del rol (en inglés como acordamos)
            if ($rol === 'admin') {
                return redirect()->intended('/administrative'); 
            } elseif ($rol === 'instructor') {
                return redirect()->intended('/teacher'); 
            } else {
                return redirect()->intended('/apprentice'); 
            }
        }

        // Si falla, regresar con mensaje de error
        return back()->withErrors([
            'username' => 'Las credenciales proporcionadas no coinciden con nuestros registros.',
        ])->onlyInput('username');
    }

    // 3. Cerrar sesión
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}

