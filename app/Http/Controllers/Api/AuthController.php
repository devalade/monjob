<?php

namespace App\Http\Controllers\Api;

use App\Actions\Fortify\CreateNewUser;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Response;
use Illuminate\Validation\Rules\Password;

class AuthController extends Controller
{
    public function login(Request $request): JsonResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (!Auth::attempt($credentials)) {
          return \response()->json('Identifiers doesn\'t match.', 422);
        }

        $user = Auth::user();
        return  \response()->json([
            'token' => $user->createToken($request->email)->plainText,
            'user' => $user
        ]);
    }

    public function register(Request $request)
    {
        $user = (new CreateNewUser())->create($request->all());

        return \response()->json([
            'user' => $user
        ], 201);
    }
}
