@extends('layout')

@section('title', 'Categories')

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
        @forelse($categories as $category)
            <tr>
                <td>{{ $category['id'] }}</th>
                <td>{{ $category['title'] }}</td>
                <td>{{ $category['slug']}}</td>
                <td>{{ $category['created_at'] }}</td>
                <td>{{ $category['updated_at'] }}</td>
                <td>
                    <a href="category/{{ $category->id }}">
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
