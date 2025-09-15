<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Answer;

class AnswerSeeder extends Seeder
{
    public function run(): void
    {
        Answer::create([
            'question_id' => 1,
            'user_id' => 1,
            'value' => 'blue',
        ]);

        Answer::create([
            'question_id' => 2,
            'user_id' => 1,
            'value' => '18-35',
        ]);
    }
}