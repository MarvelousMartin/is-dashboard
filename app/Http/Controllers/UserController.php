<?php

namespace App\Http\Controllers;

use App\Mail\NewUserMail;
use App\Models\Entities\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    public function store(Request $request): RedirectResponse
    {

        $user = new User();

        $user->name = 'hasjhdkjasdhkjashdk';
        $user->email = 'hasjhdkjasdhkjashdk';
        $user->password = 'hasjhdkjasdhkjashdk';

        $user->save();

        return redirect('/test');
    }

    public function sendUserEmail(Request $request)
    {
        $email = $request->get('email');
        Mail::to($email)->send(new NewUserMail($email));

        return redirect()->route('register')->with('success', 'Email sent successfully!');
    }

    public function storeNewUser(Request $request): RedirectResponse
    {
        $user = new User();

        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->password = bcrypt($request->get('password'));

        $user->save();

        return redirect()->route('login')->with('success', 'You have enrolled successfully!');
    }
}
