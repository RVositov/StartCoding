<?php

namespace App\Http\Controllers;
use App\Models\City;
use App\Models\School;
use Illuminate\Http\Request;

class SchoolController extends Controller
{
    public function index(Request $request)
    {
        $schools = School::with(['city'])->orderByDesc('updated_at')->get();
        return view('schools.index', compact('schools'));
    }
    public function create()
    {
        $cities = City::all();
        return view('schools.create', compact('cities'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'city_id' => 'required|exists:cities,id',
            'name' => 'required|string',
        ]);

        School::create($request->all());
        return redirect()->route('schools.index')->with('success', 'School created successfully.');
    }
    public function getSchoolsByCity($cityId)
    {
        $schools = School::where('city_id', $cityId)->get();
        return response()->json($schools);
    }

    public function edit($id)
    {
        $school = School::find($id);
        $cities = City::all();

        return view('schools.edit', compact('school', 'cities'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'city_id' => 'required|exists:cities,id',
            'name' => 'required|string',
        ]);

        $school = School::findOrFail($id); // Находим школу по идентификатору

        // Обновляем данные
        $school->update([
            'city_id' => $request->input('city_id'),
            'name' => $request->input('name'),
            // Добавьте остальные поля, которые вы хотите обновить
        ]);

        return redirect()->route('schools.index')->with('success', 'School updated successfully.');
    }
    public function destroy($id)
    {
        $school = School::findOrFail($id);
        $school->delete();

        return redirect()->route('schools.index')->with('success', 'Школа успешно удалена.');
    }
}
