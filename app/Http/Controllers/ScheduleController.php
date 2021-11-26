<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ScheduleController extends Controller
{
    public function index(Request $request)
    {
        $items = DB::select('SELECT * FROM final_schedule');
        $headers = [
            [
                'text' => '№',
                'value' => 'id',
            ],
            [
                'text' => 'Предмет',
                'value' => 'subject',
            ],
            [
                'text' => 'Преподаватель',
                'value' => 'teacher',
            ],
            [
                'text' => 'Группа',
                'value' => 'group',
            ],
            [
                'text' => 'День',
                'value' => 'weekday',
            ],
            [
                'text' => 'Время',
                'value' => 'time',
            ],
        ];

        $response = [
            'items' => $items,
            'headers' => $headers,
            'type' => 'schedule',
            'subjects' => Subject::get(),
            'groups' => Group::get(),
        ];

        return view('schedules', compact('response'));
    }

    public function create(Request $request)
    {
        $params = $request->post();
        $weekday = $params['weekday'];
        $time = $params['time'];
        $group = $params['group_id'];
        $subject = $params['subject_id'];
        $sql = "INSERT INTO `schedules` (`weekday`, `time`, `group_id`, `subject_id`) VALUES ('$weekday', '$time', $group, $subject)";

        DB::insert($sql);
    }

    public function update(Request $request, $id)
    {
        $params = $request->post();
        $title = $params['title'];
        $code = $params['code'];
        $cafedra_id = 1;
        $sql = "UPDATE `schedules` SET `title` = '$title', `code` = '$code', `cafedra_id` = '$cafedra_id, `cafedra_id` = $cafedra_id WHERE id = $id";

        DB::update($sql);
    }

    public function delete(Request $request, $id)
    {
        $sql = "DELETE FROM `schedules` WHERE `id` = $id";

        DB::delete($sql);
    }
}
