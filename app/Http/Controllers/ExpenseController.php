<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Expense;
use App\Models\ExpenseType;
use App\Models\User;

class ExpenseController extends Controller
{
    public function index()
    {
        $expenses = Expense::with('enteredBy')->orderBy('id', 'desc')->get();
        return view('expenses.index', compact('expenses'));
    }

    public function create()
    {
        $expenseTypes = ExpenseType::all();
        return view('expenses.create', compact('expenseTypes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'date' => 'required|date',
            'price' => 'required|numeric',
            'comment' => 'required|string',
        ]);

        Expense::create([
            'name' => $request->input('name'),
            'date' => $request->input('date'),
            'comment' => $request->input('comment'),
            'price' => $request->input('price'),
            'expense_type_id'=> $request->input('expense_type_id'),
            'created_by' => auth()->user()->id,
        ]);
        return redirect()->route('expenses.index')->with('success', 'Расход успешно добавлен');
    }
    public function edit($id)
    {
        $expense = Expense::findOrFail($id);
        $expenseTypes = ExpenseType::all();
        return view('expenses.edit', compact('expense','expenseTypes'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string',
            'date' => 'required|date',
            'comment' => 'required|string',
            'price' => 'required|numeric',
        ]);
        $expense = Expense::findOrFail($id);
        $expense->update([
            'name' => $request->input('name'),
            'date' => $request->input('date'),
            'comment' => $request->input('comment'),
            'price' => $request->input('price'),
            'updated_by' => auth()->id(),
        ]);
        return redirect()->route('expenses.index')->with('success', 'Расход успешно обновлен');
    }
    public function destroy($id)
    {
        $expense = Expense::findOrFail($id);
        $expense->delete();
        return redirect()->route('expenses.index')->with('success', 'Расход успешно удален');
    }
}
