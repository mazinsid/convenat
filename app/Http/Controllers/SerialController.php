<?php

namespace App\Http\Controllers;

use App\Models\ptype;
use App\Models\serial;
use App\Models\product;
use App\Models\pmodel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class SerialController extends Controller
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
        return view('serial.index')->with('serials',serial::all())
        ->with('products' , product::all());
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
        serial::create([
            'serial' => $request->serial,
           'ptype_id' => $request->ptype_id, 
           'status' => 1
         ]);
         session()->flash('status','تم الادخال بنجاح');
         return redirect(route('serial_index'));
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
    public function update(Request $request, serial $serial)
    {
        $serial->update([
            'serial' => $request->serial, 
            'ptype_id' => $request->ptype_id, 
            
        ]);

        session()->flash('status','تم التعديل بنجاح');
        return redirect(route('serial_index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        serial::destroy($id);

        session()->flash('status','تم الحذف بنجاح');
        return redirect(route('serial_index'));
    }


    // getProduct to ajax form
public function getType($id)
{
			$ptypes = DB::table('ptypes')->select('id','name')->where('pmodel_id', $id)->get();
			return response()->json( $ptypes );
}

public function getModle($id)
{
			$pmodels = DB::table('pmodels')->select('id','name')->where('products_id', $id)->get();
			return response()->json( $pmodels );
}
public function getSerial($id)
{
			$serials = DB::table('serials')->select('id','serial')->where('ptype_id', $id)->where('status' , 1)->get();
			return response()->json( $serials );
}
}
