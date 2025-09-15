<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Assessment;

class AssessmentSeeder extends Seeder
{
    public function run(): void
    {
        Assessment::create([
            'title' => 'General Knowledge Assessment',
        ]);
    }
}