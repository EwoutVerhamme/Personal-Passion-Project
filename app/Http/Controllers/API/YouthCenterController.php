<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\YouthCenter;
use Illuminate\Support\Facades\Request as Requests;
use Illuminate\Http\Request;
use App\Http\Resources\YouthCenterResource;
use Validator;
use DB;

class YouthCenterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($name)
    {
        return response()->json(YouthCenter::where('name', $name)
        ->orWhere('name', 'like', '%' . $name . '%')->get());


       
  }

  public function getAll()
    { 
        $youth_centers = DB::table('youth_centers')
        ->limit(6)
        ->get();
        return response($youth_centers, 201);
  }

  public function getYouthCenterById($id)
  { 
      $youthCenterId = DB::table('youth_centers')
      ->where('youth_centers.id', '=',  $id)
      ->get();
      return response($youthCenterId, 201);
}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    $data = $request->all();

    $validator = Validator::make($data, [
                'name' => 'required|max:90',
                'image' => 'required|image:jpeg,png,jpg,gif,svg|max:2048',
            ]);

        if ($validator->fails()) {          
      return response()->json(['error'=>$validator->errors()], 401);                        
   }  


       
      //store file into document folder
      $file = $request->image->store('public/youth_centers');
      $filePath = "storage/app/$file" ;
      $name = $request->name;
      
      //store your file into database
      $youthCenter = YouthCenter::create($data);
      $youthCenter->name = $name;
      $youthCenter->profilepic = $filePath;
      $youthCenter->save();

      return response($youthCenter);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\YouthCenter  $youthCenter
     * @return \Illuminate\Http\Response
     */
    public function show(YouthCenter $youthCenter)
    {
        
        return response(new YouthCenterResource($youthCenter));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\YouthCenter  $youthCenter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, YouthCenter $youthCenter)
    {
        $youthCenter->update($request->all());

        return response(['youth_center' => new ProjectResource($youthCenter), 'message' => 'Update successfully'], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\YouthCenter  $youthCenter
     * @return \Illuminate\Http\Response
     */
    public function destroy(YouthCenter $youthCenter)
    {
        $youthCenter->delete();

        return response(['message' => 'Deleted']);
    }
}
