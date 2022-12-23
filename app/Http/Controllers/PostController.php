<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Flasher\Prime\FlasherInterface;
use Illuminate\Support\Facades\Auth;
use App\Notifications\PostCreated;

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

        $user = Auth::user();
        $user->notify(new PostCreated($post));

        $flasher->addSuccess("Post added successfully");

        return redirect()->route('dashboard');
    }

    public function index() {
        return view('posts');
    }

    public function edit($id, FlasherInterface $flasher) {
        $post = Post::find($id);

        if(empty($post)){
            $flasher->addError('Post not found');
            return redirect()->route('dashboard');
        }

        return view('edit-post', [
            'post' => $post,
        ]);
    }

    public function update($id, Request $request, FlasherInterface $flasher) {
        $post = POST::findOrFail($id);

        $request->validate([
            'title' => 'required',
            'content' => 'required'
        ]);

        $post->title = $request->title;
        $post->content = $request->content;
        $post->save();

        $flasher->addSuccess('Post updated successfully');

        return redirect()->route('dashboard');
    }

    public function delete($id, FlasherInterface $flasher) {
        $post = Post::findOrFail($id);
        $post->delete();

        $flasher->addSuccess('Post deleted successfully');
        return redirect()->route('dashboard');
    }


}
