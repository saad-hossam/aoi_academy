<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CapabilitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          $locales = ['en', 'ar'];

        // Define static capabilities
        $capabilities = [
            [
                'image' => 'capability1.jpg',
                'status' => 'active',
                'order' => 1,
                'translations' => [
                    'en' => [
                        'title' => 'Web Development',
                        'desc' => 'English description for Web Development capability.',
                        'meta_desc' => 'Meta description in English for Web Development.',
                        'meta_keyword' => 'web, development, programming'
                    ],
                    'ar' => [
                        'title' => 'تطوير الويب',
                        'desc' => 'الوصف العربي لميزة تطوير الويب.',
                        'meta_desc' => 'الوصف التعريفي بالعربية لتطوير الويب.',
                        'meta_keyword' => 'ويب, تطوير, برمجة'
                    ],
                ],
            ],
            [
                'image' => 'capability2.jpg',
                'status' => 'active',
                'order' => 2,
                'translations' => [
                    'en' => [
                        'title' => 'Graphic Design',
                        'desc' => 'English description for Graphic Design capability.',
                        'meta_desc' => 'Meta description in English for Graphic Design.',
                        'meta_keyword' => 'graphic, design, creativity'
                    ],
                    'ar' => [
                        'title' => 'تصميم الجرافيك',
                        'desc' => 'الوصف العربي لميزة تصميم الجرافيك.',
                        'meta_desc' => 'الوصف التعريفي بالعربية لتصميم الجرافيك.',
                        'meta_keyword' => 'جرافيك, تصميم, إبداع'
                    ],
                ],
            ],
            [
                'image' => 'capability3.jpg',
                'status' => 'active',
                'order' => 3,
                'translations' => [
                    'en' => [
                        'title' => 'Digital Marketing',
                        'desc' => 'English description for Digital Marketing capability.',
                        'meta_desc' => 'Meta description in English for Digital Marketing.',
                        'meta_keyword' => 'digital, marketing, online'
                    ],
                    'ar' => [
                        'title' => 'التسويق الرقمي',
                        'desc' => 'الوصف العربي لميزة التسويق الرقمي.',
                        'meta_desc' => 'الوصف التعريفي بالعربية للتسويق الرقمي.',
                        'meta_keyword' => 'رقمي, تسويق, أونلاين'
                    ],
                ],
            ],
        ];

        foreach ($capabilities as $capability) {
            $capabilityId = DB::table('capabilities')->insertGetId([
                'image' => $capability['image'],
                'status' => $capability['status'],
                'order' => $capability['order'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            foreach ($locales as $locale) {
                DB::table('capabilities_translations')->insert([
                    'capability_id' => $capabilityId,
                    'locale' => $locale,
                    'title' => $capability['translations'][$locale]['title'],
                    'desc' => $capability['translations'][$locale]['desc'],
                    'meta_desc' => $capability['translations'][$locale]['meta_desc'],
                    'meta_keyword' => $capability['translations'][$locale]['meta_keyword'],
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }

        $this->command->info(count($capabilities) . " static capabilities seeded with translations.");
    }
}
