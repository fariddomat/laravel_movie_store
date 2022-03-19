<?php

use App\Country;
use Illuminate\Database\Seeder;

class CountriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $countries=['Asia', 'China', 'Egypt', 'Euro', 'France', 'Japan', 'Korea', 'Syria', 'Turkey', 'United States', 'United Kingdom'];
        foreach ($countries as $key => $value) {
            Country::create([
                'name'=>$value,
            ]);
        }
    }
}
