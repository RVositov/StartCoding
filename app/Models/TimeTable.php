<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TimeTable extends Model
{
    use HasFactory;

    protected $table ='TimeTables';

    protected $fillable = [
        'group_id',
        'teacher_id',
        'classroom_id',
        'day',
        'start_time',
        'end_time'
    ];

    const WEEK_DAYS = [
        '1' => 'Понедельник',
        '2' => 'Вторник',
        '3' => 'Среда',
        '4' => 'Четверг',
        '5' => 'Пятница',
        '6' => 'Суббота',
        '7' => 'Воскресенье',
    ];


}
