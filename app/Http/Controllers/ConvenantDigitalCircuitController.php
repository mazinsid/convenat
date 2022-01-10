<?php

namespace App\Http\Controllers;

use App\Models\branch;
use App\Models\Convenant_DigitalCircuit;
use App\Models\DigitalCircuit;
use App\Models\employee;
use Illuminate\Http\Request;

class ConvenantDigitalCircuitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('digitalcircuitcovenant.index')
        ->with('covenants' , Convenant_DigitalCircuit::all())
        ->with('branchs' , branch::all())
        ->with('employees' , employee::all())
        ->with('digitalcircuits' , DigitalCircuit::all());
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
        Convenant_DigitalCircuit::create([
            'code' => $request->code, 
            'branch_id' => $request->branch_id,
            'employees_id' => $request->employees_id, 
            'DigitalCircuit_id' => $request->DigitalCircuit_id, 
            'note' => $request->note, 
            'convenant_date' => $request->convenant_date, 
          
          ]);

          session()->flash('status','تم الادخال بنجاح');
          return  redirect(route('DigitalCircuitcovenant_index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Convenant_DigitalCircuit  $convenant_DigitalCircuit
     * @return \Illuminate\Http\Response
     */
    public function show(Convenant_DigitalCircuit $convenant_DigitalCircuit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Convenant_DigitalCircuit  $convenant_DigitalCircuit
     * @return \Illuminate\Http\Response
     */
    public function edit(Convenant_DigitalCircuit $convenant_DigitalCircuit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Convenant_DigitalCircuit  $convenant_DigitalCircuit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Convenant_DigitalCircuit $convenant_DigitalCircuit)
    {
      $convenant_DigitalCircuit([
            'code' => $request->code, 
            'branch_id' => $request->branch_id,
            'employees_id' => $request->employees_id, 
            'DigitalCircuit_id' => $request->DigitalCircuit_id, 
            'note' => $request->note, 
            'convenant_date' => $request->convenant_date, 
          ]);
          session()->flash('status','تم الادخال بنجاح');
          return  redirect(route('digitalcircuitcovenant_index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Convenant_DigitalCircuit  $convenant_DigitalCircuit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Convenant_DigitalCircuit $convenant_DigitalCircuit)
    {
        $convenant_DigitalCircuit->delete();
        session()->flash('status','تم الحذف بنجاح');
        return  redirect(route('phonecovenant_index'));
    }
}
