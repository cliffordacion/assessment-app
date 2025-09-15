<?php

namespace App\Services;

use App\Models\Assessment;
use App\Models\Answer;

class AssessmentService
{
    public function getAssessmentData(Assessment $assessment, $userId)
    {
        $assessment->load('questions');
        $answers = Answer::where('user_id', $userId)
            ->whereIn('question_id', $assessment->questions->pluck('id'))
            ->pluck('value', 'question_id');

        return [
            'assessment' => $assessment,
            'questions' => $assessment->questions,
            'answers' => $answers,
        ];
    }

    public function saveAnswers(Assessment $assessment, $userId, array $data)
    {
        $assessment->load('questions');

        $answers = [];
        foreach ($assessment->questions as $question) {
            $value = $data[$question->id] ?? null;
            if ($value !== null) {
                $answers[] = [
                    'user_id' => $userId,
                    'question_id' => $question->id,
                    'value' => $value,
                ];
            }
        }

        if (!empty($answers)) {
            // Use upsert for mass insert/update
            Answer::upsert(
                $answers,
                ['user_id', 'question_id'], // Unique by user and question
                ['value'] // Update only the value field
            );
        }
    }
}