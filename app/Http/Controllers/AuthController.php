<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class AuthController extends Controller
{

    public function register(Request $request)
    {
        /**
         * ==========1===========
         * Validasi data registrasi yang masuk
         */
        $request->validate([
            'name'=>'required|string',
            'email'=>'required|email|unique:users,email',
            'password'=>'required|string|confirmed',
        ]);



        /**
         * =========2===========
         * Buat user baru dan generate token API, atur masa berlaku token 1 jam
         */
        User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
        ]); 
        $user=User::where('email',$request->email)->first();
        $token=$user->createToken('auth_token',[],now()->addHour())->plainTextToken;   



        /**
         * =========3===========
         * Kembalikan response sukses dengan data $user dan $token
         */
        return response()->json([
            'user'=>$user,
            'access_token'=>$token,
            'token_type'=>'Bearer',
            'expires_at'=>now()->addHour()->toDateTimeString(),
        ],201);

    }


    public function login(Request $request)
    {
        /**
         * =========4===========
         * Validasi data login yang masuk
         */
        $request->validate([
            'email'=>'required|email',
            'password'=>'required|string',
        ]);

        /**
         * =========5===========
         * Generate token API untuk user yang terautentikasi
         * Atur token agar expired dalam 1 jam
         */
        // Authenticate without creating a session cookie so Postman
        // receives only the JSON token (Sanctum personal access token).
        $user = User::where('email', $request->email)->first();
        if (! $user || ! Hash::check($request->password, $user->password)) {
            return response()->json([
                'message' => 'Unauthorized'
            ], 401);
        }

        // Create a personal access token (plain text) for API usage
        $token = $user->createToken('auth_token')->plainTextToken;

        /**
         * =========6===========
         * Kembalikan response sukses dengan data $user dan $token
         */
        return response()->json([
            'message'=>"Login berhasil",
            "data"=>[
                'user'=>$user,
                'access_token'=>$token
            ]
        ],200);

    }

    public function logout(Request $request)
    {
        /**
         * =========7===========
         * Invalidate token yang digunakan untuk autentikasi request saat ini
         */
        $request->user()->currentAccessToken()->delete();


        /**
         * =========8===========
         * Kembalikan response sukses
         */
        return response()->json([
            'message'=>'Successfully logged out'
        ],200);

    }
}
