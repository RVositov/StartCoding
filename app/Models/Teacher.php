<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'surname',
        'phone',
        'birthday',
        'image',
        'updated_at',
        'created_at',
    ];
}
