<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);
    
        if ($validator->fails()) {
            return redirect()->route('login')
                ->withErrors($validator)
                ->withInput();
        }
    
        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect()->route('home');
        }
    
        return back()->withErrors(['email' => 'Invalid credentials. Please try again.']);
    }
    

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
