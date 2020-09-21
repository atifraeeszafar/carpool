<?php

namespace App\Http\Controllers\Api\V1\Common;

use App\Models\Master\Preference;
use App\Http\Controllers\Api\V1\BaseController;
use App\Transformers\Common\PreferencesTransformer;

/**
 * @group Profile-Management
 *
 * APIs for Profile-Management
 */
class PreferencesController extends BaseController
{
    protected $preference;

    public function __construct(Preference $preference)
    {
        $this->preference = $preference;
    }

    /**
    * List Preferences questions & answers
    * @responseFile responses/profile/preferencesWithAnswers.json
    */
    public function index()
    {
        $preferences =  $this->preference->get();

        $result = fractal($preferences, new PreferencesTransformer)->parseIncludes(['answers']);

        return $this->respondSuccess($result);
    }
}
