<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Group;
use App\Models\School;
use App\Models\Student;
use App\Models\StudentGroup;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        //$students = Student::with('groups')->get();
        $students = Student::with(['groups', 'school', 'city'])->orderByDesc('updated_at')->get();

        return view('students.index', compact('students'));
    }

    public function create()
    {
        $groups = Group::all();
        $cities = City::all();
        return view('students.create', compact('groups', 'cities'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'school_id' => 'required|exists:schools,id',
            'name' => 'required|string',
            'surname' => 'required|string',
            'phone' => 'required|string',
            'discount' => 'numeric',
            'city_id' => 'required|string',
            'birthday' => 'date',
            'class' => 'string',
            'address' => 'string',
        ]);
        $data = $request->all();
        $data['is_active'] = isset($data['is_active']) && $data['is_active'] === 'on';
        $student =  Student::create($data);
        $groups_id = $data['groups_id'];
        $student_id = $student->id;

        foreach ($groups_id as $group_id) {
            $student_group =  ['group_id'=>$group_id, 'student_id'=>$student_id];
            StudentGroup::create($student_group);
        }

        return redirect()->route('students.index')->with('success', 'Student created successfully.');
    }

    public function updateGroupsForStudent($student_id, $groups_id)
    {
        $student = Student::findOrFail($student_id);

        // Используем метод sync для обновления групп студента
        $student->groups()->sync($groups_id);

        return redirect()->back()->with('message', 'Группы успешно обновлены для студента.');
    }

    public function show(Student $student)
    {
        return view('students.show', compact('student'));
    }

    public function edit(Student $student)
    {
        $cities = City::all(); // Assuming you have a City model
        $groups = Group::all(); // Assuming you have a Group model
        $schools = School::all(); // Assuming you have a School model
        return view('students.edit', compact('student', 'groups', 'cities','schools'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'school_id' => 'required|exists:schools,id',
            'name' => 'required|string',
            'surname' => 'required|string',
            'phone' => 'required|string',
            'discount' => 'numeric',
            'city_id' => 'required|string',
            'birthday' => 'date',
            'class' => 'string',
            'address' => 'string',
        ]);

        $data = $request->all();
        $data['is_active'] = isset($data['is_active']) && $data['is_active'] === 'on';

        $student = Student::findOrFail($id);
        $student->update($data);

        // Update student groups
        $groups_id = $data['groups_id'] ?? [];
        $student->groups()->sync($groups_id);

        return redirect()->route('students.index')->with('success', 'Student updated successfully.');
    }


    public function destroy(Student $student)
    {

        $student->delete();

        return redirect()->route('students.index')->with('success', 'Student deleted successfully.');
    }

}
