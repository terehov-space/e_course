<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(Cafedra::class);
        $this->call(Teacher::class);
        $this->call(Subject::class);
        $this->call(Group::class);
        $this->call(Schedule::class);
    }
}
