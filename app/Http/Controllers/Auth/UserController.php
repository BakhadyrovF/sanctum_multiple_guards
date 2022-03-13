<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\AdminUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function signUp(Request $request)
    {
        $user = User::create([
            'name' => 'Name 1',
            'email' => 'Email 1',
            'password' => bcrypt('11')
        ]);
        $token = $user->createToken('myToken')->plainTextToken;


        return response()->json(['message' => 'User is created!'], 201);
    }

    public function signIn(Request $request)
    {
        if (!auth()->attempt($request->only('email', 'password'))) {
            return response()->json(['message' => 'Invalid Credentials']);
        }

        $user = auth('api')->user();

        $token = $user->createToken('myToken2')->plainTextToken;

        return response()->json([
            'user' => $user,
            'token' => $token
        ]);
    }

    public function adminSignUp(Request $request)
    {
        $user = AdminUser::create([
            'name' => 'admin 1',
            'email' => 'admin@admin',
            'password' => bcrypt('admin')
        ]);

        $token = $user->createToken('admin-token')->plainTextToken;

        return response()->json([
            'user' => $user,
            'token' => $token
        ]);
    }

    public function adminSignIn(Request $request)
    {
        if (!auth('admin')->attempt($request->only('email', 'password'))) {
            return response()->json(['message' => 'Invalid Credentials']);
        }

        $user = auth()->user();

        $token = $user->createToken('myToken2')->plainTextToken;

        return response()->json([
            'user' => $user,
            'token' => $token
        ]);
    }
}
