@extends('layout')

@section('title', 'Categories')

@section('breadcrumbs')
    @include('partial.breadcrumbs', [
        'links' => [
            [
                'link' => '/admin',
                'name' => 'Home'
            ],
            [
                'link' => '/admin/post',
                'name' => 'Posts'
            ],
            [
                'link' => '/admin/tag',
                'name' => 'Tags'
            ]
        ]
    ])
@endsection

@section('content')
    <h1>{{ $title }}</h1>
    <a href="{{ route('admin.category.create') }}" class="btn btn-primary">Create</a>
    <table class="table table-striped table-sm">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Title</th>
            <th scope="col">Slug</th>
            <th scope="col">Created at</th>
            <th scope="col">Updated at</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
        @forelse($categories as $category)
            <tr>
                <td>{{ $category['id'] }}</th>
                <td>{{ $category['title'] }}</td>
                <td>{{ $category['slug'] }}</td>
                <td>{{ $category['created_at'] }}</td>
                <td>{{ $category['updated_at'] }}</td>
                <td><a class="btn btn-warning" href="{{ route('admin.category.edit', $category['id']) }}">Update</a></td>
                <td><a class="btn btn-danger" href="{{ route('admin.category.destroy', $category['id']) }}">Delete</a></td>
            </tr>
        @empty
            <p>Empty</p>
        @endforelse
        </tbody>
        <nav>
            <ul class="pagination mt-3">
                @if ($categories->currentPage() !== 1)
                    <li class="page-item"><a class="page-link" href="{{ $categories->previousPageUrl() }}">Previous</a></li>
                @endif
                @if ($categories->currentPage() !== $categories->lastPage())
                    <li class="page-item"><a class="page-link" href="{{ $categories->nextPageUrl() }}">Next</a></li>
                @endif
            </ul>
        </nav>
    </table>
@endsection
