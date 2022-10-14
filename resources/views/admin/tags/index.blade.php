@extends('layout')

@section('title', 'Tags')

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
                'link' => '/admin/category',
                'name' => 'Category'
            ],
        ]
    ])
@endsection

@section('content')
    <h1>{{ $title }}</h1>
    <a href="{{ route('admin.tag.create') }}" class="btn btn-primary">Create</a>
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
        @forelse($tags as $tag)
            <tr>
                <td>{{ $tag['id'] }}</th>
                <td>{{ $tag['title'] }}</td>
                <td>{{ $tag['slug'] }}</td>
                <td>{{ $tag['created_at'] }}</td>
                <td>{{ $tag['updated_at'] }}</td>
                <td><a class="btn btn-warning" href="{{ route('admin.tag.edit', $tag['id']) }}">Update</a></td>
                <td><a class="btn btn-danger" href="{{ route('admin.tag.destroy', $tag['id']) }}">Delete</a></td>
            </tr>
        @empty
            <p>Empty</p>
        @endforelse
        </tbody>
        <nav>
            <ul class="pagination mt-3">
                @if ($tags->currentPage() !== 1)
                    <li class="page-item"><a class="page-link" href="{{ $tags->previousPageUrl() }}">Previous</a></li>
                @endif
                @if ($tags->currentPage() !== $tags->lastPage())
                    <li class="page-item"><a class="page-link" href="{{ $tags->nextPageUrl() }}">Next</a></li>
                @endif
            </ul>
        </nav>
    </table>
@endsection
