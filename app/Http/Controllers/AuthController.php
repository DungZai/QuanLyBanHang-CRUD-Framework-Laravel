<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Http\Resources\UserResource;
use App\Services\UserService;
use Illuminate\Http\Request;
use PHPOpenSourceSaver\JWTAuth\JWTGuard;
class AuthController extends Controller
{
    private UserService $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function login(Request $request)
    { 
        $credentials = $request->only('email', 'password');

        /** @var JWTGuard $guard */
        $guard = auth('api');
        
        if (!$token =  $guard->attempt($credentials)) {
            return response()->json([
                'message' => 'Email hoặc password không đúng!',
            ], 401);
        }

        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer',
            'expires_in' =>  $guard->factory()->getTTL() * 60,
        ]);
    }

    public function register(RegisterRequest $request)
    {
        $user = $this->userService->store($request->validated());

        return new UserResource($user);
    }

    public function me()
    {
        return new UserResource(auth('api')->user());
    }

    public function logout()
    {
        /** @var JWTGuard $guard*/
        $guard = auth('api');
        $guard->logout();

        return response()->json([
            'message' => 'Đăng xuất thành công!',
        ]);
    }
}
