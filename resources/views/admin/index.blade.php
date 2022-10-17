@extends('layout')

@section('title', 'Home page')

@section('breadcrumbs')
    @include('partial.breadcrumbs', [
        'links' => [
            [
                'link' => '/admin/post',
                'name' => 'Posts'
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
        <a href="{{ route('auth.logout') }}" class="btn btn-primary" >Logout</a>
@endsection
