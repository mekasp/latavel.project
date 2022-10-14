@extends('layout')

@section('title', 'Posts')

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
            <th scope="col">Slug</th>
            <th scope="col">Created at</th>
            <th scope="col">Updated at</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @forelse($tags as $tag)
            <tr>
                <td>{{ $tag['id'] }}</th>
                <td>{{ $tag['title'] }}</td>
                <td>{{ $tag['slug'] }}</td>
                <td>{{ $tag['created_at'] }}</td>
                <td>{{ $tag['updated_at'] }}</td>
                <td>
                    <a class="btn btn-primary" href="tag/{{ $tag->id }}" >
                        Posts
                    </a>
                </td>
            </tr>
        @empty
            <p>Empty</p>
        @endforelse
        </tbody>
    </table>
@endsection
