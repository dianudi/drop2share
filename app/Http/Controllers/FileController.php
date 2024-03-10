<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFileRequest;
use App\Http\Requests\UpdateFileRequest;
use App\Models\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Sqids\Sqids;
use Illuminate\Support\Str;

class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $context = DB::table('files')->selectRaw('count(id) as total_files, sum(size) as total_size, sum(total_download) as total_download')->first();
        $files = File::where('user_id', Auth::user()->id)->latest()->paginate(15);
        return view('pages.files.index', compact('files', 'context'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.files.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFileRequest $request)
    {
        $sqids = new Sqids(minLength: 8);
        $file = new File($request->validated());
        $file->user_id = Auth::user()->id;
        $file->slug = $sqids->encode([Auth::user()->id, Str::length($request->input('name')), random_int(1, 9000)]);
        $file->storage_path = $request->file('file')->store('files');
        $file->size = $request->file('file')->getSize();
        $file->save();
        return to_route('my-files.index')->with('status', 'File uploaded');
    }

    /**
     * Display the specified resource.
     */
    public function show(File $file)
    {
        return view('pages.home.file', compact('file'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(File $file)
    {
        if (Storage::exists($file->storage_path)) Storage::delete($file->storage_path);
        $file->delete();
        return back();
    }
}
