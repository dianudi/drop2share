<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function showPage(): View
    {
        return view('pages.auth.index');
    }

    public function signin(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        $user = User::select('active')->where('email', $credentials['email'])->first();
        if (!$user->active) return back()->withErrors([
            'email' => 'Your account has been banned.',
        ])->onlyInput('email');
        if (Auth::attempt($credentials, $request->input('remember'))) {
            $request->session()->regenerate();

            return redirect()->to('/');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function useSocialite($driver)
    {
        if ($driver === 'facebook' || $driver === 'google') {
            return Socialite::driver($driver)->redirect();
        }
        return abort(404);
    }

    public function socialiteCallback($driver)
    {
        $socialiteUser = Socialite::driver($driver)->user();
        $user = User::updateOrCreate(['email' => $socialiteUser->getEmail()], [
            'name' => $socialiteUser->getName(),
            'username' => Str::snake($socialiteUser->getNickname())
        ]);
        Auth::login($user);
        return to_route('home');
    }

    public function signout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
