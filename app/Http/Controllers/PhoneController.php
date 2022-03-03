<?php

namespace App\Http\Controllers;

use App\Models\device_phone;
use App\Models\phone;
use Illuminate\Http\Request;

class PhoneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('phone.index')->with('phones' , phone::all())->with('deviecs',device_phone::all());
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
        phone::create([
            'serial' => $request->serial,
            'type' => $request->type,
            'mobile_number' => $request->mobile_number,
            'mobile_features' => $request->mobile_features,
            'device_phone_id' => $request->device_phone_id,
         ]);

         session()->flash('status','تم الادخال بنجاح');
         return redirect(route('phone_index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\phone  $phone
     * @return \Illuminate\Http\Response
     */
    public function show(phone $phone)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\phone  $phone
     * @return \Illuminate\Http\Response
     */
    public function edit(phone $phone)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\phone  $phone
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, phone $phone)
    {
      
        $phone->update([
            'serial' => $request->serial,
            'type' => $request->type,
            'mobile_number' => $request->mobile_number,
            'mobile_features' => $request->mobile_features,
            'device_phone_id' => $request->device_phone_id,
        ]);
        session()->flash('status','تم التعديل بنجاح');
        return redirect(route('phone_index'));
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\phone  $phone
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        phone::destroy($id);
        session()->flash('status','تم الحذف بنجاح');
        return redirect(route('phone_index'));
    }
}
