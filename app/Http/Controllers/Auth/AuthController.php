<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        
        $teacher = Teacher::where('email', $request->email)->first();
        if(!$teacher)
        {
            return response()->json([
                'message' => 'email salah'
            ]);
        }
        if (!Hash::check($request->password, $teacher->password))
        {
            return response()->json([
                'message' => 'password salah'
            ]);
        }

        $token = $teacher->createToken('auth_token')->plainTextToken;
        return response()->json([
            'message' => 'success Login',
            'status' => true,
            'token_type' => 'Bearer',
            'access token' => $token
        ]);
    }

    public function logout(Request $request)
    {
        $user = $request->user();
        $user->currentAccessToken()->delete();

        return [
            'message' => 'You have successfully logged out and the token was successfully deleted'
        ];
    }
}
