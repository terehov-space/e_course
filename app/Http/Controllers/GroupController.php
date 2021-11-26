<?php

namespace App\Http\Controllers;

use App\Models\Cafedra;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GroupController extends Controller
{
    public function index(Request $request)
    {
        $items = DB::select('SELECT * FROM `groups`');
        $headers = [
            [
                'text' => '№',
                'value' => 'id',
            ],
            [
                'text' => 'Название',
                'value' => 'title',
            ],
            [
                'text' => 'Код',
                'value' => 'code',
            ],
        ];

        $response = [
            'items' => $items,
            'headers' => $headers,
            'type' => 'group',
            'cafedras' => Cafedra::get(),
        ];

        return view('groups', compact('response'));
    }

    public function create(Request $request)
    {
        $params = $request->post();
        $title = $params['title'];
        $code = $params['code'];
        $cafedra_id = 1;
        $sql = "INSERT INTO `groups` (`title`, `code`, `cafedra_id`) VALUES ('$title', '$code', $cafedra_id)";

        DB::insert($sql);
    }

    public function update(Request $request, $id)
    {
        $params = $request->post();
        $title = $params['title'];
        $code = $params['code'];
        $cafedra_id = 1;
        $sql = "UPDATE `groups` SET `title` = '$title', `code` = '$code', `cafedra_id` = '$cafedra_id, `cafedra_id` = $cafedra_id WHERE id = $id";

        DB::update($sql);
    }

    public function delete(Request $request, $id)
    {
        $sql = "DELETE FROM `groups` WHERE `id` = $id";

        DB::delete($sql);
    }
}
