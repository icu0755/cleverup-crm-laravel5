<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Lesson;
use Carbon\Carbon;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    public function index(Request $request)
    {
        $now = new Carbon();
        if ($request->isMethod('post')) {
            $from = new Carbon($request->input('from', $now->toDateString()));
            $to = new Carbon($request->input('to', $now->toDateString()));
            $lessons = \App\Lesson::orderBy('given_at', 'asc')
                ->where('given_at', '>=', $from->startOfDay()->toDateTimeString())
                ->where('given_at', '<=', $to->endOfDay()->toDateTimeString())
                ->get();
        } else {
            $lessons = \App\Lesson::orderBy('given_at', 'asc')->get();
        }

        $groups = \App\CustomerGroup::orderBy('groupname', 'desc')->get();

        return view('lesson.index')->with([
            'lessons' => $lessons,
            'groups' => $groups,
            'now' => $now->toDateString(),
            'from' => isset($from) ? $from->toDateString() : '',
            'to' => isset($to) ? $to->toDateString() : '',
        ]);
    }

    public function store(Request $request)
    {
        $lesson = Lesson::create($request->all());

        return redirect()->route('lessons.index');
    }
}
