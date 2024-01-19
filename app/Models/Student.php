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
    public function groups()
    {
        return $this->belongsToMany(Group::class, 'student_groups', 'student_id', 'group_id');
    }

    public function school()
    {
        return $this->belongsTo(School::class, 'school_id');
    }

    public function income()
    {
        return $this->belongsTo(Income::class, 'student_id');
    }

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id');
    }
}
