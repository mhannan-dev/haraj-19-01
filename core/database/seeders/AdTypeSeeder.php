<?php
namespace Database\Seeders;

use App\Models\AdType;
use Illuminate\Database\Seeder;

class AdTypeSeeder extends Seeder
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
                'title' => 'Paid',
                'slug' => 'paid',
                'status' => 1
            ],
            [
                'title' => 'Non Paid',
                'slug' => 'non-paid',
                'status' => 1
            ]
        ];
        AdType::insert($record);
    }
}
