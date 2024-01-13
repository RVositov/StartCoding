<?php

namespace App\Http\Controllers;
use App\Models\Classroom;
use Illuminate\Http\Request;

class ClassroomController extends Controller
{
    public function index()
    {
        $classrooms = Classroom::all();
        return view('classrooms.index', compact('classrooms'));
    }

    public function create()
    {
        return view('classrooms.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:classrooms|max:255',
        ]);

        Classroom::create($request->all());

        return redirect()->route('classrooms.index')->with('success', 'Класс успешно создан.');
    }

    public function show(Classroom $classroom)
    {
        return view('classrooms.show', compact('classroom'));
    }

    public function edit(Classroom $classroom)
    {
        return view('classrooms.edit', compact('classroom'));
    }

    public function update(Request $request, Classroom $classroom)
    {
        $request->validate([
            'name' => 'required|unique:classrooms|max:255',
        ]);

        $classroom->update($request->all());

        return redirect()->route('classrooms.index')->with('success', 'Класс успешно обновлен.');
    }

    public function destroy(Classroom $classroom)
    {
        $classroom->delete();
        return redirect()->route('classrooms.index')->with('success', 'Класс успешно удале');
    }
}
