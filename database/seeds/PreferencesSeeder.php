<?php

use Illuminate\Database\Seeder;

class PreferencesSeeder extends Seeder
{
    protected $preferences_with_answers =[
        PreferenceQuestions::CHATTINESS=>[
        'answers'=>[
            'Im the quiet type',
            'I talk depending on my mood',
            'I love to chat'
        ]
        ],
        PreferenceQuestions::SMOKING =>[
            'answers'=>[
                'Cigarette smoke doesnt bother me',
                'No smoking in my car please',
                'Dont know'
            ]
        ],
        PreferenceQuestions::PETS =>[
            'answers'=>[
                'Pets welcome',
                'No pets please',
                'Dont know'
            ]
        ],
        PreferenceQuestions::MUSIC =>[
            'answers'=>[
                'Its all about the playlist',
                'Silence is golden',
                'Dont know'
            ]
        ]
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
    }
}
