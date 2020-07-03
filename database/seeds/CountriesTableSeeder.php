<?php

use App\Models\Country;
use Illuminate\Database\Seeder;

class CountriesTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

         // Empty the table
        $countries = Country::all();

        // if(sizeof($countries)==0){
        // Get all from the JSON file
        $JSON_countries = Country::allJSON();
        foreach ($JSON_countries as $country) {
            Country::firstOrCreate([
                'name'           => ((isset($country['name'])) ? $country['name'] : null),
                'dial_code'              => ((isset($country['dial_code'])) ? $country['dial_code'] : null),
                'code'   => ((isset($country['code'])) ? $country['code'] : null),
                'flag'   => ((isset($country['code'])) ? $country['code'].'.png' : null),
            ]);
        }
        // }
    }
}
