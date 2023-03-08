<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class FrontendController extends Controller
{
    public function adminDashboard(): View
    {
        return view('admin.dashboard', [
            'userCount' => DB::table('users')->count()
        ]);
    }

    public function newUser(Request $request): View
    {
        $email = $request->get('email');
        return view('auth.newUser', [
            'email' => $email
        ]);
    }
}
