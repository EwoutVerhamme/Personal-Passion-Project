<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Skill;
use Illuminate\Support\Facades\Hash;
use DB;



class AuthController extends Controller
{

    public function getAll() {
        $users = DB::table('users')->get();
        return response($users, 201);
    }

    public function getAllWithSkill($skill_name){

        // SELECT * FROM users INNER JOIN skills ON users.id = skills.user_id

        $fetchedUsers = DB::table('users')
        ->join("skills", "users.id" , "skills.user_id")
        ->where('first_name', 'like', '%' . $skill_name . '%')
        ->orWhere('skill_name', 'like', '%' . $skill_name . '%')->get();

        return response($fetchedUsers, 201);

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
        $filePath = "storage/app/$file";

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