<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegistrationRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class RegitrationController extends Controller
{
    public function showPage()
    {
        return view('pages.registration.index');
    }
    public function register(RegistrationRequest $request)
    {
        $user = new User($request->validated());
        $user->username = Str::snake($request->input('username'));
        $user->password = Hash::make($request->input('password'));
        $user->save();
        return to_route('auth.signin');
    }
}
