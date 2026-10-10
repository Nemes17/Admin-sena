<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    
    public function consulta1()
    {
        $respuesta = User::with(['apprentices', 'teachers'])->get();
        return response()->json($respuesta);
    }

    
    public function index()
    {
        return response()->json(User::all());
    }

    
    public function show(User $user)
    {
        return response()->json($user);
    }

    
    public function store(Request $request)
    {
        $data = $request->validate([
            'name'     => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
            'rol'      => 'required|string|max:50',
        ]);

        $user = User::create($data);
        return response()->json($user, 201);
    }

    
    public function update(Request $request, User $user)
    {
        $data = $request->validate([
            'name'     => 'required|string|max:255',
            'username' => ['required', 'string', 'max:255', Rule::unique('users', 'username')->ignore($user->id)],
            'email'    => ['required', 'email', Rule::unique('users', 'email')->ignore($user->id)],
            'rol'      => 'required|string|max:50',
        ]);

        $user->update($data);

        return response()->json($user);
    }

   
    public function destroy(User $user)
    {
        $user->delete();

        return response()->json(['message' => 'Usuario eliminado correctamente']);
    }
}
