<?php

namespace Database\Seeders;

use App\Models\Question;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Question::create([
            'quiz_id' => 1,
            'question' => 'berapa hasil 1+1',
            'weight' => 3.5
        ]);
        Question::create([
            'quiz_id' => 1,
            'question' => 'berapa hasil 2+1',
            'weight' => 3.5
        ]);
        Question::create([
            'quiz_id' => 1,
            'question' => 'berapa hasil 40:10',
            'weight' => 3
        ]);

        Question::create([
            'quiz_id' => 2,
            'question' => 'kucing hewan apa',
            'weight' => 3.5
        ]);
        Question::create([
            'quiz_id' => 2,
            'question' => 'sapi hewan apa',
            'weight' => 3.5
        ]);
        Question::create([
            'quiz_id' => 2,
            'question' => 'hiu hewan apa',
            'weight' => 3
        ]);

    }
}
