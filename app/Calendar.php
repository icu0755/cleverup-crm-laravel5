<?php namespace App;

use Carbon\Carbon;

class Calendar
{
    protected static $allowed = array(
        'sun',
        'mon',
        'tue',
        'wed',
        'thu',
        'fri',
        'sat',
    );

    public static function day($day, $dt = null)
    {
        if (!is_string($day) || !in_array($day, static::$allowed)) {
            throw new \InvalidArgumentException();
        }

        $extra = '';
        if ($dt) {
            if (!$dt instanceof \DateTime) {
                $dt = new \DateTime($dt);
            }
            $extra = $dt->format('Y-m-d H:i:s') . ' ';
        }

        return new \DateTime($extra . $day);
    }

    public static function periodDay($day, $start, $end)
    {
        if (!is_string($day) || !in_array($day, static::$allowed)) {
            throw new \InvalidArgumentException();
        }

        if (!($start instanceof \DateTime)) {
            try {
                $start = new \DateTime($start);
            } catch(\Exception $e) {
                throw new \InvalidArgumentException();
            }
        }

        if (!($end instanceof \DateTime)) {
            try {
                $end = new \DateTime($end);
            } catch(\Exception $e) {
                throw new \InvalidArgumentException();
            }
        }

        return new \DatePeriod(
            new \DateTime($start->format('Y-m-d') . ' ' . $day),
            new \DateInterval('P7D'),
            new \DateTime($end->format('Y-m-d'))
        );
    }

    public static function timeInterval($time)
    {
        $from = new \DateTime('00:00:00');
        $to   = new \DateTime($time);

        return $from->diff($to);
    }

    public static function weeklyEvent($event, $start, $end)
    {
        $weeklyEvents = array();

        $period = static::periodDay($event->day_of_week, $start, $end);
        foreach ($period as $periodFrom) {
            $periodTo = clone $periodFrom;
            $periodFrom->add(Calendar::timeInterval($event->time_from));
            $periodTo->add(Calendar::timeInterval($event->time_to));

            $weeklyEvents[] = array(
                'start' => $periodFrom->format(\DateTime::ISO8601),
                'end'   => $periodTo->format(\DateTime::ISO8601),
            );
        }

        return $weeklyEvents;
    }

    public static function events($start, $end, $events)
    {
        $_events = [];
        $interval = new \DateInterval('P1D');
        $period = new \DatePeriod($start, $interval, $end);
        foreach ($period as $day) {
            foreach ($events as $event) {
                $day = Carbon::instance($day);
                if ($day->dayOfWeek == $event->day_of_week) {
                    $_events[] = [
                        'id'    => $event->id,
                        'title' => $event->group->groupname,
                        'start' => Carbon::parse($day->toDateString() . ' ' . $event->time_from)->toIso8601String(),
                        'end'   => Carbon::parse($day->toDateString() . ' ' . $event->time_to)->toIso8601String(),
                        'url'   => route('events.edit', ['eventId' => $event->id]),
                    ];
                }
            }
        }

        return $_events;
    }
} 