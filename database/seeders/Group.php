<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Group as GroupModel;

class Group extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        GroupModel::create([
            'title' => 'К1-1',
            'code' => 'k1-1',
            'cafedra_id' => 1,
        ]);
        GroupModel::create([
            'title' => 'К1-2',
            'code' => 'k1-2',
            'cafedra_id' => 1,
        ]);
        GroupModel::create([
            'title' => 'К2-1',
            'code' => 'k2-1',
            'cafedra_id' => 2,
        ]);
        GroupModel::create([
            'title' => 'К2-2',
            'code' => 'k2-21',
            'cafedra_id' => 2,
        ]);
    }
}
