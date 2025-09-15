<?php

namespace Database\Seeders;

use App\Models\Assessment;
use Illuminate\Database\Seeder;
use App\Models\Question;

class QuestionSeeder extends Seeder
{
    public function run(): void
    {
        $assessment = Assessment::first();

        Question::create([
            'assessment_id' => $assessment->id,
            'text' => 'What is your favorite color?',
            'options' => [
                ['label' => 'Red', 'value' => 'red'],
                ['label' => 'Blue', 'value' => 'blue'],
                ['label' => 'Green', 'value' => 'green'],
            ],
        ]);

        Question::create([
            'assessment_id' => $assessment->id,
            'text' => 'What is your age group?',
            'options' => [
                ['label' => 'Under 18', 'value' => 'u18'],
                ['label' => '18-35', 'value' => '18-35'],
                ['label' => '36+', 'value' => '36plus'],
            ],
        ]);
    }
}