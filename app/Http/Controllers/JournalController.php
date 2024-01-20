<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Mark;
use App\Models\Student;
use App\Models\TimeTable;
use App\Models\Journal;
use Carbon\Carbon;
use Illuminate\Http\Request;

class JournalController extends Controller
{
    public function index()
    {
        $groups = Group::all()->where('status_id', '=', 1);
        return view('journals.index', compact('groups'));
    }

    public function edit($groupId, $month=null, $year=null)
    {
        $year = $year ?? Carbon::now()->year;
        $month = $month ?? Carbon::now()->month;

        if (strlen($month)<2) $month='0'.$month;

        $group = Group::find($groupId);
        $students = $group->students;
        $marks = Mark::all();
        $lessonDates = $this->dayOfLesson($groupId,$month,$year);

    return view('journals.edit',compact('students','lessonDates','marks','groupId'));
    }

    public function store(Request $request)
    {
        $groupId = $request->groupId;
        $marks = $request->input('marks');

        foreach ($marks as $studentId => $student) {
            foreach ($student as $date => $mark) {
                if ($mark !== null) {

                    Journal::updateOrInsert(
                        [
                            'group_id' => $groupId,
                            'student_id' => $studentId,
                            'date' => $date,
                        ],
                        [
                            'mark_id' => $mark,
                        ]
                    );
                } else {
                    // Если $mark пуст, удаляем запись
                    Journal::where([
                        'group_id' => $groupId,
                        'student_id' => $studentId,
                        'date' => $date,
                    ])->delete();
                }
            }
        }

        return redirect()->back()->with('success','Данные успешно сохранены!');

    }

    public  function  dayOfLesson($groupId, $month, $year)
    {
        $scheduleInfo = [];
        $firstDayOfMonth = date("$year-$month-01");
        $lastDayOfMonth = date("Y-m-t", strtotime($firstDayOfMonth));

        $currentDate = $firstDayOfMonth;
        while ($currentDate <= $lastDayOfMonth) {

            $dayOfWeek = date('N', strtotime($currentDate));

            $timetableEntry = Timetable::where('group_id', $groupId) // Замените $groupId на нужный ID группы
            ->where('day', $dayOfWeek)
                ->first();

            if ($timetableEntry) {
                $scheduleInfo[] = [
                    'date' =>  $currentDate,
                    'day' =>  Carbon::parse($currentDate)->format('d'),
                    'start_time' => $timetableEntry->start_time,
                    'end_time' => $timetableEntry->end_time,
                ];
            }

            $currentDate = date("Y-m-d", strtotime("$currentDate +1 day"));
        }
        return $scheduleInfo;
    }

    public  function  getMark($groupId, $studentId, $date)
    {
        $markId = Journal::where('group_id', $groupId)
            ->where('student_id', $studentId)
            ->where('date', $date)
            ->value('mark_id');
        return $markId;
    }
}
