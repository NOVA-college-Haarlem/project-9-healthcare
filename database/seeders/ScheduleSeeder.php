<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $schedules =
        [
            [
                // 'staff_id'   => '1',
                'date'       => '01-01-1970',
                'start_time' => '09:00',
                'end_time'   => '17:00',
            ]
        ];
            DB::table('schedules')->insert($schedules);
    }
}
