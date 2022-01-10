<?php

namespace App\Http\Controllers;

use App\Models\branch;
use App\Models\landline;
use App\Models\landline_covenant;
use Illuminate\Http\Request;

class LandlineCovenantController extends Controller
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
        return view('landlinecovenant.index')
        ->with('landlineconvenants',landline_covenant::all())
        ->with('branches' ,branch::all())->with('landlines' ,landline::all());
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
        landline_covenant::create([
            'branches_id' => $request->branches_id,
           'landlines_id' => $request->landlines_id, 
           'acceptance_date' => $request->acceptance_date, 
           'note' => $request->note, 
           'code_number' => $request->code_number, 
         ]);

         session()->flash('status','تم الادخال بنجاح');
         return redirect(route('LandlineCovenant_index'));
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
    public function update(Request $request, landline_covenant $landline_covenant)
    {
        $landline_covenant->update([
            'branches_id' => $request->branches_id,
           'landlines_id' => $request->landlines_id, 
           'acceptance_date' => $request->acceptance_date, 
           'note' => $request->note, 
           'code_number' => $request->code_number, 
         ]);

         session()->flash('status','تم التعديل بنجاح');
         return redirect(route('LandlineCovenant_index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        landline_covenant::destroy($id);
        session()->flash('status','تم الحذف بنجاح');
        return redirect(route('LandlineCovenant_index'));
    }
}
