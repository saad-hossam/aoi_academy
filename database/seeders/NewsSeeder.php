<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          $locales = ['en', 'ar'];

        // Define static news rows
        $newsItems = [
            [
                'image' => 'news1.jpg',
                'status' => 'active',
                'order' => 1,
                'translations' => [
                    'en' => ['title' => 'Welcome to Our Academy', 'desc' => 'This is the English description of our first news.'],
                    'ar' => ['title' => 'مرحبًا بكم في أكاديميتنا', 'desc' => 'هذا هو الوصف العربي لخبرنا الأول.']
                ]
            ],
            [
                'image' => 'news2.jpg',
                'status' => 'active',
                'order' => 2,
                'translations' => [
                    'en' => ['title' => 'New Courses Available', 'desc' => 'English description for second news item.'],
                    'ar' => ['title' => 'دورات جديدة متاحة', 'desc' => 'الوصف العربي لخبرنا الثاني.']
                ]
            ],
            // add more static rows here if needed
        ];

        foreach ($newsItems as $item) {
            $newsId = DB::table('news')->insertGetId([
                'image' => $item['image'],
                'status' => $item['status'],
                'order' => $item['order'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            foreach ($locales as $locale) {
                DB::table('news_translations')->insert([
                    'news_id' => $newsId,
                    'locale' => $locale,
                    'title' => $item['translations'][$locale]['title'],
                    'desc' => $item['translations'][$locale]['desc'],
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }

        $this->command->info(count($newsItems) . " static news entries seeded.");
    }
}
