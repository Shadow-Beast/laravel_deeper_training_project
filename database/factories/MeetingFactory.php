<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Category;
use App\Models\MeetingType;
use Illuminate\Database\Eloquent\Factories\Factory;

class MeetingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [            
            'title' => $this->faker->sentence(),
            'description' => $this->faker->paragraph(5),
            'start_at' => now()->addDays(rand(1,100))->addHours(rand(0,24)),
            'duration' => $this->faker->time($format = 'H:i:s'),
            'url' => 'https://picsum.photos/1920/1080',
            'is_published' => 1,
            'meeting_id' => $this->faker->numerify('##########'),
            'meeting_password' => $this->faker->bothify('##??#?'),
            'meeting_type_id' => MeetingType::inRandomOrder()->first(),
            'category_id' => Category::inRandomOrder()->first(),
            'user_id' => User::inRandomOrder()->first(),
            'created_at' => $this->faker->randomElement([
                now()->subDays(rand(1,60)),
                now()->subHours(rand(1,23)),
                now()->subMinutes(rand(1,60))
            ]),
        ];
    }
}
