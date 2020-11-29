<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AllSkill;
use DB;

class AllSkillController extends Controller
{
    public function index() {
        $getAllSkills = DB::table("all_skills")->get();
        return response($getAllSkills, 201);
    }

    public function getSkill($name) {
        return response()->json(AllSkill::where('name', $name)
        ->orWhere('name', 'like', '%' . $name . '%')->get());
    }
}
