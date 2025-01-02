<?php

namespace App\Providers;

use App\Models\Feedback;
use Illuminate\Support\Collection;

class CourseFeedbackService
{
    /**
     * Menghitung rating dan feedback untuk kursus.
     *
     * @param \Illuminate\Database\Eloquent\Collection $courses
     * @param \Illuminate\Database\Eloquent\Collection $feedbacks
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function calculateFeedbacks($courses, $feedbacks)
    {
        return $courses->map(function ($courseItem) use ($feedbacks) {
            // Mengambil feedback yang sesuai dengan course_id
            $feedback = $feedbacks->firstWhere('course_id', $courseItem->id);

            // Menghitung average_rating dan total_feedbacks
            $courseItem->average_rating = $feedback ? $feedback->average_rating : 0;
            $courseItem->total_feedbacks = $feedback ? $feedback->total_feedbacks : 0;

            return $courseItem;
        });
    }
}
