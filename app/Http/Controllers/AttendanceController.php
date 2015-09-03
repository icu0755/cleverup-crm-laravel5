<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Carbon\Carbon;
use DB;
use Exception;
use Illuminate\Http\Request;
use Input;

class AttendanceController extends Controller
{

    public function index($groupId)
    {
        $list = \App\Attendance::distinct()->select(['id', 'was_at'])->where('group_id', $groupId)->get();
        return view('attendance.index')->withAttendance($list);
    }

    public function create($groupId)
    {
        $dt = Carbon::now();
        $customers = \App\Customer::where('group_id', $groupId)->get();
        return view('attendance.create')
            ->withCustomers($customers)
            ->with('groupId', $groupId)
            ->with('date', $dt->format('Y-m-d'))
            ->with('time', $dt->format('H:m'));
    }

    public function store($groupId)
    {
        $date = Input::get('date');
        $time = Input::get('time');

        try {
            DB::transaction(function() use ($groupId, $date, $time)
            {
                foreach (Input::get('customers') as $customerId) {
                    $att = new \App\Attendance([
                        'group_id' => $groupId,
                        'customer_id' => $customerId,
                        'was_at' => sprintf('%s %s', $date, $time),
                    ]);
                    $att->save();
                }
            });
        } catch (Exception $e) {
            redirect(route('attendance.index', $groupId))
                ->with('error', $e->getMessage());
        }

        return redirect(route('attendance.index', $groupId))
            ->with('status', 'Attendance saved');
    }

}
