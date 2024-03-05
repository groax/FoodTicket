<?php

namespace App\Models;

use App\Events\OrderArticlesUpdated;
use Illuminate\Database\Eloquent\Relations\Pivot;

class OrderArticlePivot extends Pivot
{
    protected static function boot()
    {
        parent::boot();

        static::created(function ($pivot) {
            event(new OrderArticlesUpdated(Order::find($pivot->order_id)));
        });

        static::updated(function ($pivot) {
            event(new OrderArticlesUpdated(Order::find($pivot->order_id)));
        });

        static::deleted(function ($pivot) {
            event(new OrderArticlesUpdated(Order::find($pivot->order_id)));
        });
    }
}
