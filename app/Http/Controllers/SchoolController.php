<?php

namespace App\Http\Controllers;

use App\Models\School;
use Illuminate\Http\Request;

class SchoolController extends Controller
{
    public function getSchoolsByCity($city_id)
    {
        $schools = School::where('city_id', $city_id)->get();
        return response()->json($schools);
    }
}
