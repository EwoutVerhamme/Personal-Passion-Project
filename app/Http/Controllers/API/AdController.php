<?php

namespace App\Http\Controllers\API;

use Illuminate\Support\Facades\Request as Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Ad;
use Validator;
use DB;

class AdController extends Controller
{

    // Get all the ads
public function index() {
    $users = DB::table('ads')
    ->join('users', 'users.id', '=', 'ads.user_id')
    ->join('skills', 'skills.id', '=', 'ads.skill_id')
    ->orderBy('created_at', 'desc')
    ->select( 'ads.id', 'ads.creator_img', 'ads.info','ads.date','ads.created_at', 'ads.location',"users.first_name", 'users.last_name', 'users.youth_center', 'skills.skill_name', 'skills.skill_alias')
    ->limit(6)
    ->get();
    return response($users, 200);
}

// Get a specific ad by id
public function getAdById($id) {
    $ad = DB::table('ads')
    ->join('users', 'users.id', '=', 'ads.user_id')
    ->join('skills', 'skills.id', '=', 'ads.skill_id')
    ->select( 'users.id', 'ads.info','ads.date', 'ads.location',"users.first_name", 'users.last_name', 'ads.creator_img', 'users.youth_center', 'skills.skill_name', 'skills.skill_alias')
    ->where('ads.id', '=', $id )
    ->get();
    return response($ad, 200);
}

// Get ads searched on name, skill_name and skill_alias
public function getUserWithAds($ad_name) {
    $users = DB::table('ads')
    ->join('users', 'users.id', '=', 'ads.user_id')
    ->join('skills', 'skills.id', '=', 'ads.skill_id')
    ->orderBy('created_at', 'desc')
    ->select( 'ads.id', 'ads.info','ads.date', 'ads.location','ads.created_at',"users.first_name", 'users.last_name', 'ads.creator_img', 'users.youth_center', 'skills.skill_name', 'skills.skill_alias')
    ->orWhere('skill_name', 'like', '%' . $ad_name . '%')
    ->orWhere('skill_alias', 'like', '%' . $ad_name . '%')
    ->orWhere('first_name', 'like', '%' . $ad_name . '%')
    ->get();

    return response($users, 200);
}

// Get personal ads
public function getMyAds($id) {
    $ads = DB::table('ads')
    ->join('users', 'users.id', '=', 'ads.user_id')
    ->join('skills', 'skills.id', '=', 'ads.skill_id')
    ->select( 'ads.id', 'ads.info','ads.date', 'ads.location',"users.first_name", 'users.last_name', 'users.profilepic', 'users.youth_center', 'skills.skill_name', 'skills.skill_alias')
    ->where('ads.user_id', '=',  $id )
    ->get();
    return response($ads, 200);
}

// Delete an ad with his id
public function deleteAdById($id) {
    $userId = Auth::id();

    $deleteAd = DB::table('ads')
    ->where('ads.id', '=', $id )
    ->where('ads.user_id', '=', $userId )
    ->delete();
    return response([$deleteAd, "Succesfully deleted ad with id $id"]);
}

/**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

     // Create an ad
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
