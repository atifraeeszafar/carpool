<?php

use Illuminate\Database\Seeder;
use App\Models\Master\Preference;
use App\Models\Master\PreferenceAnswers;
use App\Base\Constants\Masters\PreferenceQuestions;

class PreferencesSeeder extends Seeder
{
    protected $preferences_with_answers =[
        PreferenceQuestions::CHATTINESS=>[
            'Im the quiet type',
            'I talk depending on my mood',
            'I love to chat'
        ],
        PreferenceQuestions::SMOKING =>[
                'Cigarette smoke doesnt bother me',
                'No smoking in my car please',
                'Dont know'
        ],
        PreferenceQuestions::PETS =>[
                'Pets welcome',
                'No pets please',
                'Dont know'
        ],
        PreferenceQuestions::MUSIC =>[
                'Its all about the playlist',
                'Silence is golden',
                'Dont know'
        ]
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::transaction(function () {
            $all_preferences = Preference::all();

            foreach ($this->preferences_with_answers as $preference => $answers) {
                $preference_id = null;

                $preferenceFound = $all_preferences->first(function ($item) use ($preference) {
                    return $item->question === $preference;
                });

                if ($preferenceFound) {
                    $preference_id = $preferenceFound->id;
                }

                if (!$preference_id) {
                    $createdpreference = Preference::create(['question' => $preference]);

                    $preference_id = $createdpreference->id;
                }

                $allAnswersForpreference = PreferenceAnswers::where('preference_id', $preference_id)->get();

                foreach ($answers as $answer) {
                    $answerFound = $allAnswersForpreference->first(function ($item) use ($answer) {
                        return $item->answer === $answer;
                    });

                    if (!$answerFound) {
                        $data = [
                            'answer' => $answer,
                            'preference_id' => $preference_id,
                        ];

                        PreferenceAnswers::create($data);
                    }
                }
            }
        });
    }
}
