@extends('layout')

@section('title', 'Category update')

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
    <form action="{{ route('admin.category.update') }}" method="POST">
        @csrf
        <input type="hidden" value="{{ $category['id'] }}" name="id">
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ old('title') ?? $category['title'] }}">
            @if($errors->has('title'))
                @foreach($errors->get('title') as $error)
                    <div class="alert alert-danger" role="alert">
                        {{ $error }}
                    </div>
                @endforeach
            @endif
        </div>
        <div class="mb-3">
            <label for="slug" class="form-label">Body</label>
            <input type="text" class="form-control" id="slug" name="slug" value="{{ old('slug') ?? $category['slug'] }}">
            @if($errors->has('slug'))
                @foreach($errors->get('slug') as $error)
                    <div class="alert alert-danger" role="alert">
                        {{ $error }}
                    </div>
                @endforeach
            @endif
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
