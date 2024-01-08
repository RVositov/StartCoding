<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable =['id','fio','phone','address','info'];

    public function codes()
    {
        return $this->belongsToMany(Code::class, 'codes', 'client_id', 'id');
    }


    use HasFactory;
}
