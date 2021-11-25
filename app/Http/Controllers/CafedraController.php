<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CafedraController extends Controller
{
    public function index(Request $request)
    {
        $items = DB::select('SELECT * FROM cafedras');
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
            'type' => 'cafedra',
        ];

        return view('cafedras', compact('response'));
    }

    public function create(Request $request)
    {

    }

    public function update(Request $request, $id)
    {

    }

    public function delete(Request $request, $id)
    {

    }
}
