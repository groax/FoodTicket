<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Article::get(['id', 'name', 'description', 'image', 'price']), 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $articleId)
    {
        return response()->json(Article::select(['id', 'name', 'description', 'image', 'price'])->findOrFail($articleId), 200);
    }
}
