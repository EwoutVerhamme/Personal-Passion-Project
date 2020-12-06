<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Skill;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use DB;



class AuthController extends Controller
{
    public function getById($id) {
        $usersById = DB::table('users')
        ->select('users.id', 'users.first_name', 'users.last_name', 'users.profilepic', 'users.youth_center')
        ->where('id', 'like', '%' . $id . '%')
        ->get();
        return response($usersById, 201);
    }

    public function getAll() {
        $users = DB::table('users')->limit(3)->get();
        return response($users, 201);
    }

    public function getUserWithSkill($name) {
        $users = DB::table('users')
        ->join('skill_users', 'skill_users.user_id', '=', 'users.id')
        ->join('skills', 'skills.id', '=', 'skill_users.skill_id')
    ->select('users.first_name', 'users.last_name', 'skills.skill_name', 'skills.skill_alias', 'users.profilepic')
        ->where('skill_name', 'like', '%' . $name . '%')
        ->orWhere('first_name', 'like', '%' . $name . '%')
        ->orWhere('last_name', 'like', '%' . $name . '%')
        ->get();


        return response($users, 200);
    }


    public function register(Request $request)
    {

        $data = $request->all();


        $registerData = $request->validate([
            'email' => 'email|required|unique:users',
            'password' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'profilepic' => 'required|image:jpeg,png,jpg,gif,svg|max:2048',
            'sex' => 'required',
            'town' => 'required',
            'youth_center' => 'required',
            
        ]);

        $registerData['password'] = Hash::make($request->password);

        //store file into document folder
        $file = $request->profilepic->store('public/users');
        $filePath = "/storage/app/$file";

        //store your file into database
        $user = User::create($registerData);
        $user->profilepic = $filePath;
        $user->save();





        $accessToken = $user->createToken('authToken')->accessToken;

        return response([$user, 'access_token' => $accessToken], 201);
    }

    public function login(Request $request)
    {
        $loginData = $request->validate([
            'email' => 'email|required',
            'password' => 'required'
        ]);

        if (!auth()->attempt($loginData)) {
            return response(['message' => 'This User does not exist, check your details'], 400);
        }

        $accessToken = auth()->user()->createToken('authToken')->accessToken;

        return response(['user' => auth()->user(), 'access_token' => $accessToken]);
    }
}