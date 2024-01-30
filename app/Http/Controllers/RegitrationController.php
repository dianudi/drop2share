<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegistrationRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegitrationController extends Controller
{
    public function showPage()
    {
        return view('pages.registration.index');
    }
    public function register(RegistrationRequest $request)
    {
        $user = new User($request->validated());
        $user->password = Hash::make($request->input('password'));
        $user->save();
    }
}
