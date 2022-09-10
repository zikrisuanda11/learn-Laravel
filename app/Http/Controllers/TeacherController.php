<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Teacher::all();

        return response()->json([
            'message' => 'Success Get Data',
            'status' => true,
            'data' => $data
        ], Response::HTTP_OK);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|unique:teachers',
            'password' => 'required|min:8|max:24',
            'fname' => 'required|max:45',
            'lname' => 'required|max:45',
            'date_of_birth' => 'required',
            'phone' => 'required|max:15',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        if(isset($request->profile_user))
        {
            $storeImage = Storage::put('public/teacher/foto_profile', $request->file('profile_user'));
            $storeImageUrl = Storage::url($storeImage, 'public/foto_profile');
    
            $data = Teacher::create([
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'fname' => $request->fname,
                'lname' => $request->lname,
                'date_of_birth' => $request->date_of_birth,
                'profile_user' => $storeImageUrl,
                'phone' => $request->phone,
            ]);
        }
        $data = Teacher::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'fname' => $request->fname,
            'lname' => $request->lname,
            'date_of_birth' => $request->date_of_birth,
            'phone' => $request->phone,
        ]);

        $token = $data->createToken('auth_token')->plainTextToken;

        return response()->json([
            'message' => 'Success Register Data',
            'status' => true,
            'data' => $data,
            'token' => $token
        ], Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Teacher::findOrFail($id);

        return response()->json([
            'message' => 'Success Get Data',
            'status' => true,
            'data' => $data
        ], Response::HTTP_OK);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Teacher::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'email' => 'required|unique:parents',
            'password' => 'required|min:8|max:24',
            'fname' => 'required|max:45',
            'lname' => 'required|max:45',
            'date_of_birth' => 'required',
            'phone' => 'required|max:15',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        if (isset($request->profile_user)) {
            File::delete(public_path($data->profile_user));

            $storeImage = Storage::put('public/teacher/foto_profile', $request->file('profile_user'));
            $storeImageUrl = Storage::url($storeImage, 'public/icon');
            
            $data->update([
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'fname' => $request->fname,
                'lname' => $request->lname,
                'date_of_birth' => $request->date_of_birth,
                'profile_user' => $storeImageUrl,
                'phone' => $request->phone,
            ]);
        } else {
            $data->update([
                'id_parent' => $request->id_parent,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'fname' => $request->fname,
                'lname' => $request->lname,
                'date_of_birth' => $request->date_of_birth,                
                'phone' => $request->phone,
            ]);
        }

        return response()->json([
            'message' => 'Success Update Data',
            'status' => true,
            'data' => $data
        ], Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Teacher::findOrFail($id);
        $data->delete();
        return response()->json([
            'status' => true,
            'message' => 'Data Success Delete'
        ], Response::HTTP_OK);
    }

    public function login(Request $request)
    {
        $teacher = Teacher::where('email', $request->email)->first();
        if (!$teacher) {
            return response()->json([
                'message' => 'email salah'
            ]);
        }
        if (!Hash::check($request->password, $teacher->password)) {
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
        ], Response::HTTP_OK);
    }

    public function logout(Request $request)
    {
        $user = $request->user();
        $user->currentAccessToken()->delete();

        return response()->json([
            'message' => 'berhasil logout'
        ], Response::HTTP_OK);
    }
}
