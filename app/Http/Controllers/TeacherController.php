<?php

namespace App\Http\Controllers;

use App\Models\Cafedra;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TeacherController extends Controller
{
    public function index(Request $request)
    {
        $items = DB::select('SELECT * FROM teachers');
        $headers = [
            [
                'text' => '№',
                'value' => 'id',
            ],
            [
                'text' => 'Фамилия',
                'value' => 'last_name',
            ],
            [
                'text' => 'Имя',
                'value' => 'first_name',
            ],
            [
                'text' => 'Отчество',
                'value' => 'middle_name',
            ],
            [
                'text' => 'Почта',
                'value' => 'email',
            ],
            [
                'text' => 'Телефон',
                'value' => 'phone',
            ],
        ];

        $response = [
            'items' => $items,
            'headers' => $headers,
            'type' => 'teacher',
            'cafedras' => Cafedra::get(),
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
        $cafedra_id = $params['cafedra_id'];
        $sql = "INSERT INTO `teachers` (`first_name`, `last_name`, `middle_name`, `phone`, `email`, `cafedra_id`) VALUES ('$fist_name', '$last_name', '$middle_name', '$phone', '$email', $cafedra_id)";

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
        $sql = "UPDATE `teachers` SET `first_name` = '$fist_name', `last_name` = '$last_name', `middle_name` = '$middle_name', `phone` = '$phone', `email` = '$email', `cafedra_id` = $cafedra_id WHERE id = $id";

        DB::update($sql);
    }

    public function delete(Request $request, $id)
    {
        $sql = "DELETE FROM `teachers` WHERE `id` = $id";

        DB::delete($sql);
    }
}
