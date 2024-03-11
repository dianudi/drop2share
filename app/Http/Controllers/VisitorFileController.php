<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class VisitorFileController extends Controller
{
    public function showPopularFiles()
    {
        $files = File::select('*')->orderBy('total_download', 'desc')->paginate(15);
        $title = 'Popular Files';
        return view('pages.home.files', compact('files', 'title'));
    }

    public function showLatestUploadFiles()
    {
        $files = File::select('*')->latest()->paginate(15);
        $title = 'Latest Upload';
        return view('pages.home.files', compact('files', 'title'));
    }

    public function searchFiles(Request $request)
    {
        $files = File::select('*')->where('name', 'like', '%' . $request->query('q') . '%')->paginate(15);
        $query = $request->query('q');
        return view('pages.home.search', compact('files', 'query'));
    }

    public function showDetailFile(File $file)
    {
        return view('pages.home.file', compact('file'));
    }

    public function unlockDownloadFile(Request $request, File $file)
    {
        $validated = $request->validate(['password' => 'required']);
        if ($validated['password'] !== $file->password) {
            return back()->with('errorUnlockFile', 'Invalid Unlock Password');
        }
        $request->session()->put('fileId', $file->id);
        return back();
    }

    public function downloadFile(Request $request, File $file)
    {
        DB::transaction(function () use ($file) {
            $file->update(['total_download' => $file->total_download + 1]);
        }, 5);
        $request->session()->forget('fileId');
        return Storage::download($file->storage_path, $file->name);
    }

    public function detailUserFiles(User $user)
    {
        return view('pages.home.detailUserFiles', compact('user'));
    }
}
