<?php

namespace App\Http\Controllers;

use App\Models\DigitalCircuit;
use Illuminate\Http\Request;

class DigitalCircuitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('digitalcircuit.index')->with('DigitalCircuits',DigitalCircuit::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DigitalCircuit::create([
            'type' => $request->type,
            'monthly_cost' => $request->monthly_cost,
            'design_type' => $request->design_type,
            'name_circuit' => $request->name_circuit,
            'speed' => $request->speed,
            'location' => $request->location,
         ]);

         session()->flash('status','تم الادخال بنجاح');
         return redirect(route('DigitalCircuit_index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DigitalCircuit  $digitalCircuit
     * @return \Illuminate\Http\Response
     */
    public function show(DigitalCircuit $digitalCircuit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DigitalCircuit  $digitalCircuit
     * @return \Illuminate\Http\Response
     */
    public function edit(DigitalCircuit $digitalCircuit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DigitalCircuit  $digitalCircuit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DigitalCircuit $DigitalCircuit)
    {
       
        $DigitalCircuit->update([
            'type' => $request->type,
            'monthly_cost' => $request->monthly_cost,
            'design_type' => $request->design_type,
            'name_circuit' => $request->name_circuit,
            'speed' => $request->speed,
            'location' => $request->location,
        ]);

        session()->flash('status','تم التعديل بنجاح');
        return redirect(route('DigitalCircuit_index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DigitalCircuit  $digitalCircuit
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DigitalCircuit::destroy($id);

        session()->flash('status','تم الحذف بنجاح');
        return redirect(route('DigitalCircuit_index'));
    }
}
