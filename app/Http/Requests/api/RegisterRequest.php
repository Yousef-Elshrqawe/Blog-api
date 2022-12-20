<?php

namespace App\Http\Requests\Api;

use App\Http\Requests\BaseApiRequest;

class RegisterRequest extends BaseApiRequest {
    public function rules() {
        return [
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string',
        ];
    }
}
