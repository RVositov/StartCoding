<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    // Отображение списка всех учителей
    public function index()
    {
        $teachers = Teacher::all();
        return view('teachers.index', compact('teachers'));
    }

    // Показ формы для создания нового учителя
    public function create()
    {
        return view('teachers.create');
    }

    // Сохранение нового учителя в базе данных
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|string',
            'surname' => 'required|string',
            'phone' => 'required|string',
            'birthday' => 'date',// Adjust image validation based on your requirements
        ]);

        $teacher = Teacher::create($request->all());

        // Handle image upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('teachers', 'public');
            $teacher->update(['image' => $imagePath]);
        }

        return redirect()->route('teachers.index')->with('success', 'Teacher created successfully.');

    }

    // Отображение информации об учителе
    public function show(Teacher $teacher)
    {
        return view('teachers.show', compact('teacher'));
    }

    // Показ формы для редактирования учителя
    public function edit(Teacher $teacher)
    {
        return view('teachers.edit', compact('teacher'));
    }

    // Обновление учителя в базе данных

    public function update(Request $request, $id)
    {
        // Validate and update data
        $request->validate([
            'name' => 'required|string',
            'surname' => 'required|string',
            'phone' => 'required|string',
            'birthday' => 'date',
        ]);

        $teacher = Teacher::find($id);
        $teacher->update($request->all());

        return redirect()->route('teachers.index')->with('success', 'Teacher updated successfully');
    }


    // Удаление учителя из базы данных
    public function destroy(Teacher $teacher)
    {
        $teacher->delete();
        return redirect()->route('teachers.index')->with('success', 'Teacher deleted successfully');
    }
}
