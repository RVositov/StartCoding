<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Journal extends Model
{
    use HasFactory;
    protected $fillable = [
        'timetable_id',
        'date',
        'mark',
        'teacher_id',
        'updated_at',
        'created_at',
    ];
}
