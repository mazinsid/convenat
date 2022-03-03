<?php

namespace App\Http\Controllers;

use App\Models\employee;
use App\Models\provider;
use App\Models\simcard;
use Illuminate\Http\Request;

class SimcardController extends Controller
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
        return view('simcard.index')->with('simcards',simcard::all())->with('providers',provider::all());
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
        simcard::create([
            'serial' => $request->serial,
            'phone' => $request->phone, 
            'status' => $request->status, 
            'type' => $request->type, 

            'provider_id' => $request->provider_id, 
          ]);
          session()->flash('status','تم الادخال بنجاح');
          return redirect(route('simcard_index'));
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
    public function update(Request $request, simcard $simcard)
    {
        {
            $simcard->update([
                'serial' => $request->serial, //This Code coming from ajax request
                'phone' => $request->phone, //This phone coming from ajax request
                'status' => $request->status, //This status coming from ajax request
                'type' => $request->type, 

                'employee_id' => $request->employee_id, //This employee_id coming from ajax request
                'acceptance' => $request->acceptance, //This acceptance coming from ajax request
                
            ]);
            session()->flash('status','تم التعديل بنجاح');
            return redirect(route('simcard_index'));
        }
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        simcard::destroy($id);
        session()->flash('status','تم الحذف بنجاح');
        return redirect(route('simcard_index'));
    }
}
