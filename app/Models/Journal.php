<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Journal extends Model
{
    use HasFactory;
    protected $fillable = [
        'group_id',
        'student_id',
        'mark_id',
        'date',
        'updated_at',
        'created_at',
        'updated_by',
        'created_by',
    ];
}
