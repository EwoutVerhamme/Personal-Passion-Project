<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Skill;

class Skill_userController extends Controller
{
    public function index()
    {
        return response()->json(Skill::get(),200);
    }
}
