<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index()
    {
        $user = auth()->user();
        return view('posts.index', ['items' => Post::all()]);
    }

    public function create()
    {
        return view('posts.create', [
            'pageTitle' => 'Nova Postagem',
        ]);
    }

    public function store(Request $request)
    {
        $attributes = $request->all();
        $attributes['user_id'] = auth()->id();
        Post::create($attributes);
        return redirect(route('posts.index'));
    }

    public function show(Post $post)
    {
        return view('posts.show', [
            'post' => $post,
            'pageTitle' => 'Exibir Postagem',
        ]);
    }

    public function edit(Post $post)
    {
        return view('posts.edit', [
            'pageTitle' => 'Editar Postagem',
            'post' => $post,
        ]);
    }

    public function update(Request $request, Post $post)
    {
        $attributes = $request->all();
        $post->update($attributes);
        return redirect(route('posts.index'));
    }

    public function destroy(Post $post)
    {
        $err = $post->deleteOrFail();
        if($err) {
            return redirect(route('posts.index'));
        }
    }
}
