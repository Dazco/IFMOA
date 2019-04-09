<?php

use App\User;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    return [
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
        'surname' => $faker->lastName,
        'firstname' => $faker->firstName,
        'othernames' => $faker->firstName,
        'address' => $faker->address,
        'phone' => $faker->phoneNumber,
        'date_of_birth' => $faker->date(),
        'nationality' => 'Nigeria',
        'state_of_origin' => 'Lagos',
        'company_name' => $faker->company,
        'company_address' => $faker->companyEmail,
        'job_title' => $faker->jobTitle,
        'nature_of_work' => $faker->realText(),
        'is_approved' => '1',
        'is_active' => '1',
        'is_admin' => '1',
        'grade_id'=> '1',
        'registration_number' => $faker->unique()->text(6)
    ];
});
