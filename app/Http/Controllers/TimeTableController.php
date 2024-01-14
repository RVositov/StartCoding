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

        $timetables = Timetable::all();
        $weekDays = TimeTable::WEEK_DAYS;

        return view('timetables.index', compact('timetables','weekDays'));
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
        $request->validate([
            'group_id' => 'required',
            'teacher_id' => 'required',
            'classroom_id' => 'required',
            'day' => 'required',
            'start_time' => 'required|date_format:H:i', // Проверка на формат времени (часы:минуты)
            'end_time' => 'required|date_format:H:i|after:start_time', // Проверка на формат времени и должно быть после start_time
        ]);

        $timeTable = Timetable::create($request->all());
        return redirect()->route('timetables.index')->with('success', 'Расписание успешно создано.');
    }
    public function edit($id)
    {
        $timetable = Timetable::findOrFail($id);
        $groups = Group::all();
        $teachers = Teacher::all();
        $classrooms = Classroom::all();
        $weekDays = [
            0 => 'Воскресенье',
            1 => 'Понедельник',
            2 => 'Вторник',
            3 => 'Среда',
            4 => 'Четверг',
            5 => 'Пятница',
            6 => 'Суббота',
        ];
        return view('timetables.edit', compact('timetable', 'groups', 'teachers', 'classrooms', 'weekDays'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'group_id' => 'required',
            'teacher_id' => 'required',
            'classroom_id' => 'required',
            'day' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
        ]);

        $timetable = Timetable::findOrFail($id);
        $timetable->update($request->all());

        return redirect()->route('timetables.index')->with('success', 'Расписание успешно обновлено.');
    }
    public function destroy($id)
    {
        $timetable = Timetable::findOrFail($id);
        $timetable->delete();

        return redirect()->route('timetables.index')->with('success', 'Расписание успешно удалено.');
    }
}
