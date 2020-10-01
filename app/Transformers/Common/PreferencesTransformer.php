<?php

namespace App\Transformers\Common;

use App\Models\Master\Preference;
use App\Transformers\Transformer;
use App\Transformers\Common\PreferenceAnswersTransformer;

class PreferencesTransformer extends Transformer
{
    /**
     * Resources that can be included if requested.
     *
     * @var array
     */
    protected $availableIncludes = [
        'answers'
    ];

    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Preference $preference)
    {
        $params =[
            'id' => $preference->id,
            'question' => $preference->question,
            'active' => (bool) $preference->active,
            'is_choosen'=>false,
        ];

        if (auth()->user()) {

            // dd(auth()->user()->riderPreferences);

            if (auth()->user()->riderPreferences()->where('preference_id',  $preference->id)->exists()) {
                $params['is_choosen'] = true;
            }
        } 
        
        return $params;

    }

    /**
     * Include the answers of the preferences questions.
     *
     * @param Preference $preference
     * @return \League\Fractal\Resource\Collection|\League\Fractal\Resource\NullResource
     */
    public function includeAnswers(Preference $preference)
    {
        $answers = $preference->preferencesAnswers;

        return $answers
        ? $this->collection($answers, new PreferenceAnswersTransformer)
        : $this->null();
    }
}
