<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class CoursesTableSeeder extends Seeder
{

    public function run()
    {
        $courses = [
            "Основы программирования: Введение в веб-разработку",
            "Полный курс по Python: От начинающего до опытного разработчика",
            "Разработка веб-приложений с использованием JavaScript и React",
            "Углубленное изучение Java: ООП и архитектурные паттерны",
            "Мастер-класс по разработке мобильных приложений на платформе Android",
            "PHP и MySQL: Создание динамических веб-сайтов",
            "Анализ данных с использованием Python и библиотеки Pandas",
            "Full Stack Development: От фронтенда до бэкенда",
            "Искусство тестирования: Практические навыки тестирования кода",
            "Сетевое программирование с использованием языка C++",
            // Добавьте другие курсы по мере необходимости
        ];

        foreach ($courses as $course) {
            DB::table('courses')->insert([
                'name' => $course,
                // Дополнительные поля, если они есть в вашей таблице "courses"
            ]);
        }
    }
}
