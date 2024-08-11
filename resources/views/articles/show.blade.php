@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $article->title }}</h1>

        <p>{{ $article->body }}</p>

        <p>Author: {{ $article->user->name }}</p>
        <p>Created on: {{ $article->created_at->format('F d, Y') }}</p>

        @if (Auth::check() && Auth::id() === $article->user_id)
            <a href="{{ route('articles.edit', $article->id) }}" class="btn btn-primary">Edit</a>
            <form action="{{ route('articles.destroy', $article->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        @endif

        <a href="{{ route('articles.index') }}" class="btn btn-secondary">Back to Articles</a>
    </div>
@endsection
