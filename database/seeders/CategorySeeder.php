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
        $categories = [
            'Other',
            'Team Building',
            'Event',
            'Info-Sharing',
        ];

        $data = [];
        foreach ($categories as $category) {
            $data[] = [
                'name' => $category,
                'created_at' => now(), 
            ];
        }
        Category::insert($data);
    }
}
