<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable = [
        'city_id',
        'school_id',
        'name',
        'surname',
        'phone',
        'discount',
        'birthday',
        'class',
        'address',
        'is_active',
        'updated_at',
        'created_at',
    ];
}
