<?php

namespace App\Http\Controllers\Api\V1\Common;

use App\Models\Master\Preference;
use App\Http\Controllers\Api\V1\BaseController;
use App\Transformers\Common\PreferencesTransformer;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Rider\RiderPreference;

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

        $result = fractal($preferences, new PreferencesTransformer);//->parseIncludes(['answers']);

        return $this->respondSuccess($result);
    }

    public function preferenceUpdate(Request $request)
    {

        auth()->user()->riderPreferences()->delete();

        $preferences = explode(',',$request->preferences);

        $preferencesParam = array();

        $createdAt = Carbon::now()->toDateTimeString();

        foreach($preferences as $key => $val)
        {
            $preferencesParam[$key]['answer'] = true;
            $preferencesParam[$key]['created_at'] = $createdAt;
            $preferencesParam[$key]['updated_at'] = $createdAt;
            $preferencesParam[$key]['preference_id'] = $val;
            $preferencesParam[$key]['rider_id'] = auth()->user()->id;


        }

        RiderPreference::insert($preferencesParam);

        $preferences =  $this->preference->get();

        $result = fractal($preferences, new PreferencesTransformer);//->parseIncludes(['answers']);

        return $this->respondSuccess($result);

    }   

}
