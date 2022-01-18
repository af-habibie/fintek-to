<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $fields = $request->validate([
            'name'      => 'required|string',
            'email'     => 'required|string|unique:users,email',
            'password'  => 'required|string'
        ]);

        $user = User::create([
            'name'      => $fields['name'],
            'email'     => $fields['email'],
            'password'  => $fields['password'],
        ]);

        $token = $user->createToken('fintechtoken')->plainTextToken;

        $response = [
            'user'  => $user,
            'token' => $token,
        ];

        return response($response, 201);
    }

    public function login(Request $request)
    {
        $fields = $request->validate([
            'email'     => 'required|string',
            'password'  => 'required|string'
        ]);

        // Check email
        $user = User::where('email', $fields['email'])->first();

        // Check password
        if (!$user || !Hash::check($fields['password'], $user->password)) {
            return response([
                'message'   => 'Password atau email anda salah!'
            ], 401);
        }

        $token = $user->createToken('fintechtoken')->plainTextToken;

        $response = [
            'user'  => $user,
            'token' => $token,
        ];

        return response($response, 201);
    }

    public function logout()
    {
        auth()->user()->tokens()->delete();

        return [
            'message'   => 'Berhasil keluar dari akun'
        ];
    }
}
