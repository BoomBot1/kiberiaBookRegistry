<?php

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Api\BaseController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Requests\Api\AuthRequest;
use App\Http\Requests\Api\Book\ApiIndexRequest;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Validation\Validator;


class AuthController extends BaseController
{
    public function __invoke(LoginRequest $request)
    {

        $user = User::where('email', $request['email'])->get();
        if (isset($user[0]))
        {
            $user = $user[0];
            if (Hash::check($request['password'], $user->password))
            {
                $token = $user->createToken('Some Name For Token (IDK)', ["user:$user->id"]); # я вообще хз что сюда вставить
                return ['token' => $token->plainTextToken];
            }
            else
            {
                return response('Wrong Credentials', 401);
            }
        }
        else
        {
            return response('Unknown email :(', 401);
        }

    }

}
