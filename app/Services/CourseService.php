<?php

namespace App\Services;

use App\Models\Course;

class CourseService
{
    public function createCourse(array $courseData)
    {
        // Handle the possible uniqueness issue of each code, if the current generated 
        // course code is the same, regenerate again
        $courseData['course_code'] = $this->generateCourseCode($courseData['title']);

        return Course::create($courseData);
    }

    public function getCourse(int $courseId)
    {
        return Course::find($courseId);
    }

    public function updateCourse(array $courseData, Course $course)
    {
        $course->fill($courseData);

        $course->save();

        return $course;
    }

    private function generateCourseCode(string $title, int $length = 4): string
    {
        // Make sure title is uppercase and 3 letters max
        $prefix = strtoupper(substr($title, 0, 3));

        // Generate a random numeric suffix
        $suffix = str_pad(mt_rand(0, pow(10, $length) - 1), $length, '0', STR_PAD_LEFT);

        return "{$prefix}{$suffix}";
    }
}
