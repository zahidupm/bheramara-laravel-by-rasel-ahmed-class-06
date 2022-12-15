<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function add(Request $request) {
        return $request->title;
    }
}
