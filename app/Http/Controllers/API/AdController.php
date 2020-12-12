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
    ->select( 'ads.id', 'ads.creator_img', 'ads.info','ads.date', 'ads.location',"users.first_name", 'users.last_name', 'users.youth_center', 'skills.skill_name', 'skills.skill_alias')
    ->get();
    return response($users, 200);
}

public function getAdById($id) {
    $ad = DB::table('ads')
    ->join('users', 'users.id', '=', 'ads.user_id')
    ->join('skills', 'skills.id', '=', 'ads.skill_id')
    ->select( 'users.id', 'ads.info','ads.date', 'ads.location',"users.first_name", 'users.last_name', 'ads.creator_img', 'users.youth_center', 'skills.skill_name', 'skills.skill_alias')
    ->where('ads.id', '=', $id )
    ->get();


    return response($ad, 200);
}


public function getUserWithAds($ad_name) {

    $users = DB::table('ads')
    ->join('users', 'users.id', '=', 'ads.user_id')
    ->join('skills', 'skills.id', '=', 'ads.skill_id')
    ->select( 'ads.id', 'ads.info','ads.date', 'ads.location',"users.first_name", 'users.last_name', 'ads.creator_img', 'users.youth_center', 'skills.skill_name', 'skills.skill_alias')
    ->orWhere('skill_name', 'like', '%' . $ad_name . '%')
    ->orWhere('first_name', 'like', '%' . $ad_name . '%')
    ->get();


    return response($users, 200);
}

public function getMyAds($id) {
    $ads = DB::table('ads')
    ->join('users', 'users.id', '=', 'ads.user_id')
    ->join('skills', 'skills.id', '=', 'ads.skill_id')
    ->select( 'ads.id', 'ads.info','ads.date', 'ads.location', 'ads.image',"users.first_name", 'users.last_name', 'users.profilepic', 'users.youth_center', 'skills.skill_name', 'skills.skill_alias')
    ->where('ads.user_id', '=',  $id )
    ->get();
    return response($ads, 200);
}


public function deleteAdById($id) {
    $deleteAd = DB::table('ads')
    ->where('ads.id', '=', $id )
    ->delete();


    return response([$deleteAd, "Succesfully deleted ad with id $id"]);
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
