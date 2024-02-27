<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;
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
        $files = File::select('*')->where('name', 'like', '%' . $request->query('q') . '%')->get();
        return $files;
    }

    public function showDetailFile(File $file)
    {
        return $file;
    }

    public function downloadFile(File $file)
    {
        return Storage::download($file->storage_path, $file->name);
    }
}
