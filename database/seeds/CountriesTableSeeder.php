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
        $JSON_countries = Country::allJSON();
        foreach ($JSON_countries as $country) {
            Country::firstOrCreate([
                'name'           => ((isset($country['name'])) ? $country['name'] : null),
                'dial_code'      => ((isset($country['dial_code'])) ? $country['dial_code'] : null),
                'code'   => ((isset($country['code'])) ? $country['code'] : null),
                'flag'   => ((isset($country['code'])) ? $country['code'].'.png' : null),
                'currency_name'           => ((isset($country['currency'])) ? $country['currency'] : null),
                'currency_code'           => ((isset($country['currency_code'])) ? $country['currency_code'] : null),
                'currency_symbol'           => ((isset($country['currency_symbol'])) ? $country['currency_symbol'] : null),

            ]);
        }
        // }
    }
}
// swetha structures & associates
