<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CourseCategorySeeder extends Seeder
{
    public function run()
    {
        $course_categories = [
            ['title' => 'القيادية والإشرافية', 'group' => '1', 'position' => 4, 'is_global' => 1, 'parent_id' => null],
            ['title' => 'الإدارية والموارد البشرية', 'group' => '1', 'position' => 5, 'is_global' => 1, 'parent_id' => null],
            ['title' => 'الإعلام والعلاقات العامة', 'group' => '1', 'position' => 6, 'is_global' => 1, 'parent_id' => null],
            ['title' => 'الدينية', 'group' => '1', 'position' => 7, 'is_global' => 1, 'parent_id' => null],
            ['title' => 'القانونية', 'group' => '1', 'position' => 8, 'is_global' => 1, 'parent_id' => null],
            ['title' => 'التنسيق وإدارة المكاتب', 'group' => '1', 'position' => 9, 'is_global' => 1, 'parent_id' => null],
            ['title' => 'المالية والمحاسبية', 'group' => '1', 'position' => 10, 'is_global' => 1, 'parent_id' => null],
            ['title' => 'تقنية المعلوما1', 'group' => '1', 'position' => 11, 'is_global' => 1, 'parent_id' => null],
            ['title' => 'برنامج صيفنا مميز (الإناث)', 'group' => '1', 'position' => 3, 'is_global' => 0, 'parent_id' => null],
            ['title' => 'برنامج صيفنا مميز (الذكور)', 'group' => '1', 'position' => 2, 'is_global' => 0, 'parent_id' => null],
            ['title' => 'برنامج المدرسة الصيفية', 'group' => '1', 'position' => 12, 'is_global' => 1, 'parent_id' => null],
            ['title' => 'Hidayah Program', 'group' => '1', 'position' => 1, 'is_global' => 1, 'parent_id' => null],
            ['title' => 'القيادية والاشرافية فرعي1', 'group' => '1', 'position' => 1, 'is_global' => 1, 'parent_id' => 3],
            ['title' => 'القيادية والاشرافية فرعي2', 'group' => '1', 'position' => 2, 'is_global' => 1, 'parent_id' => 3],
            ['title' => 'المعيار الرئيسي', 'group' => '2', 'position' => 1, 'is_global' => 1, 'parent_id' => null],
        ];

        DB::table('course_categories')->insert($course_categories);
    }
}
