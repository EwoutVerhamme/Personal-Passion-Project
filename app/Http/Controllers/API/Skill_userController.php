<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Skill;
use App\Models\Skill_user;
use DB;

class Skill_userController extends Controller
{

    public function index()
    {
        // SELECT skill_users.user_id, skills.skill_name, users.first_name, users.last_name FROM users INNER JOIN skill_users ON skill_users.user_id = users.id INNER JOIN skills ON skills.id = skill_users.skill_id
        return response()->json(Skill::get(),200);
    }

    public function matches() {
       // Get current user 
       $user = Auth::user();
       $id = Auth::id();
       //My skills
       $mySkill = DB::table('skill_users')
       ->where('skill_users.user_id', '=',  $id )
       ->join('skills', 'skills.id', '=', 'skill_users.skill_id')
       ->join('users', 'skill_users.user_id', '=', 'users.id')
       ->join('ads', 'ads.skill_id', '=', 'skill_users.skill_id')
       ->where('ads.user_id', '!=',  $id )
       ->select('skill_users.user_id','ads.creator_name', 'ads.creator_img','ads.id','ads.user_id', 'skills.skill_alias', 'ads.date','ads.location', )
       ->get();
       return response()->json($mySkill,200);

    }

    public function getUserWithSkill($name) {
        $users = DB::table('users')
        ->join('skill_users', 'skill_users.user_id', '=', 'users.id')
        ->join('skills', 'skills.id', '=', 'skill_users.skill_id')
        ->select('users.first_name', 'users.last_name', 'skills.skill_name')
        ->where('skill_name', 'like', '%' . $name . '%')
        ->orWhere('first_name', 'like', '%' . $name . '%')
        ->orWhere('last_name', 'like', '%' . $name . '%')
        ->get();

        return response($users, 200);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {


        $data = $request->all();

        $skill_users = Skill_user::create($data);
        $skill_users->save();
  
        return response($skill_users);
    }
}
