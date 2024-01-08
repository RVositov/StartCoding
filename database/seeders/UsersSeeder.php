<?php

namespace Database\Seeders;
use App\Models\User;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UsersSeeder extends Seeder
{
    public function run()
    {
        // Удалить существующие записи в таблице users
        DB::table('users')->truncate();

        // Создать тестовых пользователей
        User::create([
            'name' => 'John Doe',
            'email' => 'john.doe@example.com',
            'password' => Hash::make('123456789'),
        ]);

        // Дополнительные пользователи, если нужно
        // User::create([
        //     'name' => 'Another User',
        //     'email' => 'another.user@example.com',
        //     'password' => Hash::make('password'),
        // ]);

        // ... добавьте больше пользователей, если это необходимо
    }
}
