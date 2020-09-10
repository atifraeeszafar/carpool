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
        return [
            'id' => $preference->id,
            'question' => $preference->question,
            'active' => (bool) $preference->active
        ];
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
