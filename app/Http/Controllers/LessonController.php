<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Lesson;
use Carbon\Carbon;
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

    public function index(Request $request)
    {
        if ($request->isMethod('post')) {
            $now = new Carbon();
            $from = new Carbon($request->input('from', $now->toDateString()));
            $to = new Carbon($request->input('to', $now->toDateString()));
            $lessons = \App\Lesson::where('given_at', '>=', $from->startOfDay()->toDateTimeString())
                ->where('given_at', '<=', $to->endOfDay()->toDateTimeString())
                ->get();
        } else {
            $lessons = \App\Lesson::get();
        }
        return view('lesson.index')->with([
            'lessons' => $lessons,
        ]);
    }
}
