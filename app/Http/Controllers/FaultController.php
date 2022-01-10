<?php

namespace App\Http\Controllers;

use App\Models\faults;
use App\Models\landline;
use Illuminate\Http\Request;

class FaultController extends Controller
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
        return view('fualt.index')->with('fualts',faults::all())
        ->with('landlines' , landline::all());
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
        faults::create([
            'landline_id' => $request->landline_id, 
            'reason' => $request->reason, 
            'faults_date' => $request->faults_date, 
            'fixed_date' => $request->fixed_date, 
          ]);

          session()->flash('status','تم الادخال بنجاح');
          return redirect(route('fault_index'));
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
    public function update(Request $request, faults $faults)
    {
        $faults->update([
            'landline_id' => $request->landline_id, 
            'reason' => $request->reason, 
            'faults_date' => $request->faults_date, 
            'fixed_date' => $request->fixed_date, 
          ]);

          session()->flash('status','تم التعديل بنجاح');
          return redirect(route('fault_index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        faults::destroy($id);
        session()->flash('status','تم الحذف بنجاح');
        return redirect(route('fault_index'));
    }
}

