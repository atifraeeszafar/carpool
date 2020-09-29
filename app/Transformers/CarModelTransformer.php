<?php

namespace App\Transformers;

use App\Models\Country;

class CarModelTransformer extends Transformer {
	/**
	 * A Fractal transformer.
	 *
	 * @param Country $country
	 * @return array
	 */
	public function transform(CarModel $car) {
		return [

			'id' => $car->id,
			'make_id' => $car->make_id,
			'name' => $car->name,
			'active' => $car->active,
			'vehicle_type' => $car->vehicle_type
		];
	}
}
