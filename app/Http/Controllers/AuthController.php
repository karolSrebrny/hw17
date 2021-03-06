<?php


namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController
{
    public function login()
    {
        return view('pages.login');
    }

    public function handleLogin(Request $request)
    {
        $data = $request->validate([
            'email' =>['required', 'email'],
            'password' =>['required', 'min:8',],
        ]);
        if (Auth::attempt($data)) {
            $user = Auth::user();
            $user -> password = Hash::make($data['password']);
            $user -> save();

            return redirect()->route('home');
        }

        return back()->withErrors([
            'email'=> 'Owubka.'
        ]);
    }
    public function logout()
    {
        Auth::logout();

        return redirect()->route('home');

    }

}
