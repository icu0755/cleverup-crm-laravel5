<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Lesson;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    public function store()
    {
        try {
            $id = Lesson::create(\Input::all());
        } catch (QueryException $e) {
            $content = json_encode([
                'status' => 'error',
                'code' => $e->getCode(),
                'message' => $e->getMessage(),
            ]);

            return response($content, '500');
        }

        return json_encode([
            'status' => 'success',
            'id' => $id,
        ]);
    }
}
