<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //  Lister tous les utilisateurs
    public function index()
    {
        return User::all();
    }

    //  Afficher un utilisateur spécifique
    public function show($id)
    {
        $user = User::findOrFail($id);
        return response()->json($user);
    }

    //  Créer un nouvel utilisateur (utilisé par un admin)
    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|string|email|unique:users',
            'password' => 'required|string|min:6',
            'role'     => 'nullable|string'
        ]);

        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'role'     => $request->role ?? 'user'
        ]);

        return response()->json($user, 201);
    }

    //  Mettre à jour un utilisateur
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $user->update($request->only(['name', 'email', 'role']));

        return response()->json($user);
    }

    //  Supprimer un utilisateur
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return response()->json(['message' => 'Utilisateur supprimé']);
    }
}