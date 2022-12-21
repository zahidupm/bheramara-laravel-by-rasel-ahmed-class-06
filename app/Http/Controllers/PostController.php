<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Flasher\Prime\FlasherInterface;

class PostController extends Controller
{
    public function add(Request $request, FlasherInterface $flasher) {
        $request->validate([
            'title' => 'required',
            'content' => 'required'
        ]);

        $post = new Post();
        $post->title = $request->title;
        $post->date = now();
        $post->content = $request->content;
        $post->save();

        $flasher->addSuccess("Post added successfully");

        return redirect()->route('dashboard');
    }

    public function index() {
        return view('posts');
    }
}
