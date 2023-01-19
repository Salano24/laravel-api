<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = ['Programming', 'Laravel', 'Vuejs', 'front-end', 'back-end', 'full-stack'];

        foreach ($types as $type) {
            $newtype = new Type();
            $newtype->name = $type;
            $newtype->slug = Str::slug($newtype->name);
            $newtype->save();
        }
    }
}