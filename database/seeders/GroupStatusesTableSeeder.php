<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GroupStatusesTableSeeder extends Seeder
{
    public function run()
    {
        $statuses = [
            'Активна',
            'Неактивна',
            'Ожидает подтверждения',
            'В архиве',
            // Добавьте другие статусы групп по мере необходимости
        ];

        foreach ($statuses as $status) {
            DB::table('group_statuses')->insert([
                'status' => $status,
                // Дополнительные поля, если они есть в вашей таблице "group_statuses"
            ]);
        }
    }
}
