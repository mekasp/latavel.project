@extends('layout')

@section('title', 'Users')

@section('breadcrumbs')
    @include('partial.breadcrumbs', [
        'links' => [
            [
                'link' => '/',
                'name' => 'Posts'
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
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Password</th>
            <th scope="col">Created at</th>
            <th scope="col">Updated at</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        @forelse($users as $user)
            <tr>
                <td>{{ $user['id'] }}</th>
                <td>{{ $user['name'] }}</td>
                <td>{{ $user['email'] }}</td>
                <td>{{ $user['password'] }}</td>
                <td>{{ $user['created_at'] }}</td>
                <td>{{ $user['updated_at'] }}</td>
                <td>
                    <a href="{{ route('user.posts', ['id' => $user->id]) }}">
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
