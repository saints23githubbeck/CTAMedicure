<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Carbon\Carbon;
use Faker\Factory as Faker;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    $user =  new User;
    $faker = Faker::create();
    $user->userName = $faker->username;
    $user->email = $faker->email;
    $user->contactNumber = $faker->name;
    $user->role_id = 1;
    $user->password = $faker->password;
    $user->created_at = Carbon::now();

    }
}
