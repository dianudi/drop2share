<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;

class VisitorPageController extends Controller
{
    public function show(Page $page)
    {
        return $page;
    }
}
