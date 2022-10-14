<?php


namespace App\Http\Controllers;

use App\Models\Tag;

class TagController
{
    public function index()
    {
        $tags = Tag::all();

        return view('tags/index', [
            'title' => 'Tags',
            'tags' => $tags
        ]);
    }

    public function posts($id)
    {
        $tag = Tag::find($id);
        $posts = $tag->posts()->get();

        return view('tags/posts', [
            'title' => 'Tag Posts',
            'posts' => $posts
        ]);
    }
}

