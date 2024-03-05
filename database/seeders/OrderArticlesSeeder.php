<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Order;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderArticlesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (Order::all() as $order) {
            $articles = Article::factory()->count(random_int(1, 3))->make();
            $articles->each(fn($article) => $order->articles()->save($article, ['quantity' => random_int(1, 3), 'price' => $article->price]));
        }
    }
}
