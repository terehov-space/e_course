<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubjectController extends Controller
{
    public function index(Request $request)
    {
        $items = DB::select('SELECT * FROM subjects');
        $headers = [
            [
                'text' => '№',
                'value' => 'id',
            ],
            [
                'text' => 'Название',
                'value' => 'title',
            ],
        ];

        $response = [
            'items' => $items,
            'headers' => $headers,
            'type' => 'subject',
            'teachers' => Teacher::get(),
        ];

        return view('groups', compact('response'));
    }

    public function create(Request $request)
    {
        $params = $request->post();
        $fist_name = $params['first_name'];
        $last_name = $params['last_name'];
        $middle_name = $params['middle_name'];
        $phone = $params['phone'];
        $email = $params['email'];
        $cafedra_id = 1;
        $sql = "INSERT INTO `subjects` (`first_name`, `last_name`, `middle_name`, `phone`, `email`, `cafedra_id`) VALUES ('$fist_name', '$last_name', '$middle_name', '$phone', '$email', $cafedra_id)";

        DB::insert($sql);
    }

    public function update(Request $request, $id)
    {
        $params = $request->post();
        $fist_name = $params['first_name'];
        $last_name = $params['last_name'];
        $middle_name = $params['middle_name'];
        $phone = $params['phone'];
        $email = $params['email'];
        $cafedra_id = 1;
        $sql = "UPDATE `subjects` SET `first_name` = '$fist_name', `last_name` = '$last_name', `middle_name` = '$middle_name', `phone` = '$phone', `email` = '$email', `cafedra_id` = $cafedra_id WHERE id = $id";

        DB::update($sql);
    }

    public function delete(Request $request, $id)
    {
        $sql = "DELETE FROM `subjects` WHERE `id` = $id";

        DB::delete($sql);
    }
}
