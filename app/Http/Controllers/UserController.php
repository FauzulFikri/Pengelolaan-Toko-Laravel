<?php

namespace App\Http\Controllers;

use App\Models\User; // Import the User class from the appropriate namespace
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index()
    {
        $user = User::all();
        return response()->json(['data' => $user]);
    }
    //login user
    public function login(Request $request)
    {
        $user = User::where('username', $request->username)->first();
        if($user){
            if($request->password == $user->password){
                return response()->json([
                    'success' => true,
                    'message' => 'Login Berhasil',
                    'data' => $user
                ], 201);
            }else{
                return response()->json([
                    'success' => false,
                    'message' => 'Password Salah',
                    'data' => ''
                ], 400);
            } 
        }
    }

    public function getAllUser(){
        $user = User::all();
        if($user){
            return response()->json([
                'status' => 200,
                'message' => 'Berhasil Menampilkan Data User',
                'data' => $user
            ]);
        }
        return response()->json([
            'status' => 404,
            'message' => 'Data user Tidak Ditemukan'
        ]);
    }
}