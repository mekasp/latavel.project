@extends('layout')

@section('title', 'User posts')

@section('breadcrumbs')
    @include('partial.breadcrumbs', [
        'links' => [
            [
                'link' => '/',
                'name' => 'Posts'
            ],
            [
                'link' => '/user',
                'name' => 'Users'
            ],
            [
                'link' => '/tag',
                'name' => 'Tags'
            ],
            [
                'link' => '/category',
                'name' => 'Categories'
            ],
        ]
    ])
@endsection

@section('content')
    <h1>{{ $title }}</h1>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Title</th>
            <th scope="col">User</th>
            <th scope="col">Category</th>
            <th scope="col">Tags</th>
            <th scope="col">Body</th>
            <th scope="col">Created at</th>
            <th scope="col">Updated at</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @forelse($posts as $post)
            <tr>
                <td>{{ $post['id'] }}</th>
                <td>{{ $post['title'] }}</td>
                <td>{{ $post->user->name }}</td>
                <td>{{ $post->category->title }}</td>
                <td>{{ $post->tags->pluck('title')->join(', ') }}</td>
                <td>{{ $post['body'] }}</td>
                <td>{{ $post['created_at'] }}</td>
                <td>{{ $post['updated_at'] }}</td>
                <td>
                    <a href="{{ route('user.category.posts', ['user_id' => $post->user->id,'category_id' => $post->category->id]) }}">
                        Categories
                    </a>
                </td>
            </tr>
        @empty
            <p>Empty</p>
        @endforelse
        </tbody>
    </table>
@endsection
