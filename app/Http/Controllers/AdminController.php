<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    // Overview service information.
    public function index()
    {
        $disktotal = disk_total_space('/');
        $diskfree  = disk_free_space('/');
        $diskuse   = round(100 - (($diskfree / $disktotal) * 100));
        $usertotal = User::count();
        $filetotal = File::count();
        $downloadtotal = File::sum('total_download');
        $latestFiles = File::latest()->limit(10)->get();
        $latestUsers = User::latest()->limit(10)->get();
        $topDownloaded = File::orderBy('total_download', 'desc')->limit(5)->get();
        return view('pages.admin.index', compact('disktotal', 'diskfree', 'diskuse', 'usertotal', 'filetotal', 'downloadtotal', 'latestFiles', 'latestUsers', 'topDownloaded'));
    }

    // Manage users files.
    public function indexFile(Request $request)
    {
        $files = $request->query('q') ? File::where('name', 'like', '%' . $request->query('q') . '%')->paginate(15) : File::latest()->paginate(15);
        $totalFiles = File::count();
        $totalDownloaded = File::sum('total_download');
        $totalSizes = File::sum('size');
        $q = $request->query('q') ? $request->query('q') : null;
        return view('pages.admin.files', compact('files', 'totalFiles', 'totalDownloaded', 'totalSizes', 'q'));
    }

    // Show detail file.
    public function detailFile(File $file)
    {
        return view('pages.admin.file', compact('file'));
    }

    // Manage user account
    public function indexAccount()
    {
        $users = User::latest()->paginate(15);
        return view('pages.admin.accounts', compact('users'));
    }

    // Delete account and files.
    public function deleteAccount(Request $request)
    {
        $user = User::findOrFail($request->input('id'));
        $files = File::where('user_id', $user->id)->get();
        foreach ($files as $file) {
            if (Storage::exists($file->storage_path)) Storage::delete($file->storage_path);
            $file->delete();
        }
        $user->delete();
        return back();
    }

    // Bann or Unbann user.
    public function deactivateAccount(Request $request)
    {
        $user = User::findOrFail($request->input('id'));
        $user->update(['active' => !(bool) $user->active]);
        return back();
    }
}
