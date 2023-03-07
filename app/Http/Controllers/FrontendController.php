<?php

namespace App\Http\Controllers;

class FrontendController extends Controller
{
    public function index()
    {
        $framework = 'Laravel';
        return view('index', [
            'framework' => $framework,
        ]);
    }
}
