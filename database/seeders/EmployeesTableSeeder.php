<?php

namespace Database\Seeders;

use App\Models\Employee;
use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmployeesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $employees = [
            [
                'first_name' => 'Spongebob',
                'last_name' => 'Squarepants',
                'hourly_pay' => 12.60,
                'hire_date' => '2022-02-21'
            ],
            [
                'first_name' => 'Squidward',
                'last_name' => 'Tentacles',
                'hourly_pay' => 17.10,
                'hire_date' => '2022-02-25'
            ]
        ];

        foreach ($employees as $key => $value) Employee::create($value);
    }
}
