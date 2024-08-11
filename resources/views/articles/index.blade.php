@extends('layouts.app')

@section('content')
<div>
    <a href="{{ route('articles.create') }}">Crete new Article</a>
    @foreach($articles as $article)

    <div class="container">
        <div class="h1 mt-5"><a href="{{ route('articles.show', $article->id) }}" class="">{{ $article->title }}</a></div>
        <div>{{ $article->body }}</div>
        <div>{{ $article->author }}</div>
        @if(Auth::id() === $article->user_id)
            <a href="{{ route('articles.edit', $article->id) }}" class="">Edit</a>
            <form action="{{ route('articles.destroy', $article->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
            </form>
        @endif
    </div>

    @endforeach
</div>
@endsection
