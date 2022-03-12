<?php

namespace Database\Seeders;

use App\Models\MeetingType;
use Illuminate\Database\Seeder;

class MeetingTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $meetingTypes = [
            'Zoom',
            'Google Meeting',
        ];

        $data = [];
        foreach ($meetingTypes as $meetingType) {
            $data[] = [
                'name' => $meetingType,
                'created_at' => now(), 
            ];
        }
        MeetingType::insert($data);
    }
}
