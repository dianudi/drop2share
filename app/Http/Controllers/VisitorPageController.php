<?php

namespace App\Http\Controllers;

use App\Models\Page;

class VisitorPageController extends Controller
{
    public function show(Page $page)
    {
        return view('pages.home.page', compact('page'));
    }
}
