<?php

namespace App\Http\Controllers;

use App\Models\Facades\DatabaseFacade;
use Illuminate\Http\Request;
use Illuminate\View\View;

class FrontendController extends Controller
{
    public function __construct(
        private readonly DatabaseFacade $facade
    ) {
    }

    public function newUser(Request $request): View
    {
        $email = $request->get('email');
        return view('newUser', [
            'email' => $email
        ]);
    }

    public function showUsers(): View
    {
        $users = $this->facade->getUsers();
        return view('admin.users', [
            'users' => $users
        ]);
    }
}
