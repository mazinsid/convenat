<?php

namespace App\Http\Controllers;

use App\Models\convenant_phone;
use App\Models\return_phone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReturnPhoneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('returnphone.index')->with('covenants' , convenant_phone::all())
        ->with('returns' , return_phone::class);
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
        convenant_phone::create([
            'convenant_phone_id' => $request->convenant_phone_id, 
            'code' => $request->code, 
            'note' => $request->note,  
            'return_date' => $request->return_date,
               ]);

          DB::update('update phones set status = 1 where id = ?', [$request->convenant_phone_id]);

          session()->flash('status','تم الادخال بنجاح');
          return  redirect(route('returnphone_index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\return_phone  $return_phone
     * @return \Illuminate\Http\Response
     */
    public function show(return_phone $return_phone)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\return_phone  $return_phone
     * @return \Illuminate\Http\Response
     */
    public function edit(return_phone $return_phone)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\return_phone  $return_phone
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, return_phone $return_phone)
    {
        $return_phone->update([
            'convenant_phone_id' => $request->convenant_phone_id, 
            'code' => $request->code, 
            'note' => $request->note,  
            'return_date' => $request->return_date,     
          ]);
        session()->flash('status','تم التعديل بنجاح');
        return  redirect(route('returncovenant_index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\return_phone  $return_phone
     * @return \Illuminate\Http\Response
     */
    public function destroy(return_phone $return_phone)
    {
        $return_phone->delete();
        session()->flash('status','تم الحذف بنجاح');
        return  redirect(route('returncovenant_index'));
    }
}
