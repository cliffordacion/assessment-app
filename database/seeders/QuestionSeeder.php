<?php

namespace Database\Seeders;

use App\Models\Assessment;
use Illuminate\Database\Seeder;
use App\Models\Question;

class QuestionSeeder extends Seeder
{
    public function run(): void
    {
        $assessment = Assessment::find(1);

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

        Question::create([
            'assessment_id' => $assessment->id,
            'text' => 'Which devices do you use regularly?',
            'options' => [
                ['label' => 'Laptop', 'value' => 'laptop'],
                ['label' => 'Tablet', 'value' => 'tablet'],
                ['label' => 'Smartphone', 'value' => 'smartphone'],
            ],
        ]);

        Question::create([
            'assessment_id' => $assessment->id,
            'text' => 'How satisfied are you with our service?',
            'options' => [
                ['label' => 'Very Satisfied', 'value' => 'very_satisfied'],
                ['label' => 'Satisfied', 'value' => 'satisfied'],
                ['label' => 'Neutral', 'value' => 'neutral'],
                ['label' => 'Dissatisfied', 'value' => 'dissatisfied'],
            ],
        ]);

        Question::create([
            'assessment_id' => $assessment->id,
            'text' => 'How often do you exercise per week?',
            'options' => [
                ['label' => 'Never', 'value' => 'never'],
                ['label' => '1-2 times', 'value' => '1-2'],
                ['label' => '3-4 times', 'value' => '3-4'],
                ['label' => '5 or more times', 'value' => '5+'],
            ],
        ]);

        // Second assessment
        $assessment2 = Assessment::find(2);

        Question::create([
            'assessment_id' => $assessment2->id,
            'text' => 'Which social media platforms do you use most often?',
            'options' => [
                ['label' => 'Facebook', 'value' => 'facebook'],
                ['label' => 'Instagram', 'value' => 'instagram'],
                ['label' => 'Twitter/X', 'value' => 'twitter'],
                ['label' => 'TikTok', 'value' => 'tiktok'],
                ['label' => 'LinkedIn', 'value' => 'linkedin'],
            ],
        ]);

        Question::create([
            'assessment_id' => $assessment2->id,
            'text' => 'How many hours per day do you spend on social media?',
            'options' => [
                ['label' => 'Less than 1 hour', 'value' => 'less_than_1'],
                ['label' => '1-2 hours', 'value' => '1-2'],
                ['label' => '3-4 hours', 'value' => '3-4'],
                ['label' => '5 or more hours', 'value' => '5+'],
            ],
        ]);

        Question::create([
            'assessment_id' => $assessment2->id,
            'text' => 'What is your primary reason for using social media?',
            'options' => [
                ['label' => 'Connecting with friends/family', 'value' => 'connecting'],
                ['label' => 'News and information', 'value' => 'news'],
                ['label' => 'Entertainment', 'value' => 'entertainment'],
                ['label' => 'Business/Networking', 'value' => 'business'],
                ['label' => 'Other', 'value' => 'other'],
            ],
        ]);

        Question::create([
            'assessment_id' => $assessment2->id,
            'text' => 'Have you ever taken a break from social media?',
            'options' => [
                ['label' => 'Yes', 'value' => 'yes'],
                ['label' => 'No', 'value' => 'no'],
            ],
        ]);
    }
}