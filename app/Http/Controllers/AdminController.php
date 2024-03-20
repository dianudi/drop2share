<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        $disktotal = disk_total_space('/');
        $diskfree  = disk_free_space('/');
        $diskuse   = round(100 - (($diskfree / $disktotal) * 100));
        return view('pages.admin.index', compact('disktotal', 'diskfree', 'diskuse'));
    }

    public function indexFile(Request $request)
    {
        $files = $request->query('q') ? File::where('name', 'like', '%' . $request->query('q') . '%')->paginate(15) : File::latest()->paginate(15);
        $totalFiles = File::count();
        $totalDownloaded = File::sum('total_download');
        $totalSizes = File::sum('size');
        $q = $request->query('q') ? $request->query('q') : null;
        return view('pages.admin.files', compact('files', 'totalFiles', 'totalDownloaded', 'totalSizes', 'q'));
    }

    public function detailFile(File $file)
    {
        return view('pages.admin.file', compact('file'));
    }
    public function indexAccount()
    {
        $users = User::whereNot('id', Auth::user()->id)->paginate(15);
        return view('pages.admin.accounts', compact('users'));
    }

    public function indexPage()
    {
        return view('pages.admin.pages');
    }
}
