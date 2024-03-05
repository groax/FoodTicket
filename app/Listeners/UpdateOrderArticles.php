<?php

namespace App\Listeners;

use App\Events\OrderArticlesUpdated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class UpdateOrderArticles
{
    use InteractsWithQueue;

    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(OrderArticlesUpdated $event): void
    {
        $order = $event->order;
        $order->total_price = $order->totalPrice();
        $order->save();
    }
}
