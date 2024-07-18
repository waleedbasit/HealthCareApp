<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Patient;
use App\Models\User;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        User::firstOrCreate(
            [
                "id" => 1,
            ],
            [
                "name" => "Adam Smith",
                "email" => "fake@email.com",
                "email_verified_at" => now(),
                "password" => Hash::make("de!etTh1s"),
                // 'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                "remember_token" => Str::random(10),
            ]
        );
        $faker = Faker::create();
        for ($i = 0; $i < 10; $i++) {
            Patient::create([
                'first_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'email' => $faker->unique()->safeEmail,
                'phone_number' => $faker->phoneNumber,
                'nhs_number' => $faker->randomNumber(5),
                'address' => $faker->address,
                'date_of_birth' => $faker->date($format = 'Y-m-d', $max = 'now'),
                'sex' => $faker->randomElement(['male', 'female','other']),
            ]);
        }
    }
}
