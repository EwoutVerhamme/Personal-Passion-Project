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
       // Get all engagements with that skills
       $matches = DB::table('skill_users')
       ->join('users', 'skill_users.user_id', '=', $id)
    //    ->select('users.first_name', 'users.youth_center')
       ->get();

       return response()->json($matches,200);

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
