<?php

use App\Models\Common\CarColor;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CarColorSeeder extends Seeder
{
    protected $car_colors = [
        'Aluminum',
        'Beige',
        'Black',
        'Blue',
        'Brown'
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::transaction(function () {
            $car_colors_db = CarColor::all();
            foreach ($this->car_colors as $key => $car_color) {
             
               
                $car_color_found = $car_colors_db->first(function ($item) use ($car_color){
                    return $item->color_name === $car_color;
                });

                if (!$car_color_found) {
                    CarColor::create(['color_name'=>$car_color]);
                }
            }
        });
    }
}
