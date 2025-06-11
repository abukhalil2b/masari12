<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\CourseCategory;
use App\Models\CourseLevel;
use Illuminate\Database\Seeder;

class CourseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CourseLevel::create([
            'title'=>'المستوى الأول',
            'level_order'=>1,
            'description'=>'المستوى الأول',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);

        CourseLevel::create([
            'title'=>'المستوى الثاني',
            'level_order'=>2,
            'description'=>'المستوى الثاني',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);

        CourseCategory::create([
            'name'=>'التنمية البشرية',
            'slug'=>'human_development',
            'description'=>'التقنيات الحديثة',
            'parent_id'=>NULL,
            'created_at'=>now(),
            'updated_at'=>now()
        ]);

        CourseCategory::create([
            'name'=>'التقنيات الحديثة',
            'slug'=>'new_technology',
            'description'=>'التقنيات الحديثة',
            'parent_id'=>NULL,
            'created_at'=>now(),
            'updated_at'=>now()
        ]);

        Course::create([
            'title' => 'أسس التنمية البشرية وتطوير الذات',
            'cover_image_url' => null,
            'description' => 'دورة شاملة لمساعدة المتدربين على اكتشاف إمكانياتهم وتعزيز مهاراتهم الشخصية والمهنية من خلال تقنيات فعالة في التحفيز الذاتي والتواصل.',
            'language' => 'ar',
            'status' => 'published',
            'course_level_id' => 1,
            'course_category_id' => 1,
            'registration_type' => 'open',
            'registration_start_at' => null,
            'registration_end_at' => null,
            'course_start_at' => null,
            'course_end_at' => null,
            'max_capacity' => null,
            'purchase_price' => 25.000
        ]);

        Course::create([
            'title' => 'التخطيط الاستراتيجي وإدارة الأهداف',
            'cover_image_url' => null,
            'description' => 'يقدم هذا المساق أدوات وأساليب حديثة لتحديد الأهداف طويلة المدى وتحقيقها بفعالية، مع التركيز على تحليل البيئة واتخاذ القرارات الاستراتيجية.',
            'language' => 'en',
            'status' => 'published',
            'course_level_id' => 1,
            'course_category_id' => 2,
            'registration_type' => 'at_period',
            'registration_start_at' => '2025-07-01 00:00:00',
            'registration_end_at' => '2025-07-14 23:59:59',
            'course_start_at' => '2025-07-15 00:00:00',
            'course_end_at' => '2025-08-30 23:59:59',
            'max_capacity' => 50,
            'purchase_price' => 50.000
        ]);

        Course::create([
            'title' => 'المهارات الحاسوبية الأساسية',
            'cover_image_url' => null,
            'description' => 'دورة تمهيدية لتعليم أساسيات استخدام الحاسوب، مثل معالجة النصوص، الجداول الإلكترونية، وأساسيات الإنترنت والبريد الإلكتروني.',
            'language' => 'ar',
            'status' => 'published',
            'course_level_id' => 2,
            'course_category_id' => 1,
            'registration_type' => 'open',
            'registration_start_at' => null,
            'registration_end_at' => null,
            'course_start_at' => null,
            'course_end_at' => null,
            'max_capacity' => null,
            'purchase_price' => 0
        ]);

        Course::create([
            'title' => 'مقدمة في الذكاء الاصطناعي وتعلم الآلة',
            'cover_image_url' => null,
            'description' => 'دورة تعليمية تشرح أساسيات الذكاء الاصطناعي، خوارزميات التعلم الآلي، وتطبيقات الذكاء الاصطناعي في الحياة العملية.',
            'language' => 'en',
            'status' => 'draft',
            'course_level_id' => 2,
            'course_category_id' => 2,
            'registration_type' => 'open',
            'registration_start_at' => null,
            'registration_end_at' => null,
            'course_start_at' => null,
            'course_end_at' => null,
            'max_capacity' => null,
            'purchase_price' => 75.000
        ]);

        Course::create([
            'title' => 'مهارات القيادة الفعالة',
            'cover_image_url' => null,
            'description' => 'دورة مصممة لتطوير المهارات القيادية، مع التركيز على بناء فرق ناجحة، اتخاذ القرارات، والتحفيز الفعّال داخل المؤسسات المختلفة.',
            'language' => 'ar',
            'status' => 'published',
            'course_level_id' => 2,
            'course_category_id' => 2,
            'registration_type' => 'at_period',
            'registration_start_at' => '2025-08-15 00:00:00',
            'registration_end_at' => '2025-08-31 23:59:59',
            'course_start_at' => '2025-09-01 00:00:00',
            'course_end_at' => '2025-10-15 23:59:59',
            'max_capacity' => 40,
            'purchase_price' => 60.000
        ]);
    }
}
