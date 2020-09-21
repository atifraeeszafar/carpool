<?php

namespace App\Transformers;

use App\Models\TimeZone;
use App\Models\Notification;

class NotificationTransformer extends Transformer {
	/**
	 * A Fractal transformer.
	 *
	 * @param TimeZone $timezone
	 * @return array
	 */
	public function transform(Notification $notification) {
	
		return [
			'id' => $notification->id,
			'user_id' => $notification->user_id,
			'notification_enum' => $notification->notification_enum,
			'title' => $notification->title,
			'body' => $notification->body,
			'pus_request_detail' => $notification->pus_request_detail,
			'read' => $notification->read,
		];
	}
}
