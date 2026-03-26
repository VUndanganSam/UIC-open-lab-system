<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Admin;
use App\Models\Student;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        Admin::create([
            'username' => 'admin',
            'password' => Hash::make('password'),
        ]);

        Student::create([
            'student_id' => '2023-0123-456',
            'last_name' => 'Solis',
            'first_name' => 'Natalio Feliciano',
            'middle_initial' => 'M.',
            'program' => 'IT',
            'year_level' => 3,
            'total_sessions' => 2,
        ]);
    }
}