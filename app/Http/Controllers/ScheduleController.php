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
        $items = DB::select('SELECT sh.id, s.title AS subject, CONCAT(t.first_name, t.last_name) AS teacher, g.title AS `group`, sh.weekday as `day`, `sh`.`time` AS `time` FROM schedules AS sh INNER JOIN subjects AS s ON s.id = sh.subject_id INNER JOIN teachers AS t ON t.id = s.teacher_id INNER JOIN `groups` AS g ON g.id = sh.group_id INNER JOIN cafedras AS c ON c.id = t.cafedra_id');
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
                'value' => 'day',
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
