<?php

namespace App\Http\Controllers;

use App\Enums\UserRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class AuthenticationController extends Controller
{
    // tampilkan form login
    public function create()
    {
        return view('signin', ['title' => 'Sign In']);
    }

    // proses login
    public function store(Request $request)
    {
        $credentials = $request->validate([
            'user_cred' => ['required', 'string'],
            'password' => ['required', 'string'],
        ]);
        // cek apakah input berupa email atau username
        $fieldType = filter_var($request->user_cred, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';


        if (Auth::attempt([$fieldType => $request->user_cred, 'password' => $request->password])) {
            $request->session()->regenerate();

            if (Auth::user()->user_role->value == UserRole::ADMIN->value) {
                return Redirect::route('admin.dashboard');
            }

            return Redirect::route('user.books.index');
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ]);
    }

    // logout
    public function destroy(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}
