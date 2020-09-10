<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Carbon\Carbon;
use App\Models\Master\UserWaitingForTrip as UserWaitingForTripModel;
use App\Models\User; 
use App\Base\Constants\Masters\PushEnums;
use App\Jobs\Notifications\PushNotification;

class UserWaitingForTrip // implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $offeredPlaceStop = array();

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($offeredPlaceStop)
    {
    
        $this->offeredPlaceStop = $offeredPlaceStop;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {

        $offeredPlaceStop =(object) $this->offeredPlaceStop;

        // echo "<pre>";
        // print_r( $offeredPlaceStop );
        
        // die();

        $before_start_time = Carbon::parse($offeredPlaceStop->start_time)->subMinutes(180);
        $after_start_time = Carbon::parse($offeredPlaceStop->start_time)->addMinutes(180);

        $before_start_time_string = Carbon::parse($before_start_time)->toTimeString();
        $after_start_time_string = Carbon::parse($after_start_time)->toTimeString();

        $haversine = "(6371 * acos(cos(radians($offeredPlaceStop->pickup_lat)) * cos(radians(pickup_lat)) * cos(radians(pickup_lng) - radians($offeredPlaceStop->pickup_lng)) + sin(radians($offeredPlaceStop->pickup_lat)) * sin(radians(pickup_lat))))";

        $drop_haversine = "(6371 * acos(cos(radians($offeredPlaceStop->drop_lat)) * cos(radians(drop_lat)) * cos(radians(drop_lng) - radians($offeredPlaceStop->drop_lng)) + sin(radians($offeredPlaceStop->drop_lat)) * sin(radians(drop_lat))))";

        $poly_line_string = get_line_string($offeredPlaceStop->pickup_lat, $offeredPlaceStop->pickup_lng, $offeredPlaceStop->drop_lat, $offeredPlaceStop->drop_lng);

        $radius = 10;

        $rider_places = UserWaitingForTripModel::select('*')
                ->selectRaw("{$haversine} AS distance")
                ->whereRaw("{$haversine} < ?", [$radius])->selectRaw("{$drop_haversine} AS drop_distance")
                ->whereRaw("{$drop_haversine} < ?", [$radius])
                ->whereDate('date', $offeredPlaceStop->date)
                ->whereTime('start_time', '>', $before_start_time_string)->whereTime('start_time', '<', $after_start_time_string)                        // ->whereHas('offeredRidePlace', function ($query) use ($request,$before_start_time_string,$after_start_time_string) {
                ->first();  
        
        if($rider_places) {

            $user = User::find($rider_places->user_id);

            $pus_request_detail = $rider_places;
            $push_data = ['notification_enum'=>PushEnums::TRIP_AVAILABLE,'result'=>(string)$pus_request_detail];
            $title = trans('push_notifications.trip_available_title');
            $body = trans('push_notifications.trip_available_body');

            $user->notify(new PushNotification($title, $body, $push_data));

        }        
    }
}
