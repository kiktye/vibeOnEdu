<?php

namespace Database\Seeders;

use App\Models\Question;
use App\Models\Quiz;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $quiz1 = Quiz::where('title', 'Основни финансиски вештини')->first();
        $quiz2 = Quiz::where('title', 'Управување со буџет')->first();

        // Quiz 1: Основни финансиски вештини
        $questions = [
            'Како е најдобро да се следат трошоците?',
            'Што е штедење?',
            'Како треба да се постави личен буџет?',
            'Што претставува каматната стапка?',
            'Која е најдобрата стратегија за инвестирање?',
            'Што значи ликвидност?',
            'Што е кредитен ризик?',
            'Што е диверзификација?',
            'Како може да се намали ризикот при инвестирање?',
            'Која е разликата помеѓу фиксни и варијабилни трошоци?'
        ];

        foreach ($questions as $question_text) {
            Question::create([
                'quiz_id' => $quiz1->id,
                'question_text' => $question_text
            ]);
        }

        // Quiz 2: Управување со буџет
        $questions = [
            'Што е буџет?',
            'Кои се најчестите буџетски грешки?',
            'Кои се основните елементи на добар буџет?',
            'Што е буџетски дефицит?',
            'Како да се зголеми финансиската дисциплина?',
            'Која е разликата помеѓу задолжување и штедење?',
            'Кога е најдобро да се инвестира?',
            'Како да се направи правилен план за отплата на долгови?',
            'Која е важноста на имање итен фонд?',
            'Како да се избегне импулсивно трошење?'
        ];

        foreach ($questions as $question_text) {
            Question::create([
                'quiz_id' => $quiz2->id,
                'question_text' => $question_text
            ]);
        }
    }
}
