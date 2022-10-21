@extends('layout')

@section('title', 'Login')

@section('content')
    <h1>{{ $title }}</h1>
    <form action="{{ route('auth.handle.login') }}" method="POST">
        @csrf
        @if($errors->has('email'))
            @foreach($errors->get('email') as $error)
                <div class="alert alert-danger" role="alert">
                    {{ $error }}
                </div>
            @endforeach
        @endif
        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" class="form-control" id="email" name="email">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    <br>
    <a href="{{ $url }}" class="btn btn-primary" >GitHub</a>
@endsection
