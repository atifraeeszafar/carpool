<?php

namespace App\Transformers\Common;

use App\Transformers\Transformer;
use App\Models\Master\PreferenceAnswers;

class PreferenceAnswersTransformer extends Transformer
{
    /**
     * Resources that can be included if requested.
     *
     * @var array
     */
    protected $availableIncludes = [

    ];

    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(PreferenceAnswers $answers)
    {
        $params =  [
            'id' => $answers->id,
            'preference_id'=>$answers->preference_id,
            'answer' => $answers->answer,
            'is_choosen'=>false,
        ];

        if (auth()->user()->riderPreferences()->where('preference_id', $answers->preference_id)->where('answer_id', $answers->id)->exists()) {
            $params['is_choosen'] = true;
        }

        return $params;
    }
}
