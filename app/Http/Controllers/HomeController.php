<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $popularFiles = File::select('*')->orderBy('total_download', 'desc')->take(5)->get();
        $latestFiles = File::select('*')->latest()->take(5)->get();

        return view('pages.home.index', compact('popularFiles', 'latestFiles'));
    }
}
