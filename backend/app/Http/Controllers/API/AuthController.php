<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use DB;



class AuthController extends Controller
{

    public function getAll() {

        // return BookResource::collection(Book::with('ratings')->paginate(25));

        return response()->json(User::get(),200);

    }

    public function getWithSkill(){

        $fetchedUsers = DB::table('users')->get();
    
        $users = [];

        foreach ($fetchedUsers as $userId => $user) {
            $fetchedSkillByUserId = DB::table('skills')->where('user_id', $user->id)->get('name');
            $myObj = new \stdClass();
            $myObj = $user;
            $myObj->skills = $fetchedSkillByUserId;
            array_push($users, $myObj);
        }
        
        // $users = DB::table('users')
        //     ->join('skills', 'users.id', '=', 'skills.user_id')
        //     ->get();

        // return BookResource::collection(Book::with('ratings')->paginate(25));
        // return response()->json($users);
        return response($users, 201);

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