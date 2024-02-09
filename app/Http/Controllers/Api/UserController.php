<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    // Registrasi pengguna baru
    public function register(Request $request)
    {
        // Validasi input pengguna
        $request->validate([
            'username' => 'required|string|unique:users,username',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed|regex:/^(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]+$/',
            'password_confirmation' => 'required|string|min:8',
            'contact' => 'required|string|unique:users,contact', // Validasi nomor kontak unik
            'roles' => 'required|string|in:Lead Warehouse,Team Member',
        ]);

        // Cek apakah username, email, dan contact sudah ada
        $existingUser = Users::where('username', $request->input('username'))
            ->orWhere('email', $request->input('email'))
            ->orWhere('contact', $request->input('contact'))
            ->first();

        // Jika pengguna sudah ada dengan salah satu data yang sama
        if ($existingUser) {
            $errors = [];

            if ($existingUser->username === $request->input('username')) {
                $errors['username'] = 'Username already exists';
            }

            if ($existingUser->email === $request->input('email')) {
                $errors['email'] = 'Email already exists';
            }

            if ($existingUser->contact === $request->input('contact')) {
                $errors['contact'] = 'Contact already exists';
            }

            throw ValidationException::withMessages($errors);
        }

        // Buat pengguna baru
        $user = new Users([
            'username' => $request->input('username'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')), // Hash password sebelum disimpan
            'contact' => $request->input('contact'),
            'roles' => $request->input('roles'),
        ]);

        // Simpan pengguna ke database
        $user->save();

        // Berikan respons dengan pengguna yang berhasil diregistrasi
        return response()->json(['message' => 'User registered successfully'], 201);
    }
}
