@extends('layout')

@section('title', 'Category show')

@section('breadcrumbs')
    @include('partial.breadcrumbs', [
        'links' => [
            [
                'link' => '/admin',
                'name' => 'Home'
            ],
            [
                'link' => '/admin/tag',
                'name' => 'Tags'
            ],
            [
                'link' => '/admin/category',
                'name' => 'Category'
            ],
        ]
    ])
@endsection

@section('content')
    <h1>{{ $title }}</h1>
    <ul>
        <li>Title: {{ $category['title'] }}</li>
        <li>Slug: {{ $category['slug'] }}</li>
        <li>Created: {{ $category['created_at'] }}</li>
        <li>Updated: {{ $category['updated_at'] }}</li>
    </ul>
    <hr>
    <div>
        <p>Comments</p>
        <ul>
            @foreach($category->comments as $comment)
                <li>{{ $comment->body }}</li>
            @endforeach
        </ul>
    </div>
    <div>
        <h5>Add comment</h5>
        <form action="{{ route('add.comment', ['id' => $category['id']]) }}" method="post">
            @csrf
            <input type="hidden" value="category" name="type">
            <div class="mb-3">
                <label for="body" class="form-label">Comment</label>
                <input type="text" class="form-control" id="body" name="body">
                @if($errors->has('body'))
                    @foreach($errors->get('body') as $error)
                        <div class="alert alert-danger" role="alert">
                            {{ $error }}
                        </div>
                    @endforeach
                @endif
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
