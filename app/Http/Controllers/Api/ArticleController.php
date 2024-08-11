<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller {

    /**
     * Display a listing of the resource.
     */
    public function index() {
        return response()->json(Article::all(), 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
        ]);

        $article = Article::create([
            'title' => $request->title,
            'body' => $request->body,
            'user_id' => Auth::id(),
        ]);

        return response()->json($article, 201);
    }

    public function show(Article $article) {
        return response()->json($article, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article) {
        $this->authorize('update', $article);

        $request->validate([
            'title' => 'sometimes|required|string|max:255',
            'body' => 'sometimes|required|string',
        ]);

        $article->update($request->only(['title', 'body']));

        return response()->json($article, 200);
    }

    public function destroy(Article $article) {
        $this->authorize('delete', $article);

        $article->delete();

        return response()->json(null, 204);
    }
}
