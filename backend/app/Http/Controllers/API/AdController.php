<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ad;
use DB;
use Illuminate\Support\Facades\Request as Requests;
use Validator;

class AdController extends Controller
{
public function index() {

    $users = DB::table('ads')
    ->join('users', 'users.id', '=', 'ads.user_id')
    ->join('skills', 'skills.id', '=', 'ads.skill_id')
    ->select('ads.id','ads.title', 'ads.location', 'ads.date','users.first_name', 'users.last_name', 'skills.skill_name')
    ->get();

    return response($users, 200);
}

public function getUserWithAds($ad_name) {

    //SELECT ads.title, ads.location, ads.date, users.first_name, users.last_name, skills.skill_name FROM ads INNER JOIN users ON users.id = ads.user_id INNER JOIN skills ON skills.id = ads.skill_id
    $users = DB::table('ads')
    ->join('users', 'users.id', '=', 'ads.user_id')
    ->join('skills', 'skills.id', '=', 'ads.skill_id')
    ->select('ads.id','ads.title', 'ads.location', 'ads.date','users.first_name', 'users.last_name', 'skills.skill_name')
    ->where('skill_name', 'like', '%' . $ad_name . '%')
    ->orWhere('first_name', 'like', '%' . $ad_name . '%')
    ->orWhere('last_name', 'like', '%' . $ad_name . '%')
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

    $validator = Validator::make($data, [
                'title' => 'required|max:60',
                'info' => 'required|max:255',
            ]);

        if ($validator->fails()) {          
      return response()->json(['error'=>$validator->errors()], 401);                        
   }  


      
      //store your file into database
      $ad = Ad::create($data);
      $ad->save();

      return response($ad);
}

}
