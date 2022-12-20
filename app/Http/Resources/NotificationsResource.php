<?php

namespace App\Http\Resources;

use App\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;

class NotificationsResource extends JsonResource
{

    public function toArray($request)
    {

        return [

            $this->map(function ($notification) {
                return [
                    'msg' => 'new post added',
                    'title' => $notification->data['title'],
                    'body' => $notification->data['body'],
                    'read_at' => $notification->read_at,
                ];
            }),
        ];

    }
}
