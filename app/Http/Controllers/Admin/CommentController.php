<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    private $validationRules = [
        'body' => ['required', 'min:5']
    ];

    public function store(Request $request, $id)
    {
        $request->validate($this->validationRules);

        if ($request['type'] == 'post') {
            $post = Post::find($id);
            $comment = new Comment();
            $comment->body = $request->input('body');
            $post->comments()->save($comment);
            return redirect()->route('admin.post.show', ['id' => $post['id']]);
        }

        if ($request['type'] == 'category') {
            $category = Category::find($id);
            $comment = new Comment();
            $comment->body = $request->input('body');
            $category->comments()->save($comment);
            return redirect()->route('admin.category.show', ['id' => $category['id']]);
        }
    }
}

