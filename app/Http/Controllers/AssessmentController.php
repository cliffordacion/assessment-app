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
        // Get all question IDs for this assessment
        $questionIds = $assessment->questions()->pluck('id')->toArray();

        // Build validation rules to require each answer
        // For improvement:
        //  - we can add a column on DB to determine if a field is required
        //  - we can also add type (checkbox, text, etc)
        $rules = ['answers' => 'required|array'];
        foreach ($questionIds as $id) {
            $rules["answers.$id"] = 'required|string|max:255';
        }

        $validated = $request->validate($rules);

        $this->assessmentService->saveAnswers($assessment, $userId, $validated['answers']);

        return redirect()->route('assessment.show', $assessment->id)
            ->with('success', 'Your answers have been saved!');
    }
}