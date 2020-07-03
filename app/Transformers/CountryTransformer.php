<?php

namespace App\Transformers;

use App\Models\Country;

class CountryTransformer extends Transformer {
	/**
	 * A Fractal transformer.
	 *
	 * @param Country $country
	 * @return array
	 */
	public function transform(Country $country) {
		return [
			'id' => $country->id,
			'slug' => $country->slug,
			'name' => $country->name,
			'iso2' => $country->iso2,
			'iso3' => $country->iso3,
		];
	}
}
