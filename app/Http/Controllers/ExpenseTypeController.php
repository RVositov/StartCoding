<?php
namespace App\Http\Controllers;
use App\Models\ExpenseType;
use Illuminate\Http\Request;

class ExpenseTypeController extends Controller
{
    public function index()
    {
        $expenseTypes = ExpenseType::all();
        return view('expense_types.index', compact('expenseTypes'));
    }

    public function create()
    {
        return view('expense_types.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        ExpenseType::create([
            'name' => $request->input('name'),
        ]);

        return redirect()->route('expense_types.index');
    }

    public function edit($id)
    {
        $expenseType = ExpenseType::findOrFail($id);
        return view('expense_types.edit', compact('expenseType'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $expenseType = ExpenseType::findOrFail($id);
        $expenseType->update([
            'name' => $request->input('name'),
        ]);

        return redirect()->route('expense_types.index');
    }

    public function destroy($id)
    {
        $expenseType = ExpenseType::findOrFail($id);
        $expenseType->delete();

        return redirect()->route('expense_types.index');
    }

}
