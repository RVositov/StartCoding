<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Income extends Model
{
    use HasFactory;
    protected $fillable = [
        'student_id',
        'price',
        'date',
        'created_by',
        'updated_at',
        'created_at',
    ];
    public function student()
    {
        return $this->belongsTo(Student::class);
    }
    public static function getMonthlyIncomes()
    {
        return self::selectRaw('YEAR(date) as year, MONTH(date) as month, SUM(price) as total_income')
            ->groupByRaw('YEAR(date), MONTH(date)')
            ->orderByRaw('year, month')
            ->get();
    }

}

