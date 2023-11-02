<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Student; // Import the Student model if it's not already imported.

class StudentsTableSeeder extends Seeder
{
    public function run()
    {
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
