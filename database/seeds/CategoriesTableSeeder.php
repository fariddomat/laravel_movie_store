<?php

use App\Category;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories=['action','adventure', 'animation', 'Comedy', 'Crime', 'documentary','drama','fantasy','family', 'history', 'horror', 'Musical','romance', 'sport', 'war'];
        foreach ($categories as $key => $value) {
            Category::create([
                'name'=>$value,
            ]);
        }
    }
}
