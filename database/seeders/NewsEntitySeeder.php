<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class NewsEntitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $now = Carbon::now()->toDateTimeString();

        for($i = 0; $i <= 9; $i++) {
            DB::table('news_entities')->insert([
                'title' => $faker->text(15),
                'description' => $faker->text(50),
                'body' => $faker->text(1000),
                'image' => $faker->imageUrl(),
                'publication_date' => $faker->dateTime(),
                'is_published' => $faker->boolean(),
                'created_at' => $now,
                'updated_at' => $now,
            ]);
        }
    }
}
