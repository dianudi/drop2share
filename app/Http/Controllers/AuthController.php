<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function showPage()
    {
        return view('pages.auth.signin');
    }

    public function signin(Request $request)
    {
    }

    public function signout()
    {
    }
}
