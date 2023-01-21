<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $record = [
            [
                'country_id' => 1,
                'title' => 'Ankara',
                'slug' => 'ankara',
                'status' => 1
            ],
            [
                'country_id' => 1,
                'title' => 'Istanbul',
                'slug' => 'istanbul',
                'status' => 1
            ]
        ];
        City::insert($record);
    }
}
