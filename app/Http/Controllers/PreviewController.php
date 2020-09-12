<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PreviewController extends Controller
{
    public function index(Request $request)
    {
        return view('preview');
    }
}
