<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TimeTable extends Model
{
    use HasFactory;
    protected $fillable = [
        'group_id',
        'teacher_id',
        'day',
        'updated_at',
        'created_at',
    ];
}
