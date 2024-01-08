<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;
    protected $fillable = [
        'course_id',
        'status_id',
        'name',
        'price',
        'start_date',
        'end_date',
        'shift',
        'created_at',
        'updated_at',
    ];
}
