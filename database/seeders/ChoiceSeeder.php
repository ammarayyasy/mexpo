<?php

namespace Database\Seeders;

use App\Models\Choice;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ChoiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Choice::create([
            'question_id' => 1,
            'choice_text' => '2',
            'is_correct' => 1
        ]);
        Choice::create([
            'question_id' => 1,
            'choice_text' => '1',
            'is_correct' => 0
        ]);
        Choice::create([
            'question_id' => 1,
            'choice_text' => '3',
            'is_correct' => 0
        ]);

        Choice::create([
            'question_id' => 2,
            'choice_text' => '3',
            'is_correct' => 1
        ]);
        Choice::create([
            'question_id' => 2,
            'choice_text' => '1',
            'is_correct' => 0
        ]);
        Choice::create([
            'question_id' => 2,
            'choice_text' => '2',
            'is_correct' => 0
        ]);

        Choice::create([
            'question_id' => 3,
            'choice_text' => '4',
            'is_correct' => 1
        ]);
        Choice::create([
            'question_id' => 3,
            'choice_text' => '2',
            'is_correct' => 0
        ]);
        Choice::create([
            'question_id' => 3,
            'choice_text' => '3',
            'is_correct' => 0
        ]);

        Choice::create([
            'question_id' => 4,
            'choice_text' => 'omnivora',
            'is_correct' => 1
        ]);
        Choice::create([
            'question_id' => 4,
            'choice_text' => 'karnivora',
            'is_correct' => 0
        ]);
        Choice::create([
            'question_id' => 4,
            'choice_text' => 'herbivora',
            'is_correct' => 0
        ]);

        Choice::create([
            'question_id' => 5,
            'choice_text' => 'omnivora',
            'is_correct' => 0
        ]);
        Choice::create([
            'question_id' => 5,
            'choice_text' => 'karnivora',
            'is_correct' => 0
        ]);
        Choice::create([
            'question_id' => 5,
            'choice_text' => 'herbivora',
            'is_correct' => 1
        ]);

        Choice::create([
            'question_id' => 6,
            'choice_text' => 'omnivora',
            'is_correct' => 0
        ]);
        Choice::create([
            'question_id' => 6,
            'choice_text' => 'karnivora',
            'is_correct' => 1
        ]);
        Choice::create([
            'question_id' => 6,
            'choice_text' => 'herbivora',
            'is_correct' => 0
        ]);

    }
}
