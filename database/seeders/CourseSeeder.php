<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $courses = [
            [
                'title' => 'Introduction to Programming',
                'description' => 'Learn the basics of programming using PHP and Laravel.',
                'course_code' => 'CS101',
                'user_id' => 11,
            ],
            [
                'title' => 'Web Development Fundamentals',
                'description' => 'Understand front-end and back-end development concepts.',
                'course_code' => 'WEB201',
                'user_id' => 11,
            ],
            [
                'title' => 'Database Design and SQL',
                'description' => 'A practical guide to relational databases and query optimization.',
                'course_code' => 'DB301',
                'user_id' => 11,
            ],
        ];

        foreach ($courses as $course) {
            Course::firstOrCreate(
                ['course_code' => $course['course_code']], // unique column
                $course
            );
        }
    }
}
