<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CookiePageController extends Controller
{
    public function index()
    {
        return view('cookie.index');
    }

    public function success()
    {
        return view('cookie.success');
    }

    public function failed()
    {
        return view('cookie.failed');
    }

    public function update(Request $request)
    {
        return view('cookie.update');
    }
}
