<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Users;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        // Ambil data grup berdasarkan nama grup yang diberikan
        $user = Users::where('email', $credentials['email'])->first();

        // Periksa apakah grup ditemukan dan kata sandi sesuai
        if ($user && password_verify($credentials['password'], $user->password)) {
            return response()->json(['message' => 'Login Success'], 200);
        }

        // Autentikasi gagal
        return response()->json(['message' => 'Email or Password is Incorrect'], 401);
    }
    public function logout(Request $request)
    {
        Auth::logout();

        return response()->json(['message' => 'Logout Success'], 200);
    }
}
