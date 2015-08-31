<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class AttendanceController extends Controller
{

    public function index($groupId)
    {
        $list = \App\Attendance::distinct()->select(['id', 'was_at'])->where('group_id', $groupId)->get();
        return view('attendance.index')->withAttendance($list);
    }

}
