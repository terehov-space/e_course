<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Schedule as ScheduleModel;

class Schedule extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ScheduleModel::create([
            'group_id' => 1,
            'subject_id' => 1,
            'weekday' => 1,
            'time' => '14:00',
        ]);
    }
}
