<?php

namespace App\Http\Controllers;

use App\Models\TimeTable;
use App\Services\CalendarService;
use Illuminate\Http\Request;
use App\Services\TimeService;
class CalendarController extends Controller
{
    public  function index(CalendarService $calendarService)
    {
        $weekDays     = TimeTable::WEEK_DAYS;
        $calendarData = $calendarService->generateCalendarData($weekDays);

        return view('calendar', compact('weekDays', 'calendarData'));
    }
}
