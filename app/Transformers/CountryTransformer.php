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
			'name' => $country->name,
			'dial_code' => $country->dial_code,
			'iso2' => $country->code,
			'flag' => $country->flag,
			// 'slug' => $country->flag,

		];
	}
}
