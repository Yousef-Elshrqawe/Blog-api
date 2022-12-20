<?php

namespace App\Http\Requests\Api;

use App\Http\Requests\BaseApiRequest;

class LoginRequest extends BaseApiRequest {
    public function rules() {
        return [
            'email' => 'required|string|email',
            'password' => 'required|string',
        ];
    }
}
