<?php

namespace App\Http\Controllers;

use App\Enums\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class AuthController extends Controller
{
    public function authenticate(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            if (Auth::user()->role === Role::ADMIN->value) {
                return redirect()->route('admin.dashboard');
            } else {
                return redirect()->route('login');
            }
        } else {
            return back()->with('error', 'The provided credentials do not match our records.');
        }
    }
}
