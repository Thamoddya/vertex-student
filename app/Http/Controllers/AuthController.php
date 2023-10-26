<?php

namespace App\Http\Controllers;


use App\Models\User;
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
            $teamMember->update([
                'last_login' => now(),
            ]);
            $token = $teamMember->createToken('authToken')->plainTextToken;
            return redirect()->route('home');
        }
        return redirect()->back()->with('error', 'Invalid credentials');
    }
}
