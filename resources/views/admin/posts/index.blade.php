@extends('layout')

@section('title', 'Posts')

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
    @can('create', \App\Models\Post::class)
        <a href="{{ route('admin.post.create') }}" class="btn btn-primary">Create</a>
    @endcan
    <table class="table table-striped table-sm">
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
            <th scope="col">Actions</th>
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
                    @can('view', $post)
                        <a class="btn btn-danger" href="{{ route('admin.post.show', $post['id']) }}">Show</a>
                    @endcan
                </td>
                <td>
                    @can('update', $post)
                        <a class="btn btn-warning" href="{{ route('admin.post.edit', $post['id']) }}">Update</a>
                    @endcan
                </td>
                <td>
                    @can('delete', $post)
                    <a class="btn btn-danger" href="{{ route('admin.post.destroy', $post['id']) }}">Delete</a>
                    @endcan
                </td>
            </tr>
        @empty
            <p>Empty</p>
        @endforelse
        </tbody>
        <nav>
            <ul class="pagination mt-3">
                @if ($posts->currentPage() !== 1)
                    <li class="page-item"><a class="page-link" href="{{ $posts->previousPageUrl() }}">Previous</a></li>
                @endif
                @if ($posts->currentPage() !== $posts->lastPage())
                    <li class="page-item"><a class="page-link" href="{{ $posts->nextPageUrl() }}">Next</a></li>
                @endif
            </ul>
        </nav>
    </table>
@endsection
