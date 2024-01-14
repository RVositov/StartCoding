<?php

namespace App\Services;
use App\Models\TimeTable;
class CalendarService
{
    public function generateCalendarData($weekDays)
    {
        $calendarData = [];
        $timeRange = (new TimeService())->generateTimeRange(config('app.calendar.start_time'),config('app.calendar.end_time'));
        $timeTables = TimeTable::with('group','teacher','classroom')->get();

        foreach ($timeRange as $time)
        {
            $timeText = $time['start'] . ' - ' . $time['end'];
            $calendarData[$timeText] = [];

            foreach ($weekDays as $index =>$weekDay)
            {
               // echo $time['start'].'<br>';
                $timeTable = $timeTables->where('day','=','1')->where('start_time','=','08:00:00')->first();

                if($timeTable)
                {
                /*    $calendarData[$timeText][] = [
                        'group'     => $timeTable->group->name,
                        'teacher'   => $timeTable->teacher->name,
                        'classroom' => $timeTable->classroom->name,
                        'rowspan'   => $timeTable->difference/30 ?? ''

                    ];
*/
                    array_push($calendarData[$timeText], [
                        'group'     => $timeTable->group->name,
                        'teacher'   => $timeTable->teacher->name,
                        'classroom' => $timeTable->classroom->name,
                        'rowspan'   => $timeTable->difference/30 ?? ''
                    ]);
                }
                else if (!$timeTables->where('day', $index)->where('start_time', '<', $time['start'])->where('end_time', '>=', $time['end'])->count())
                {
                    $calendarData[$timeText][] = 1;
                }
                else
                {
                    $calendarData[$timeText][] = 0;
                }
            }

        }


        $result = $calendarData;
    return $result;
    }
}
