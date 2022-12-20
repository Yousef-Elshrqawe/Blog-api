<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;

class UserResource extends JsonResource
{

    public function toArray($request)
    {
        $credentials = $request->only('email', 'password');
        $token = Auth::guard('api')->attempt($credentials);
        if (!$token) {
            return response()->json([
                'status' => 'error',
                'message' => 'Unauthorized',
            ], 401);
        }
        $user = Auth::guard('api')->user();

        return [
            'User' =>
            [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
            ],
            'Token' =>
            [
                'access_token' => $token,
                'token_type' => 'Bearer',

            ],
        ];

    }
}
