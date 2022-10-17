<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController
{
    private $validationRules = [
        'title' => ['required', 'min:3'],
        'slug' => ['required', 'min:3'],
    ];

    public function index()
    {
        $tags = Tag::paginate(5);

        return view('admin/tags/index', [
            'title' => 'Tags',
            'tags' => $tags
        ]);
    }

    public function create()
    {
        $tag = new Tag();

        return view('admin/tags/form', [
            'title' => 'Tag create',
            'tag' => $tag
        ]);
    }

    public function store(Request $request)
    {
        $request->validate($this->validationRules);

        Tag::create($request->all());

        return redirect()->route('admin.tags');
    }

    public function edit($id)
    {
        $tag = Tag::find($id);

        return view('admin/tags/form-edit', [
            'title' => 'Tag update',
            'tag' => $tag
        ]);
    }

    public function update(Request $request)
    {
        $request->validate($this->validationRules);

        $tag = Tag::find($request->input('id'));
        $tag->update($request->all());

        return redirect()->route('admin.tags');
    }

    public function destroy($id)
    {
        $tag = Tag::find($id);
        $tag->posts()->detach();
        $tag->delete();

        return redirect()->route('admin.tags');
    }
}

