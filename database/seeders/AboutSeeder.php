<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         
        $locales = ['en', 'ar'];

        // Define static About rows
        $aboutItems = [
            [
                'image' => 'about1.jpg',
                'status' => 'active',
                'order' => 1,
                'translations' => [
                    'en' => ['title' => 'About Our Academy', 'desc' => 'English description about our academy.'],
                    'ar' => ['title' => 'عن أكاديميتنا', 'desc' => 'الوصف العربي عن أكاديميتنا.']
                ]
            ],
            [
                'image' => 'about2.jpg',
                'status' => 'active',
                'order' => 2,
                'translations' => [
                    'en' => ['title' => 'Our Mission', 'desc' => 'English description of our mission.'],
                    'ar' => ['title' => 'مهمتنا', 'desc' => 'الوصف العربي لمهمتنا.']
                ]
            ],
            [
                'image' => 'about3.jpg',
                'status' => 'active',
                'order' => 3,
                'translations' => [
                    'en' => ['title' => 'Our Vision', 'desc' => 'English description of our vision.'],
                    'ar' => ['title' => 'رؤيتنا', 'desc' => 'الوصف العربي لرؤيتنا.']
                ]
            ],
        ];

        foreach ($aboutItems as $item) {
            $aboutId = DB::table('abouts')->insertGetId([
                'image' => $item['image'],
                'status' => $item['status'],
                'order' => $item['order'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            foreach ($locales as $locale) {
                DB::table('about_translations')->insert([
                    'about_id' => $aboutId,
                    'locale' => $locale,
                    'title' => $item['translations'][$locale]['title'],
                    'desc' => $item['translations'][$locale]['desc'],
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }

        $this->command->info(count($aboutItems) . " static About entries seeded.");
    }
    }

