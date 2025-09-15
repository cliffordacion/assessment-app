<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Assessment;
use App\Models\Answer;

class AssessmentController extends Controller
{
    public function show(Request $request, Assessment $assessment)
    {
        $assessment->load('questions');

        // Example: get answers for a user (replace 1 with auth()->id() if using auth)
        $userId = 1;
        $answers = Answer::where('user_id', $userId)
            ->whereIn('question_id', $assessment->questions->pluck('id'))
            ->pluck('value', 'question_id');

            // dump($assessment->questions);
            // exit;
        return view('assessment.show', [
            'assessment' => $assessment,
            'questions' => $assessment->questions,
            'answers' => $answers,
        ]);
    }

    public function submit(Request $request, Assessment $assessment)
    {
        $assessment->load('questions');
        $userId = 1; // Replace with auth()->id() if using authentication

        $data = $request->input('answers', []);

        foreach ($assessment->questions as $question) {
            $value = $data[$question->id] ?? null;
            if ($value !== null) {
                Answer::updateOrCreate(
                    [
                        'user_id' => $userId,
                        'question_id' => $question->id,
                    ],
                    [
                        'value' => $value,
                    ]
                );
            }
        }

        return redirect()->route('assessment.show', $assessment->id)
            ->with('success', 'Your answers have been saved!');
    }
}