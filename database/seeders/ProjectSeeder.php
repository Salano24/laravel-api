<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use App\Models\Project;
use Faker\Generator as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i <10 ; $i++) { 

            $product = new Project();
            $product->title = $faker->sentence(3);
            $product->slug = Str::slug($product->title);
            $product->description = $faker->text(100);
            $product->save();
        }
    }
}