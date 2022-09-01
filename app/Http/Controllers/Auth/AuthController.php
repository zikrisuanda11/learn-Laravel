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
        $validator = Validator::make($request->all(),[
            'email' => 'required',
            'password' => 'required'
        ]);

        if ($validator->fails())
        {
            return response()->json($validator->errors());
        }
        
        // $credentials = $request(['email', 'password']);
        // $credentials = Arr::add($credentials, 'status', 'active');

        if (!Auth::attempt($request->only('email', 'password')))
        {
            return response()->json([
                'message' => 'unauthorize',
            ]);
        }

        $teacher = Teacher::where('email', $request['email'])->firstOrFail();
        if (! Hash::check($request->password, $teacher->password))
        {
            return response()->json([
                'message' => 'Error In Login'
            ]);
        }
        
        $teacher = Teacher::where('email', $request->email)->first();
        if (!Hash::check($request->password, $teacher->password))
        {
            return response()->json([
                'message' => 'Error In Login'
            ]);
        }

        $tokenResult = $teacher->createToken('token-auth')->plainTextToken;
        return response()->json([
            'message' => 'success Login',
            'status' => true,
            'token_type' => 'Bearer',
            'access token' =>$tokenResult
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
