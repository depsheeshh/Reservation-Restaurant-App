<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
class UserController extends Controller
{
    public function index()
    {
        
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required','email:dns'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('beranda');
        }
        return back()->with('loginError', 'Login Failed!');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    public function showLoginForm()
    {
        return view('login', ['title' => 'Login']);
    }

    public function register()
    {
        return view('register', ['title' => 'Register']);
    }

    public function store(Request $request)
    {
       User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => bcrypt($request->password),
        'remember_token' => Str::random(60),
       ]);
       
       return redirect('/login')->with('success', 'Registration successful! Please log in.');
    }

    public function create()
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
