<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\YouthCenter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\YouthCenterResource;

class YouthCenterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $youthcenters = YouthCenter::all();
        return response([ 'youth_centers' => YouthCenterResource::collection($youthcenters), 'message' => 'Retrieved successfully'], 200);
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
        ]);

        if ($validator->fails()) {
            return response(['error' => $validator->errors(), 'Validation Error']);
        }

        $youthcenter = YouthCenter::create($data);

        return response(['youth_center' => new YouthCenterResource($youthcenter), 'message' => 'Created successfully'], 201);
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\YouthCenter  $youthCenter
     * @return \Illuminate\Http\Response
     */
    public function show(YouthCenter $youthCenter)
    {
        return response(['youth_center' => new YouthCenterResource($youthCenter), 'message' => 'Retrieved successfully'], 200);
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
