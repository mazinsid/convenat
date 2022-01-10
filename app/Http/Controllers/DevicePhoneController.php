<?php

namespace App\Http\Controllers;

use App\Models\device_phone;
use Illuminate\Http\Request;

class DevicePhoneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('devicephone.index')->with('device_phones',device_phone::all());
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
        device_phone::create([
            'type_phone' => $request->type_phone,
            'phone_model' => $request->phone_model,
            'release_date' => $request->release_date,
         ]);

         session()->flash('status','تم الادخال بنجاح');
         return redirect(route('DevicePhone_index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\device_phone  $device_phone
     * @return \Illuminate\Http\Response
     */
    public function show(device_phone $device_phone)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\device_phone  $device_phone
     * @return \Illuminate\Http\Response
     */
    public function edit(device_phone $device_phone)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\device_phone  $device_phone
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, device_phone $device_phone)
    {
        $device_phone->update([
            'type_phone' => $request->type_phone,
            'phone_model' => $request->phone_model,
            'release_date' => $request->release_date,
        ]);
        session()->flash('status','تم التعديل بنجاح');
        return redirect(route('DevicePhone_index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\device_phone  $device_phone
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        device_phone::destroy($id);
        session()->flash('status','تم الحذف بنجاح');
        return redirect(route('DevicePhone_index'));
    }
}
