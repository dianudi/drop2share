<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password as PasswordValidation;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Storage;

class AccountController extends Controller
{
    public function detailAccount()
    {
        $user = User::find(Auth::user()->id);
        return view('pages.account.detail', compact('user'));
    }

    public function updateAccount(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'username' => [
                'required', 'string', 'max:255', Rule::unique('users')->ignore(Auth::user()->id),
            ]
        ]);
        $user = User::find(Auth::user()->id);
        $user->update($validated);
        return back()->with('updateAccount', 'Account Updated!');
    }

    public function updateEmail(Request $request)
    {
        $validated = $request->validate([
            'email' => ['required', Rule::unique('users')->ignore(Auth::user()->id)],
            'confirm_password' =>  'current_password:web'
        ]);
        $user = User::find(Auth::user()->id);
        $user->update(['email' => $validated['email']]);
        return back()->with('updateEmail', 'Email Updated!');
    }

    public function updatePassword(Request $request)
    {
        $validated = $request->validate([
            'current_password' => 'required|current_password:web',
            'password' => ['required', 'confirmed', PasswordValidation::min(8)->mixedCase()->numbers()]
        ]);
        $user = User::find(Auth::user()->id);
        $user->update(['password' => Hash::make($validated['password'])]);
        return back()->with('updatePassword', 'Password Updated!');
    }

    public function recoveryPassword()
    {
        $status = Password::sendResetLink(
            ['email' => Auth::user()->email]
        );

        return $status === Password::RESET_LINK_SENT
            ? back()->with(['status' => __($status)])
            : back()->withErrors(['failed' => __($status)]);
    }

    public function deleteAccountAndFiles(Request $request)
    {
        $files = File::where('user_id', Auth::user()->id)->get();
        foreach ($files as $file) {
            if (Storage::exists($file->storage_path)) Storage::delete($file->storage_path);
            $file->delete();
        }
        $user = User::find(Auth::user()->id);
        $user->delete();
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
