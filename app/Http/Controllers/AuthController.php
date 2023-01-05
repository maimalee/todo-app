<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginUserRequest;
use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use App\Traits\HttpResponses;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    use HttpResponses;

    public function login(LoginUserRequest $request)
    {
        $request->validated($request->all());
        $user = User::query()
            ->where('email', $request['email'])
            ->first();
        if (empty($user)) {
            return $this->error('', 'Invalid login credential', 401);
        } else {
            if (!Hash::check($request['password'], $user['password'])) {
                return $this->error('', 'Invalid login credential', 401);
            } else {
                return $this->success([
                    'user' => $user,
                    'token' => $user->createToken('API Token of ' . $user['fullname'])->plainTextToken
                ]);
            }
        }

    }

    public function register(StoreUserRequest $request)
    {
        $request->validated($request->all());
        $user = User::query()->create([
            'fullname' => $request['fullname'],
            'username' => $request['username'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);
        return $this->success([
            'user' => $user,
            'token' => $user->createToken('API Token of' . $user['fullname'])->plainTextToken
        ]);
    }

    public function logout()
    {
        Auth::user()->currentAccessToken()->delete();

        return $this->success([
            'message' => 'You have successfully logout',
        ]);

    }
}
