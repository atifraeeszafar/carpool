<?php

namespace App\Transformers;

use App\Models\City;
use App\Models\Admin\Types;


class TypeTransformer extends Transformer {


	public function transform(Types $type) {
		return [
			'id' => $type->id,
			'name' => $type->name,
			'icon' => $type->icon_image,
		];
	}

}
