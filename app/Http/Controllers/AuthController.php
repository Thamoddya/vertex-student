<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $teamMember = Auth::user();
            $token = $teamMember->createToken('authToken')->plainTextToken;
            return redirect()->back()->with('success', 'Login Success');
        }
        return redirect()->back()->with('error', 'Invalid credentials');
    }
}
