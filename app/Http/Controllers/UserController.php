<?php

namespace App\Http\Controllers;

use App\Enums\ClientStep;
use App\Mail\NewUserMail;
use App\Models\Entities\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    public function sendUserEmail(Request $request): RedirectResponse
    {
        $email = $request->get('email');
        Mail::to($email)->send(new NewUserMail($email));

        return redirect()->route('register')->with('success', 'Email sent successfully!');
    }

    public function storeNewUser(Request $request): RedirectResponse
    {
        $user = new User();

        $user->email = $request->get('email');
        $user->name = $request->get('name');
        $user->password = bcrypt($request->get('password'));
        $user->address = $request->get('street-address').', '.$request->get('postal-code').' '.$request->get('city').', '.$request->get('state');
        $user->telephone = $request->get('telephone');
        $user->country = $request->get('country');
        $user->role = null;
        $user->step = ClientStep::REGISTERED->value;

        $user->save();

        return redirect()->route('login')->with('success', 'You have enrolled successfully!');
    }

    public function updateUserRole(Request $request): RedirectResponse
    {
        $user = User::find($request->get('id'));
        $user->role = $request->get('role');
        $user->save();

        return redirect(route('admin.users'))->with('success', 'User role updated successfully!');
    }

    public function verifyUser(Request $request)
    {
        $user = User::find($request->get('id'));
        $user->step = ClientStep::VERIFIED->value;
        $user->save();

        return redirect(route('admin.users'))->with('success', 'User verified successfully!');
    }
}
