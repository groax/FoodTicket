<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'address',
        'total_price',
        'is_ready_to_order',
        'is_paid',
        'is_delivered',
    ];

    protected $casts = [
        'is_ready_to_order' => 'boolean',
        'is_paid' => 'boolean',
        'is_delivered' => 'boolean',
        'total_price' => 'float',
    ];

    public function totalPrice()
    {
        return $this->articles->sum(fn($article) => $article->pivot->quantity * $article->price);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function articles()
    {
        return $this->belongsToMany(Article::class, 'order_articles')
            ->using(OrderArticlePivot::class)
            ->withPivot(['quantity', 'price']);
    }
}
