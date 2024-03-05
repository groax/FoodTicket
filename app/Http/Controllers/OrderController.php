<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreArticleInOrderRequest;
use App\Models\Article;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
        return response()->json(Auth::user()->orders()->with('articles')->get(), 200);
    }

    public function show(string $orderId)
    {
        return response()->json(Auth::user()->orders()->with('articles')->findOrFail($orderId), 200);
    }

    public function update(StoreArticleInOrderRequest $request)
    {
        $order = Auth::user()->orders()->where('is_ready_to_order', false)->firstOrCreate();

        $article = Article::findOrFail($request->article_id);
        $order->articles()->updateExistingPivot($article->id, ['quantity' => $request->quantity, 'price' => $article->price]);

        $result = Auth::user()->orders()->with('articles')->findOrFail($order->id);
        return response()->json($result, 200);
    }
    
    // Hier zou het artikel verwijderen moeten komen.
}
