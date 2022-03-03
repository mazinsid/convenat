<?php

namespace App\Http\Controllers;

use App\Models\convenant_phone;
use App\Models\device_phone;
use App\Models\phone;
use App\Models\region;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ConvenantPhoneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('phonecovenant.index')->with('covenants' , convenant_phone::all())
        ->with('phones' , phone::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $year = Carbon::now()->format('ymd');
        $pur_id = convenant_phone::select('id')->orderBy('created_at','asc')->first();

        if($pur_id==null)
         {
             $pur_id='1';

             $code  = '21'.$year.$pur_id;
         }

         else
         {
            $pur_id->id;

            $pur_id =$pur_id->id+1;

            $code = '21'.$year.$pur_id;
         }

         return view('phonecovenant.create')
         ->with('regions',region::all())->
         with('device_phones',device_phone::all())->with('code' ,$code);
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
            'code' => $request->code, 
            'employees_id' => $request->employees_id, 
            'serial' => $request->serial,
            'device_phone_id' => $request->device_phone_id, 
            'note' => $request->note, 
            'convenant_date' => $request->convenant_date, 
          
          ]);

          DB::update('update phones set status = 0 where id = ?', [$request->device_phone_id]);

          session()->flash('status','تم الادخال بنجاح');
          return  redirect(route('phonecovenant_index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\convenant_phone  $convenant_phone
     * @return \Illuminate\Http\Response
     */
    public function show(convenant_phone $convenant_phone)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\convenant_phone  $convenant_phone
     * @return \Illuminate\Http\Response
     */
    public function edit(convenant_phone $convenant_phone)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\convenant_phone  $convenant_phone
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, convenant_phone $convenant_phone)
    {
        $convenant_phone->update([
            'code' => $request->code, 
            'employees_id' => $request->employees_id, 
            'serial' => $request->serial,
            'device_phone_id' => $request->device_phone_id, 
            'note' => $request->note, 
            'convenant_date' => $request->convenant_date, 
          
          ]);
        session()->flash('status','تم التعديل بنجاح');
        return  redirect(route('phonecovenant_index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\convenant_phone  $convenant_phone
     * @return \Illuminate\Http\Response
     */
    public function destroy(convenant_phone $convenant_phone)
    {
        $convenant_phone->delete();
        session()->flash('status','تم الحذف بنجاح');
        return  redirect(route('phonecovenant_index'));
    }

    public function getPhoneSerial($id)

    {
			$serials = DB::table('phones')->select('id','serial')->where('device_phone_id', $id)->where('status' , 1)->get();
        	return response()->json( $serials );
                }

}
