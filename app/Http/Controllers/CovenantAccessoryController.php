<?php

namespace App\Http\Controllers;

use App\Models\covenant_accessory;
use Illuminate\Http\Request;

class CovenantAccessoryController extends Controller
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
        //
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
        covenant_accessory::create([
            'covenans_id' => $request->covenans_id, 
            'accessories_id' => $request->accessories_id, 
          ]);
          session()->flash('status','تم الادخال بنجاح');
        return  redirect(route('CovenantAccessory' , $request->covenans_id));
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
    public function update(Request $request, covenant_accessory $covenant_accessory)
    {
        $covenant_accessory->update([
            'name' => $request->covenans_id, 
            'products_id' => $request->accessories_id,
        ]);
        session()->flash('status','تم التعديل بنجاح');
        return  redirect(route('CovenantAccessory' , $request->covenans_id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,$covenans_id)
    {
        covenant_accessory::destroy($id);
        session()->flash('status','تم الحذف بنجاح');
        return redirect(route('CovenantAccessory' , $covenans_id));
    }
}
