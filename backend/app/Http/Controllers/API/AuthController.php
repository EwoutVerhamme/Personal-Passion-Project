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


    public function index($name) {

        return response()->json(Skill::where('name', $name)
        ->orWhere('name', 'like', '%' . $name . '%')->get());

    }
    public function getAll() {

        // return BookResource::collection(Book::with('ratings')->paginate(25));

        $fetchedUsers = DB::table('users')->get();
    
        $users = array();

        foreach ($fetchedUsers as $userId => $user) {
            $fetchedSkillByUserId = DB::table('skills')->where('user_id', $user->id)->get('skill_name');
            $myObj = new \stdClass();
            $myObj = $user;
            $myObj->skills = $fetchedSkillByUserId;
            array_push($users, $myObj);
        }
        

        return response($users, 201);
    }

    public function getAllWithSkill($skill_name){

        // SELECT * FROM users INNER JOIN skills ON users.id = skills.user_id

        $fetchedUsers = DB::table('users')->join("skills", "users.id" , "skills.user_id")->orWhere('skill_name', 'like', '%' . $skill_name . '%')->get();
    
        // $users = array();

        // foreach ($fetchedUsers as $userId => $user) {
        //     $fetchedSkillByUserId = DB::table('skills')->where('user_id', $user->id)->get('skill_name');
        //     $myObj = new \stdClass();
        //     $myObj = $user;
        //     $myObj->skills = $fetchedSkillByUserId;
        //     array_push($users, $myObj);
        // }
        

        return response($fetchedUsers, 201);

        // return response($users::where('skill_name', $skill_name)
        // ->orWhere('skill_name', 'like', '%' . $skill_name . '%'));

    }

    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'email|required|unique:users',
            'password' => 'required'
        ]);

        $validatedData['password'] = Hash::make($request->password);

        $user = User::create($validatedData);

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