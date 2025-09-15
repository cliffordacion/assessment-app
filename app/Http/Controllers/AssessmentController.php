<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Assessment;
use App\Services\AssessmentService;

class AssessmentController extends Controller
{
    public function __construct(protected AssessmentService $assessmentService)
    {
    }

    public function show(Request $request, Assessment $assessment)
    {
        $userId = 1; // Replace with auth()->id() if using authentication
        $data = $this->assessmentService->getAssessmentData($assessment, $userId);

        return view('assessment.show', $data);
    }

    public function submit(Request $request, Assessment $assessment)
    {
        $userId = 1; // Replace with auth()->id() if using authentication

        // TODO: create a separate validation class
        $validated = $request->validate([
            'answers' => 'required|array',
            'answers.*' => 'nullable|string|max:255',
        ]);

        $this->assessmentService->saveAnswers($assessment, $userId, $validated['answers']);

        return redirect()->route('assessment.show', $assessment->id)
            ->with('success', 'Your answers have been saved!');
    }
}