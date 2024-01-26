<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;

    protected $fillable = ['id',
	'expense_type_id',
	'name',
	'price',
	'date',
	'comment',
	'created_by',
	'updated_by',
	'created_at',
	'updated_at'];



    public function enteredBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
    public function expenseType()
    {
        return $this->belongsTo(ExpenseType::class);
    }
    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

}
