<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Skill;
use DB;

class Skill_userController extends Controller
{

    // public function index() {
    //     $getAllSkills = DB::table("all_skills")->get();
    //     return response($getAllSkills, 201);
    // }

    // public function getSkill($name) {
    //     return response()->json(AllSkill::where('name', $name)
    //     ->orWhere('name', 'like', '%' . $name . '%')->get());
    // }

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
       ->select('ads.id','ads.user_id', 'skills.skill_alias', 'ads.date','ads.location', )
       ->get();
       // Get all engagements with that skills
       $matches = DB::table('ads')
       ->join('users', 'users.id', '=', 'ads.user_id')
       ->join('skills', 'skills.id', '=', 'ads.skill_id')
       ->select( 'ads.id', 'ads.title', 'ads.info','ads.date', 'ads.location', 'ads.image',"users.first_name", 'users.last_name', 'users.profilepic', 'users.youth_center', 'skills.skill_name', 'skills.skill_alias')
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
}
