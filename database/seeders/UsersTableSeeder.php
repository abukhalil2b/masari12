<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\UserDetail;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon; // For dates
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        User::create([
            'name' => 'ibrahim',
            'civil_id' => '91171747',
            'password' => Hash::make('91171747'),
            'profile_using' => 'super_admin',
            'gender' => 'male',
            'status' => 'active',
        ]);

        // Create an Admin User
        $adminUser = User::create([
            'name' => 'Ali salim',
            'civil_id' => '12341234',
            'password' => Hash::make('password'),
            'profile_using' => 'admin',
            'gender' => 'male',
            'status' => 'active',
        ]);

        UserDetail::create([
            'user_id' => $adminUser->id,
            'first_name' => 'ali',
            'last_name' => 'salim',
            'about' => 'System administrator.',
            'date_of_birth' => Carbon::parse('1980-01-01'),
            'phone' => '99991111',
        ]);

        DB::table('user_profile')->insert([
            'user_id' => $adminUser->id,
            'profile_id' => 1
        ]);

        // Create a Trainer User
        $trainerUser = User::create([
            'name' => 'Trainer Nassir',
            'civil_id' => '287654321',
            'password' => Hash::make('password'),
            'profile_using' => 'trainer',
            'gender' => 'male',
            'status' => 'active',
        ]);

        UserDetail::create([
            'user_id' => $trainerUser->id,
            'first_name' => 'Nassir',
            'last_name' => 'Salim',
            'about' => 'Experienced software trainer.',
            'date_of_birth' => Carbon::parse('1985-05-10'),
            'phone' => '98882222',
        ]);

        DB::table('user_profile')->insert([
            'user_id' => $trainerUser->id,
            'profile_id' => 2
        ]);

        $traineeUser = User::create([
            'name' => 'Trainee Khamis',
            'civil_id' => '3987654321',
            'password' => Hash::make('password'),
            'profile_using' => 'trainer',
            'gender' => 'male',
            'status' => 'active',
        ]);

        UserDetail::create([
            'user_id' => $traineeUser->id,
            'first_name' => 'Khamis',
            'last_name' => 'Salim',
            'about' => 'Experienced software trainer.',
            'date_of_birth' => Carbon::parse('1985-05-10'),
            'phone' => '98882222',
        ]);

        DB::table('user_profile')->insert([
            'user_id' => $traineeUser->id,
            'profile_id' => 3
        ]);
    }
}
