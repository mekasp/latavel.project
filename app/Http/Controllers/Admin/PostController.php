<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    private $validationRules = [
        'title' => ['required', 'min:3'],
        'body' => ['required', 'min:3'],
        'category_id' => ['required', 'exists:categories,id'],
        'tag_id' => ['required', 'exists:tags,id']
    ];

    public function index()
    {
        $posts = Post::with('user', 'category', 'tags')->paginate(5);
        return view('admin/posts/index', [
            'title' => 'Posts',
            'posts' => $posts
        ]);
    }

    public function show($id)
    {
        $post = Post::find($id);
        return view('admin/posts/show', [
            'title' => 'Post',
            'post' => $post
        ]);
    }

    public function create()
    {
        $this->authorize('create', Post::class);
        $post = new Post();
        $users = User::all();
        $categories = Category::all();
        $tags = Tag::all();

        return view('admin/posts/form', [
            'title' => 'Post create',
            'users' => $users,
            'categories' => $categories,
            'tags' => $tags
        ]);
    }

    public function store(Request $request)
    {
        $request->validate($this->validationRules);

        $post = Post::create([
            'user_id' => Auth::id(),
            'category_id' => $request->input('category_id'),
            'title' => $request->input('title'),
            'body' => $request->input('body')
        ]);
        $post->tags()->sync($request->tag_id);

        return redirect()->route('admin.posts');
    }

    public function edit($id)
    {
        $post = Post::find($id);
        $this->authorize('update', $post);
        $users = User::all();
        $categories = Category::all();
        $tags = Tag::all();

        return view('admin/posts/form-edit', [
            'title' => 'Post update',
            'post' => $post,
            'users' => $users,
            'categories' => $categories,
            'tags' => $tags
        ]);
    }

    public function update(Request $request)
    {
        $request->validate($this->validationRules);

        $post = Post::find($request->input('id'));
        $post->update([
            'user_id' => $request->input('user_id'),
            'category_id' => $request->input('category_id'),
            'title' => $request->input('title'),
            'body' => $request->input('body')
        ]);
        $post->tags()->sync($request->tag_id);

        return redirect()->route('admin.posts');
    }

    public function destroy($id)
    {
        $post = Post::find($id);
        $this->authorize('delete', $post);
        $post->tags()->detach();
        $post->delete();

        return redirect()->route('admin.posts');
    }
}

