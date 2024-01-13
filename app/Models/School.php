<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    use HasFactory;

    protected $fillable = ['city_id', 'name', 'created_at', 'updated_at'];

    // Определите отношение к городу
    public function city()
    {
        return $this->belongsTo(City::class, 'city_id');
    }
}
