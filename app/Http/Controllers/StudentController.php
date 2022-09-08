<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Student::all();

        return response()->json([
            'message' => 'Success Get Data',
            'status' => true,
            'data' => $data
        ]);
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
            'id_parent' => 'required|numeric',
            'email' => 'required|unique:students',
            'password' => 'required|min:8|max:24',
            'fname' => 'required|max:45',
            'lname' => 'required|max:45',
            'date_of_birth' => 'required',
            'phone' => 'required|max:15',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

        $data = Student::create([
            'id_parent' => $request->id_parent,
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
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Student::findOrFail($id);

        return response()->json([
            'message' => 'Success Get Data',
            'status' => true,
            'data' => $data
        ]);
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
        $data = Student::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'id_parent' => 'required',
            'email' => 'required',
            'password' => 'required',
            'fname' => 'required',
            'lname' => 'required',
            'date_of_birth' => 'required',
            'phone' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Student::findOrFail($id);
        $data->delete();
        return response()->json([
            'status' => true,
            'message' => 'Data Success Delete'
        ]);
    }

    public function login(Request $request)
    {
        $student = Student::where('email', $request->email)->first();
        if (!$student) {
            return response()->json([
                'message' => 'email salah'
            ]);
        }
        if (!Hash::check($request->password, $student->password)) {
            return response()->json([
                'message' => 'password salah'
            ]);
        }

        $token = $student->createToken('auth_token')->plainTextToken;
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
            'message' => 'berhasil logout'
        ];
    }
}
