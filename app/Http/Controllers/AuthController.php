<?php

namespace App\Http\Controllers;

use App\Http\Requests\Api\LoginRequest;
use App\Http\Requests\Api\RegisterRequest;
use App\Http\Resources\NotificationsResource;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Traits\GeneralTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{
    use GeneralTrait;
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
    }

    public function login(LoginRequest $request)
    {
      return new UserResource($request);
    }

    public function register(RegisterRequest $request){
        $user = User::create($request->all());
        return $this->returnSuccessMessage('Successfully created user!');
    }


    public function logout()
    {
        Auth::guard('api')->logout();
        return response()->json(['status' => 'success', 'message' => 'Successfully logged out',]);
    }

    public function refresh()
    {
        return response()->json([
            'status' => 'success',
            'user' => Auth::guard('api')->user(),
            'authorisation' => [
                'token' => Auth::guard('api')->refresh(),
                'type' => 'bearer',
            ]
        ]);
    }

    public function user(Request $request)
    {
        return response()->json([
            'status' => 'success',
            'user' => Auth::guard('api')->user(),
        ]);
    }


    public function getNotifications()
    {
        $user = Auth::guard('api')->user();
        $notifications = $user->notifications;
        $user->unreadNotifications->markAsRead();
        return new NotificationsResource($notifications);
    }

}
