<?php namespace App\Http\Controllers;

use App\Calendar;
use App\CustomerGroup;
use App\EventSchedule;
use Carbon\Carbon;

class EventController extends Controller
{
    protected $event;

    function __construct(EventSchedule $event)
    {
        $this->event = $event;
    }

    public function index()
    {
        return view('event.index')->with('body', 'events');
    }

    public function add($start = null, $end = null)
    {
        $groups = CustomerGroup::lists('groupname', 'id');
        $start  = new Carbon($start);
        $end    = new Carbon($end);

        return view('event.add')
            ->with('groups', $groups)
            ->with('start', $start->toTimeString())
            ->with('end', $end->toTimeString())
            ->with('dayOfWeek', $start->dayOfWeek)
            ->with('daysOfWeek', $this->daysOfWeek())
            ->with('body', 'event-edit');
    }

    public function create()
    {
            $input = \Input::only('group_id', 'day_of_week', 'time_from', 'time_to');

            $event = $this->event->fill($input);
            if (!$event->save()) {
                return \Redirect::route('events.add')
                    ->withErrors($event->getErrors())
                    ->withInput();
            }

            return \Redirect::to('events');
    }

    public function edit($eventId)
    {
        $event = EventSchedule::findOrFail($eventId);
        $groups = CustomerGroup::lists('groupname', 'id');

        return view('event.edit')
            ->with('event', $event)
            ->with('start', null)
            ->with('end', null)
            ->with('dayOfWeek', null)
            ->with('groups', $groups)
            ->with('daysOfWeek', $this->daysOfWeek())
            ->with('body', 'event-edit');
    }

    public function save($eventId)
    {
        $event = EventSchedule::findOrFail($eventId);
        $input = \Input::only('group_id', 'day_of_week', 'time_from', 'time_to');
        $event->fill($input);
        if (!$event->save()) {
            return \Redirect::route('events.edit', $eventId)
                ->withErrors($event->getErrors())
                ->withInput();
        }

        return \Redirect::to('events');
    }

    public function events()
    {
        $start = new Carbon(Input::get('start'));
        $end   = new Carbon(Input::get('end'));

        return json_encode(Calendar::events($start, $end, EventSchedule::all()));
    }

    public function remove($eventId)
    {
        $event = EventSchedule::findOrFail($eventId);
        $event->delete();

        return \Redirect::to('events');
    }

    protected function daysOfWeek()
    {
        return [
            'Sunday',
            'Monday',
            'Tuesday',
            'Wednesday',
            'Thursday',
            'Friday',
            'Saturday',
        ];
    }
}