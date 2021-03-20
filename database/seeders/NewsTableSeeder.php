<?php

namespace Database\Seeders;

use App\Models\News;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\URL;

class NewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      // Let's truncate our existing records to start from scratch.
      News::truncate();

      $faker = \Faker\Factory::create();

      // And now, let's create a few articles in our database:
      for ($i = 0; $i < 10; $i++) {
        News::create([
              'title' => $faker->sentence,
              'summary' => $faker->sentence,
              'content' => $faker->paragraph,
              'imagePath' => '/img/exclamation_mark.png'
          ]);
      }
  }
}
