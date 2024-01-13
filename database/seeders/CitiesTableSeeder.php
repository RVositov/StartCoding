<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\City;

class CitiesTableSeeder extends Seeder
{
    public function run()
    {


        // Генерация тестовых данных для городов
        $cities = [
            ['name' => 'Худжанд'],
            ['name' => 'Б.Гафуров'],
            ['name' => 'Истиклол'],
            ['name' => 'Исфара'],
            ['name' => 'Гулистон'],
            ['name' => 'Канибадам'],
            ['name' => 'Пенджикент'],
            ['name' => 'Бустон'],
            ['name' => 'Айни'],
            ['name' => 'Ашт'],
            ['name' => 'Деваштич'],
            ['name' => 'ДЖ.Расулов'],
            ['name' => 'Зафарабад'],
            ['name' => 'Пенджикент'],
            ['name' => 'Спитамен'],
            ['name' => 'Шахристан'],

        ];

        // Вставка данных в базу данных
        foreach ($cities as $city)
        {
            City::insert($city);
        }

    }
}
