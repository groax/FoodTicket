<?php

namespace App\Models;

use App\Casts\ImageURL;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'description',
        'price',
        'image',
    ];

    protected $casts = [
        'price' => 'float',
        'image' => ImageURL::class,
    ];

    public function order()
    {
        return $this->belongsToMany(Order::class, 'order_articles')
            ->using(OrderArticlePivot::class)
            ->withPivot(['quantity', 'price']);
    }
}
