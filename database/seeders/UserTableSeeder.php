<?php

namespace Database\Seeders;

use App\Models\Profile;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = new Role();
        $role->name = 'Administrator';
        $role->description = 'Administrator';
        $role->save();

        $role = new Role();
        $role->name = 'Delivery';
        $role->description = 'Delivery';
        $role->save();
        $role = new Role();
        $role->name = 'Pharmacy';
        $role->description = 'Pharmacy';
        $role->save();

        $user = new User();
        $user->userName = 'Sujon';
        $user->email = 'Sujon@gmail.com';
        $user->contactNumber = '01706689514';
        $user->password = bcrypt('123456789');
        $user->role_id = '1';
        $user->save();
        $profile = new Profile();
        $profile->user_id = $user->id;
        $profile->save();

        $user = new User();
        $user->userName = 'Rimon';
        $user->email = 'rimon@gmail.com';
        $user->contactNumber = '0170668925';
        $user->password = bcrypt('123456789');
        $user->role_id = '2';
        $user->save();
        $profile = new Profile();
        $profile->user_id = $user->id;
        $profile->save();
        $user = new User();
        $user->userName = 'Sumon';
        $user->email = 'sumon@gmail.com';
        $user->contactNumber = '01706689514';
        $user->password = bcrypt('123456789');
        $user->role_id = '3';

        $user->save();
        $profile = new Profile();
        $profile->user_id = $user->id;
        $profile->save();
        $user = new User();
        $user->userName = 'Rifat';
        $user->email = 'rifat@gmail.com';
        $user->contactNumber = '01706689514';
        $user->password = bcrypt('123456789');
        $user->role_id = '3';
        $user->save();
        $profile = new Profile();
        $profile->user_id = $user->id;
        $profile->save();
        $user = new User();
        $user->userName = 'Rahat';
        $user->email = 'rahat@gmail.com';
        $user->contactNumber = '01706689514';
        $user->password = bcrypt('123456789');
        $user->role_id = '2';
        $user->save();
        $profile = new Profile();
        $profile->user_id = $user->id;
        $profile->save();
        $user = new User();
        $user->userName = 'Riyan';
        $user->email = 'riyan@gmail.com';
        $user->contactNumber = '01706689514';
        $user->password = bcrypt('123456789');
        $user->role_id = '1';
        $user->save();
        $profile = new Profile();
        $profile->user_id = $user->id;
        $profile->save();
        $user = new User();
        $user->userName = 'Ismail';
        $user->email = 'ismail@gmail.com';
        $user->contactNumber = '01706689514';
        $user->password = bcrypt('123456789');
        $user->role_id = '2';
        $user->save();
        $profile = new Profile();
        $profile->user_id = $user->id;
        $profile->save();
    }
}
