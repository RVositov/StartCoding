<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string',
            'password' => 'required|string',
        ]);

        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()->json(['message' => 'Invalid credentials'], 401);
        }

        $user = Auth::user();
        $token = $user->createToken('authToken')->plainTextToken;
        $response = [
            'message' => 'Выполнен вход в систему',
            'token' => $token,
        ];

        return redirect('/')->with('success', $response);
    }

    public function user()
    {
        return Auth::user();
    }

    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();
        Auth::user()->tokens()->delete();
        Auth::logout();
        return redirect('/login');
      //  return response()->json(['message' => 'Выход выполнен']);
    }
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
             'password' => 'required|string|min:4',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $token = $user->createToken('authToken')->plainTextToken;
        $response = [
            'message' => 'Регистрация закончено. Выполните вход в систему',
            'token' => $token,
        ];

        return redirect('/log')->with('success', $response);
    }
}
