<?php

namespace Tests\Unit;

use App\Models\NewsEntity;
use Database\Seeders\NewsEntitySeeder;
use Tests\TestCase;

class NewsEntitiesTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_get_paginated_news()
    {
        $response = $this->get('api/news');
        $response->assertStatus(200);
        $response->assertJsonCount(2);
    }

    public function test_if_news_can_be_added()
    {
        $initialNumberOfNews = NewsEntity::all()->count();
        $this->seed(NewsEntitySeeder::class);
        $this->assertDatabaseCount('news_entities',$initialNumberOfNews + 10);
    }

    public function test_if_show_news_method_ok()
    {
        $response = $this->get('api/news/1');
        $response->assertStatus(200);
        $response->assertJsonCount(2);
    }
}
