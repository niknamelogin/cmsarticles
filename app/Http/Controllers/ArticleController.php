<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller {
    public function index() {
        $articles = Article::all();
        return view('articles.index', compact('articles'));
    }
    public function create() {
        return view('articles.create');
    }

    public function store(Request $request) {
        $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
        ]);

        Auth::user()->articles()->create($request->all());

        return redirect()->route('articles.index');
    }

    public function edit(Article $article) {
        return view('articles.edit', compact('article'));
    }

    public function update(Request $request, Article $article) {
        $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
        ]);

        $article->update($request->all());

        return redirect()->route('articles.index');
    }

    public function destroy(Article $article) {
        $article->delete();

        return redirect()->route('articles.index');
    }

    public function show(Article $article) {
        return view('articles.show', compact('article'));
    }

}
