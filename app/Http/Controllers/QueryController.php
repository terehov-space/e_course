<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QueryController extends Controller
{
    public function page(Request $request)
    {
        return view('query');
    }

    public function casee(Request $request)
    {
        $items = DB::select('
        SELECT c.title, count(g.id) AS cnt,
CASE
	WHEN count(g.id) < 2
    	THEN "Мало"
	WHEN count(g.id) < 5
    	THEN "Нормально"
	ELSE
    	"Много"
END
FROM cafedras AS c INNER JOIN `groups` AS g ON g.cafedra_id = c.id GROUP BY c.id');

        return response()->json([
            'items' => $items,
            'headers' => [
                [
                    'text' => 'Название',
                    'value' => 'title',
                ],
                [
                    'text' => 'Количество',
                    'value' => 'cnt',
                ],
            ],
        ]);
    }

    public function cor(Request $request)
    {
        $items = DB::select('SELECT g.title FROM `groups` AS g WHERE
(SELECT `time` FROM schedules AS s WHERE s.group_id = g.id) > "13:00:00"');

        return response()->json([
            'items' => $items,
            'headers' => [
                [
                    'text' => 'Название',
                    'value' => 'title',
                ],
            ],
        ]);
    }

    public function uncor(Request $request)
    {
        $items = DB::select('
        SELECT g.title, c.title AS c_title FROM `groups` AS g
INNER JOIN cafedras AS c
ON c.id = g.cafedra_id');

        return response()->json([
            'items' => $items,
            'headers' => [
                [
                    'text' => 'Название',
                    'value' => 'title',
                ],
                [
                    'text' => 'Название',
                    'value' => 'c_title',
                ],
            ],
        ]);
    }

    public function select(Request $request)
    {
        $items = DB::select('
        SELECT
(SELECT COUNT(id) FROM `groups`) - (SELECT COUNT(id) FROM cafedras) AS sss');

        return response()->json([
            'items' => $items,
            'headers' => [
                [
                    'text' => 'Название',
                    'value' => 'sss',
                ],
            ],
        ]);
    }

    public function from(Request $request)
    {
        $items = DB::select('
SELECT c.title, s.title AS s_title FROM (
  SELECT id, title, cafedra_id FROM
  subjects
) AS s
INNER JOIN cafedras AS c
ON c.id = s.cafedra_id');

        return response()->json([
            'items' => $items,
            'headers' => [
                [
                    'text' => 'Название',
                    'value' => 'title',
                ],
                [
                    'text' => 'Название',
                    'value' => 's_title',
                ],
            ],
        ]);
    }

    public function having(Request $request)
    {
        $items = DB::select('SELECT c.id, COUNT(g.id) AS cnt
FROM cafedras AS c
INNER JOIN `groups` AS g
ON g.cafedra_id = c.id
GROUP BY c.id
HAVING COUNT(g.id) > 1');

        return response()->json([
            'items' => $items,
            'headers' => [
                [
                    'text' => 'id',
                    'value' => 'id',
                ],
                [
                    'text' => 'Кол-во',
                    'value' => 'cnt',
                ],
            ],
        ]);
    }

    public function any(Request $request)
    {
        $items = DB::select('SELECT su.title
FROM subjects AS su
INNER JOIN schedules AS s ON s.subject_id = su.id
WHERE s.id = ALL
(SELECT id FROM schedules WHERE `time` > "13:00:00")');

        return response()->json([
            'items' => $items,
            'headers' => [
                [
                    'text' => 'название',
                    'value' => 'title',
                ],
            ]
        ]);
    }

}
