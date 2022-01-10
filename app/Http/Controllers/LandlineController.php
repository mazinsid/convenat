<?php

namespace App\Http\Controllers;

use App\Models\landline;
use App\Models\provider;
use Illuminate\Http\Request;

class LandlineController extends Controller
{
    public function __construct()
          {
              $this->middleware('auth');
          }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('landline.index')->with('landlines',landline::all())->with('providers',provider::all());
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
        landline::create([
            'land_type' => $request->land_type, 
            'properties' => $request->properties, 
            'uses' => $request->uses, 
            'serial' => $request->serial, 
            'circle_number' => $request->circle_number, 
            'cab_number' => $request->cab_number, 
            'circuit_type' => $request->circuit_type, 
            'circuit_speed' => $request->circuit_speed, 
            'providers_id' => $request->providers_id, 
            'landline_expiry_date' => $request->landline_expiry_date, 
             ]);
             session()->flash('status','تم الادخال بنجاح');
             return redirect(route('landline_index'));
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, landline $landline)
    {
        $landline->update([
            'land_type' => $request->land_type, 
            'properties' => $request->properties, 
            'uses' => $request->uses, 
            'serial' => $request->serial, 
            'circle_number' => $request->circle_number, 
            'cab_number' => $request->cab_number, 
            'circuit_type' => $request->circuit_type, 
            'circuit_speed' => $request->circuit_speed, 
            'providers_id' => $request->providers_id, 
            'landline_expiry_date' => $request->landline_expiry_date, 
        ]);
        session()->flash('status','تم التعديل بنجاح');
        return redirect(route('landline_index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        landline::destroy($id);
        session()->flash('status','تم الحذف بنجاح');
        return redirect(route('landline_index'));
    }
}
