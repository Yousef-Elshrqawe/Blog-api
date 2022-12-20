<?php

namespace App\Http\Requests\Api;

use App\Http\Requests\BaseApiRequest;

class PostRequest extends BaseApiRequest {
    public function rules() {
        return [
            'title' => 'required|string',
            'body' => 'required|string',
            'image' => 'required|image',
            'video' => 'required',
            'can_comment' => 'required|boolean',
        ];
    }
}
