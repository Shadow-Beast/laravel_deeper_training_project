<?php

namespace Database\Seeders;

use App\Models\Meeting;
use Illuminate\Database\Seeder;
use Faker\Factory;

class TestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        
        Meeting::factory(20)->create();
    }
}
