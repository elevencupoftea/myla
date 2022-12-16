<?php

namespace App\Http\Controllers\Base;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function showIndexPage(Request $request)
    {
        session()->put('redirect_url', $request->path());
        return view('pages.index');
    }
}
