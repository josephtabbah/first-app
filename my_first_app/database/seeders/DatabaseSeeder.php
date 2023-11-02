<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User; // Import the User model if it's not already imported
use App\Models\Student; // Import the Student model if it's not already imported
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Seed Admin User
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('adminpassword'), // You should replace 'adminpassword' with the actual password
            'role' => 'admin', // Assign 'admin' role to the admin user
        ]);

        // Seed Students
        $faker = Faker::create();

        foreach (range(1, 10) as $index) {
            Student::create([
                'name' => $faker->name,
                'age' => $faker->numberBetween(18, 30),
                'residence_location' => $faker->city,
            ]);
        }
    }
}
