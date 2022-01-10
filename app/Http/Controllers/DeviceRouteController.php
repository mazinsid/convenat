<?php

namespace App\Http\Controllers;

use App\Models\device_route;
use Illuminate\Http\Request;

class DeviceRouteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('route.index')->with('devices_route' , device_route::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        device_route::create([
            'type' => $request->type,
            'model' => $request->model,
            'version' => $request->version,
         ]);

         session()->flash('status','تم الادخال بنجاح');
         return redirect(route('DeviceRoute_index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\device_route  $device_route
     * @return \Illuminate\Http\Response
     */
    public function show(device_route $device_route)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\device_route  $device_route
     * @return \Illuminate\Http\Response
     */
    public function edit(device_route $device_route)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\device_route  $device_route
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, device_route $device_route)
    {
       $device_route->update([
            'type' => $request->type,
            'model' => $request->model,
            'version' => $request->version,
         ]);

         session()->flash('status','تم التعديل بنجاح');
         return redirect(route('DeviceRoute_index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\device_route  $device_route
     * @return \Illuminate\Http\Response
     */
    public function destroy(device_route $device_route)
    {
        $device_route->delete();
        session()->flash('status','تم الحذف بنجاح');
        return redirect(route('DeviceRoute_index'));
    }
}
