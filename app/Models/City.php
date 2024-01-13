<?php

// app\Models\City.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    // Определите обратное отношение от города к школам
    public function schools()
    {
        return $this->hasMany(School::class, 'city_id');
    }
}


