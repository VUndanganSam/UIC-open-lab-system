<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Admin;
use App\Models\Student;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Create a Default Web User (Optional)
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        // 2. Create the Admin for your Pink Dashboard
        // This is the login you will use for Auth::guard('admin')
        Admin::create([
            'username' => 'admin',
            'password' => Hash::make('password'), // Use 'password' to log in
        ]);

        // 3. Create a Test Student (Solis) so you can test the ID Scanner (THIS IS JUST A TEST)
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