<?php

namespace App\Http\Controllers;

use App\Models\covenant;
use App\Models\employee;
use App\Models\return_covenant;
use App\Models\serial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReturnCovenantController extends Controller
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
        return view('returncovenant.index')->with('returncovenants' , return_covenant::all())
        ->with('employees' , employee::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $covenants = covenant::all()->
        where('code_number' , $request->code_number);
        if($covenants->isNotEmpty())
        {
            foreach($covenants as $covenant)
            {
                $date = $covenant;
            }
            return view('returncovenant.create')->
            with('covenant',$date); 
        }
        else
        {
            session()->flash('status','لا يوجد الرجاء التاكد من كود العهدة');
            return redirect(route('return_index'));
        }
     
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
     
        return_covenant::create([
            'covenans_id' => $request->covenans_id, 
            'code_number' => $request->code_number, 
            'employees_id' => $request->employees_id, 
            'serials_id' => $request->serials_id, 
            'return_date' => $request->return_date,
          ]);
          session()->flash('status','تم الادخال بنجاح');
          return redirect(route('return_index'));
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
    public function update(Request $request, return_covenant $return_covenant)
    {
        $return_covenant->update([
            'covenans_id' => $request->covenans_id, 
            'code_number' => $request->code_number, 
            'employees_id' => $request->employees_id, 
            'serials_id' => $request->serials_id, 
            'return_date' => $request->return_date,
          ]);
          DB::update('update serials set status = 1 where id = ?', [$request->serials_id]);

        session()->flash('status','تم التعديل بنجاح');
          return redirect(route('return_index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return_covenant::destroy($id);

        session()->flash('status','تم الحذف بنجاح');
         return redirect(route('return_index'));
    }


    public function getSerial($id)
{
            $serialsc = DB::table('covenants')->select('serials_id')->where('employees_id', $id)->get();
            foreach($serialsc as $serial)
            {
                $ser_id = $serial->serials_id ;
            }
            $serials = serial::all()->where('id' , $ser_id);
			return response()->json( $serials );
}


public function getCovenans($id)
{
    
            $covenantss = covenant::all()->where('serials_id' , $id);
            foreach($covenantss as $covenants)
            {
                $covenant = $covenants ;
            }
            dd($covenant);
			// return response()->json( $covenant );
}

   
}
