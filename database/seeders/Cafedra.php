<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cafedra as CafedraModel;

class Cafedra extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CafedraModel::create([
            'title' => 'Какая-то каферда 1',
            'code' => 'one-cafedra',
        ]);

        CafedraModel::create([
            'title' => 'Другая кафедра 2',
            'code' => 'another-cafedra',
        ]);
    }
}
