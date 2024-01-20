<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Income;
use Carbon\Carbon;
use App\Models\Student;

class IncomeController extends Controller
{
    public function index(Request $request)
    {
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        $query = Income::query();

        if ($startDate) {
            $query->where('date', '>=', Carbon::parse($startDate)->startOfDay());
        }

        if ($endDate) {
            $query->where('date', '<=', Carbon::parse($endDate)->endOfDay());
        }

        $incomes = $query->get();



        return view('incomes.index', compact('incomes'));

        $incomes = Income::all(); // или какой-то другой способ получения данных
        return view('incomes.index', compact('incomes'));
    }

    public function create()
    {
        $students = Student::all(); // предположим, что у вас есть модель "Student"
        return view('incomes.create', compact('students'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'student_id' => 'required|integer',
            'price' => 'required|numeric',
            'date' => 'required|date',
        ]);

        // Добавляем информацию о том, кто добавил запись
        $data = $request->all();
        $data['created_by'] = auth()->user()->id; // предполагается, что у вас есть аутентифицированный пользователь

        Income::create($data);

        return redirect()->route('incomes.index')
            ->with('success', 'Оплата успешно добавлена.');
    }
    public function showStudent($id)
    {
        //$student = Student::findOrFail($id); // Предположим, что у вас есть модель "Student"
        //$student->incomes;
       // $incomes = Income::select("incomes.*","students.name","students.surname")->
        //leftJoin("students","incomes.student_id","=","students.id")->
        //where("incomes.student_id", $id)->orderByDesc('id')->get();
        $incomes = Income::with(['student:id,name,surname'])
            ->where('student_id', $id)
            ->orderByDesc('created_at')
            ->get();
        return view('incomes.showStudent', compact('incomes'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'student_id' => 'required|integer',
            'price' => 'required|numeric',
            'date' => 'required|date',
        ]);

        // Получаем аутентифицированного пользователя
        $user = auth()->user();

        // Обновляем запись и добавляем информацию о том, кто обновил
        $income = Income::findOrFail($id);
        $income->update([
            'student_id' => $request->input('student_id'),
            'price' => $request->input('price'),
            'date' => $request->input('date'),
            'updated_by' => $user->id,
        ]);

        return redirect()->route('incomes.index')
            ->with('success', 'Оплата успешно обновлена.');
    }
    public function edit($id)
    {
        $income = Income::findOrFail($id);
        $students = Student::all();

        return view('incomes.edit', compact('income', 'students'));
    }
}
