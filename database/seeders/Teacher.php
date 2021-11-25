<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Teacher as TeacherModel;

class Teacher extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TeacherModel::create([
            'first_name' => 'Препод',
            'last_name' => 'Преподов',
            'middle_name' => 'Преподович',
            'email' => 'prepodov@inst.ru',
            'phone' => '+79995051320',
            'cafedra_id' => 1,
        ]);
        TeacherModel::create([
            'first_name' => 'Препод#1',
            'last_name' => 'Преподов#1',
            'middle_name' => 'Преподович#1',
            'email' => 'prepodov1@inst.ru',
            'phone' => '+79995051321',
            'cafedra_id' => 1,
        ]);

        TeacherModel::create([
            'first_name' => 'Кафедр',
            'last_name' => 'Кафедров',
            'middle_name' => 'Кафедрович',
            'email' => 'kafedrov@inst.ru',
            'phone' => '+79991505320',
            'cafedra_id' => 2,
        ]);

        TeacherModel::create([
            'first_name' => 'Кафедр#2',
            'last_name' => 'Кафедров#2',
            'middle_name' => 'Кафедрович#2',
            'email' => 'kafedrov2@inst.ru',
            'phone' => '+79991505321',
            'cafedra_id' => 2,
        ]);
    }
}
