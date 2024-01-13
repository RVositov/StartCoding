<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\Group;
use App\Models\Teacher;
use App\Models\TimeTable;
use Illuminate\Http\Request;

class TimeTableController extends Controller
{
    public  function  index()
    {

    }

    public  function create()
    {
        $groups = Group::all();
        $teachers = Teacher::all();
        $classrooms  = Classroom::all();
        $weekDays = TimeTable::WEEK_DAYS;
        return  view('TimeTables.create', compact('groups','teachers','classrooms', 'weekDays'));
    }

    public  function store(Request $request)
    {
        $timeTable= TimeTable::create($request->all());
        dd($timeTable);

    }

}
