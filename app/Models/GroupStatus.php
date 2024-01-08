<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupStatus extends Model
{
    use HasFactory;
    protected $fillable = [
        'status',
        'updated_at',
        'created_at',
    ];
}
