<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Assessment;

class AssessmentSeeder extends Seeder
{
    public function run(): void
    {
        Assessment::create([
            'id' => 1,
            'title' => 'General Knowledge Assessment',
        ]);


        Assessment::create([
            'id' => 2,
            'title' => 'Social Media Usage',
        ]);
    }
}