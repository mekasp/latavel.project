@extends('layout')

@section('title', 'Post create')

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
    <form action="{{ route('admin.post.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}">
            @if($errors->has('title'))
                @foreach($errors->get('title') as $error)
                    <div class="alert alert-danger" role="alert">
                        {{ $error }}
                    </div>
                @endforeach
            @endif
        </div>
        <div class="mb-3">
            <label for="body" class="form-label">Body</label>
            <input type="text" class="form-control" id="body" name="body" value="{{ old('body') }}">
            @if($errors->has('body'))
                @foreach($errors->get('body') as $error)
                    <div class="alert alert-danger" role="alert">
                        {{ $error }}
                    </div>
                @endforeach
            @endif
        </div>
        <div class="mb-3">
            <label for="category_id" class="form-label">Category</label>
            <select class="form-select" name="category_id" id="category_id">
                @foreach($categories as $category)
                    <option value="{{ $category['id'] }}" @if( $category['id'] == old('category_id')) selected @endif>{{ $category['title'] }}</option>
                @endforeach
            </select>
            @if($errors->has('category_id'))
                @foreach($errors->get('category_id') as $error)
                    <div class="alert alert-danger" role="alert">
                        {{ $error }}
                    </div>
                @endforeach
            @endif
        </div>
        <div class="mb-3">
            <label for="tag_id" class="form-label">Tag</label>
            <select class="form-select" multiple name="tag_id[]" id="tag_id">
                @foreach($tags as $tag)
                    <option value="{{ $tag['id'] }}"
                        @if(!empty(old('tag_id')))
                            @foreach(old('tag_id') as $tag_id)
                                @if( $tag['id'] == $tag_id) selected @endif
                            @endforeach
                        @endif
                    >{{ $tag['title'] }}</option>
                @endforeach
            </select>
            @if($errors->has('tag_id'))
                @foreach($errors->get('tag_id') as $error)
                    <div class="alert alert-danger" role="alert">
                        {{ $error }}
                    </div>
                @endforeach
            @endif
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
