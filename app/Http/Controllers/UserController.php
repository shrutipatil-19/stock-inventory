<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function register()
    {
        return view('stock-management.Register');
    }

    public function storeUser(Request $request)
    {
        $validate = $request->validate([
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
            'role' => 'required'
        ]);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'password' => Hash::make($request->password),
        ]);
        return redirect()->route('login')->with('success', 'User Register Successfully');
    }
    public function login()
    {
        return view('stock-management.Login');
    }
    public function loginUser(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            $user = Auth::user();

            if (in_array($user->role, ['admin', 'staff',])) {
                return redirect()->route('addProduct');
            }

            return redirect()->route('login')->withErrors(['email' => 'Unauthorized role.']);
        }
        return back()->withErrors(['email' => 'Invalid Credentials']);
    }
    public function logout(Request $request)
    {

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
