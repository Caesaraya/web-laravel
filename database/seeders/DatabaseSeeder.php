<?php

namespace Database\Seeders;
use App\Models\Classroom;
use App\Models\Guardian;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Teacher;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
          User::create([
            'name' => 'Admin Sekolah',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'John Doe',
            'email' => 'John@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'user',
        ]);

        Guardian::factory()->count(15)->create();

        Classroom::factory(4)
        ->hasStudents(5)
        ->create();

        Subject::factory(5)
        ->hasTeacher(1)
        ->create();
    }
}
