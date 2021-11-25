<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Subject as SubjectModel;

class Subject extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SubjectModel::create([
            'title' => 'Предмет',
            'cafedra_id' => 1,
            'teacher_id' => 1,
        ]);
        SubjectModel::create([
            'title' => 'Предметыч',
            'cafedra_id' => 1,
            'teacher_id' => 2,
        ]);
        SubjectModel::create([
            'title' => 'Предметович',
            'cafedra_id' => 1,
            'teacher_id' => 2,
        ]);
        SubjectModel::create([
            'title' => 'Кафедра',
            'cafedra_id' => 2,
            'teacher_id' => 3,
        ]);
        SubjectModel::create([
            'title' => 'Кафедрыч',
            'cafedra_id' => 2,
            'teacher_id' => 3,
        ]);
        SubjectModel::create([
            'title' => 'Кафедрович',
            'cafedra_id' => 2,
            'teacher_id' => 4,
        ]);
    }
}
