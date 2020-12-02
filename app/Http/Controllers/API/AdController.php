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

    // $users = DB::table('ads')
    // ->join('users', 'users.id', '=', 'ads.user_id')
    // ->join('skills', 'skills.id', '=', 'ads.skill_id')
    // ->select('ads.id','ads.title', 'ads.location', 'ads.date', 'ads.image','users.first_name', 'users.last_name', 'skills.skill_name')
    // ->get();

    $users = DB::table('ads')
    ->join('users', 'users.id', '=', 'ads.user_id')
    ->join('skill_users', 'users.id', '=', 'skill_users.user_id')
    ->join('skills', 'skills.id', '=', 'skill_users.skill_id')
    ->select( 'ads.id','ads.title', 'ads.info','ads.date', 'ads.location', 'ads.image',"users.first_name", 'users.last_name', 'users.profilepic', 'users.youth_center', 'skills.skill_name', 'skills.skill_alias')
    ->get();
    return response($users, 200);
}

public function getUserWithAds($ad_name) {

    //SELECT ads.title, ads.location, ads.date, users.first_name, users.last_name, skills.skill_name FROM ads INNER JOIN users ON users.id = ads.user_id INNER JOIN skills ON skills.id = ads.skill_id
    $users = DB::table('ads')
    ->join('users', 'users.id', '=', 'ads.user_id')
    ->join('skill_users', 'users.id', '=', 'skill_users.user_id')
    ->join('skills', 'skills.id', '=', 'skill_users.skill_id')
    ->select( 'ads.id','ads.title', 'ads.info','ads.date', 'ads.location', 'ads.image',"users.first_name", 'users.last_name', 'users.profilepic', 'users.youth_center', 'skills.skill_name', 'skills.skill_alias')
    ->orWhere('skill_name', 'like', '%' . $ad_name . '%')
    ->orWhere('first_name', 'like', '%' . $ad_name . '%')
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
                'image' => 'required|image:jpeg,png,jpg,gif,svg|max:2048',
            ]);

        if ($validator->fails()) {          
      return response()->json(['error'=>$validator->errors()], 401);                        
   }  

   $file = $request->image->store('public/ads');
   $filePath = "storage/app/$file" ;
      
      //store your file into database
      $ad = Ad::create($data);
      $ad->image = $filePath;
      $ad->save();

      return response($ad);
}

}
