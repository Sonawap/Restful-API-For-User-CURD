<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use App\Helpers\Helper;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return response()->json([
            'status' => 'success',
            'total_users' => $users->count(),
            'users' => $users
        ],200);
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
            'name' => 'required|string',
            'phone' => 'required',
            'password' => 'required|alpha_num|min:6',
            'email' => 'required|email|unique:users'
        ]);

        // return $request->name;

        if($validator->fails()){
            return Helper::error404("Invaid Parameter");
        }

        $user = new User();

        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->email = $request->email;

        $user->password = bcrypt($request->password);

        $user->assignRole('users');

        $user->save();

        // $admins = User::where('type', 'admin')->get();
        // Notification::send($admins, new UserRegistered($user));

        return response()->json([
            'status' => 'Account has been created',
            'user' => $user
        ],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        if($user){
            return response()->json([
                'status' => 'success',
                'user' => $user,
            ],200);

        }else{
            return Helper::error404("No user found");
        }
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
        $validator = Validator::make($request->all(), [
            'name' => 'string',
            'password' => 'alpha_num|min:6',
            'email' => 'email|unique:users'
        ]);

        // return $request->name;

        if($validator->fails()){
            return Helper::error404("Invaid Parameter");
        }

        $user = User::find($id);

        if(!$user){
            return Helper::error404("No user found");

        }else{
            if($request->has('password')){
                $user->password = bcrypt($request->password);
            }

            if($request->has('name')){
                $user->name = $request->name;
            }

            if($request->has('phone')){
                $user->phone = $request->phone;
            }

            if($request->has('email')){
                $user->email = $request->email;
            }

            $user->assignRole('users');

            $user->save();

            // $admins = User::where('type', 'admin')->get();
            // Notification::send($admins, new UserRegistered($user));

            return response()->json([
                'status' => 'Account has been updated',
                'user' => $user
            ],200);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);

        $user->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'User has been deleted',
            'user' => $user
        ],200);
    }

    public function login(Request $request){
        $this->validate($request,[
            'email' => 'required|email',
            'password' => 'required|string'
        ]);


        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            $user = Auth::user();

            return response()->json([
                'status' => "success",
                'user' => $user,
            ], 200);
        }
        else{
            return response()->json([
                'status' => 'error',
                'data' => [
                    'message' => 'Unauthorised, no user with that email or password'
                ],
            ], 401);
        }
    }
}
