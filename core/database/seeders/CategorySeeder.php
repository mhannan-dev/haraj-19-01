<?php
namespace Database\Seeders;
use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categoryRecord = [
            [
                'parent_id' => 0,
                'title' => 'Mobile Phones',
                'slug' => 'mobile-phones',
                'bg_color' => '#a3ce71	',
                'status' => 1
            ],
            [
                'parent_id' => 0,
                'title' => 'Electronics',
                'bg_color' => '#a3ce71	',
                'slug' => 'electronics',
                'status' => 1
            ]
        ];
        Category::insert($categoryRecord);
    }
}
