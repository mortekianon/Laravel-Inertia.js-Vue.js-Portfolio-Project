<?php

namespace Database\Seeders;

use App\Models\News;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create('id_ID');
        for($n=0; $n<=10; $n++){
            News::create([
                'title'=>$faker->sentence,
                'body'=>$faker->paragraph(3),
                'image' => 'https://picsum.photos/seed/' . rand(1, 1000) . '/640/480',
            ]);
        }
    }
}
