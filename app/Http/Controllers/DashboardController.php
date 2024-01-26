<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Teacher;
use App\Models\User;
use App\Models\Income;
use App\Models\Expense; // Добавлен импорт модели Expense
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $studentsCount = Student::count();
        $teachersCount = Teacher::count();
        $incomesSum = Income::sum('price');
        $incomes = Income::orderBy('created_at')->get();
        $currentMonth = Carbon::now()->format('F');
        //$result = $this->getTotalIncomeByUser(); // Получаем результат из метода getTotalIncomeByUser
        $userTotalIncomes = $this->getTotalIncomeByUser();
        $monthlyTotalIncomes = $this->getMonthlyTotalIncomes();
        $expensesSum = Expense::sum('price');

        return view('main.index', [
            'studentsCount' => $studentsCount,
            'teachersCount' => $teachersCount,
            'incomesSum' => $incomesSum,
            'incomes' => $incomes,
            'userTotalIncomes' => $userTotalIncomes,
            'monthlyTotalIncomes' => $monthlyTotalIncomes,
            'currentMonth' => $currentMonth,
            'expensesSum' => $expensesSum,
        ]);
    }

    public function getTotalIncomeByUser()
    {
        $users = User::all();

        $result = [];

        foreach ($users as $user) {
            $totalIncome = $user->incomes()
                ->whereYear('created_at', Carbon::now()->year)
                ->whereMonth('created_at', Carbon::now()->month)
                ->sum('price');

            $result[] = [
                'user_id' => $user->id,
                'user_name' => $user->name,
                'total_income' => $totalIncome,
            ];
        }

        return $result;
    }

    public function getMonthlyTotalIncomes()
    {
        $monthlyTotalIncomes = Income::selectRaw('MONTH(created_at) as month, SUM(price) as total')
            ->whereYear('created_at', Carbon::now()->year)
            ->groupByRaw('MONTH(created_at)')
            ->get();

        return $monthlyTotalIncomes;
    }
}
