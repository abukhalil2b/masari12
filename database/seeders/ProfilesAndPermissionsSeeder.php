<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Profile;
use App\Models\Permission;
use App\Models\User; // For assigning profiles to users

class ProfilesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        

        // Example Permissions (you'll need to define many more)
        $permissionsData = [
            ['title' => 'Manage Users', 'slug' => 'manage_users', 'category' => 'User Management', 'description' => 'Allows creating, editing, and deleting users.'],
            ['title' => 'Create Course', 'slug' => 'create_course', 'category' => 'Course Management', 'description' => 'Allows creating new courses.'],
            ['title' => 'Enroll Trainee', 'slug' => 'enroll_trainee', 'category' => 'Enrollment', 'description' => 'Allows enrolling trainees into courses.'],
            ['title' => 'View Reports', 'slug' => 'view_reports', 'category' => 'Reporting', 'description' => 'Allows viewing system reports.'],
            ['title' => 'Grade Quizzes', 'slug' => 'grade_quizzes', 'category' => 'Assessment', 'description' => 'Allows trainers to grade quizzes.'],
        ];

        foreach ($permissionsData as $data) {
            Permission::firstOrCreate(['slug' => $data['slug']], $data);
        }

        // Assign permissions to profiles
        $admin = Profile::where('title', 'admin')->first();
        $trainer = Profile::where('title', 'trainer')->first();
        $trainee = Profile::where('title', 'trainee')->first();

        if ($admin) {
            $admin->permissions()->sync(Permission::pluck('id')); // Admin gets all permissions
        }

        if ($trainer) {
            $trainer->permissions()->sync([
                Permission::where('slug', 'create_course')->first()->id,
                Permission::where('slug', 'enroll_trainee')->first()->id,
                Permission::where('slug', 'grade_quizzes')->first()->id,
                // Add other trainer-specific permissions
            ]);
        }

    }
}