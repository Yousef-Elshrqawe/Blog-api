<?php

namespace App\Http\Requests\Api;

use App\Http\Requests\BaseApiRequest;

class CommentRequest extends BaseApiRequest {
    public function rules() {
        return [
            'body' => 'required|string',
        ];
    }
}
