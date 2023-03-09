<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class FrontendController extends Controller
{
    public function newUser(Request $request): View
    {
        $email = $request->get('email');
        return view('newUser', [
            'email' => $email
        ]);
    }

    public function showUsers(): View
    {
        $users = DB::table('users')->get();
        return view('admin.users', [
            'users' => $users
        ]);
    }
}
