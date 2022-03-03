<?php

namespace App\Http\Controllers;

use App\Models\CovenantSimCard;
use App\Models\region;
use App\Models\simcard;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CovenantSimCardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('covenant_sim_card.index')->with('CovenantSimCards' , CovenantSimCard::all());
    }


      /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $year = Carbon::now()->format('ymd');
        $pur_id = CovenantSimCard::select('id')->orderBy('created_at','asc')->first();

        if($pur_id==null)
         {
             $pur_id='1';

             $code  = '24'.$year.$pur_id;
         }

         else
         {
            $pur_id->id;

            $pur_id =$pur_id->id+1;

            $code = '23'.$year.$pur_id;
         }

         return view('covenant_sim_card.create') ->with('regions',region::all())
         ->with('simcards',simcard::all())->with('code' ,$code);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        CovenantSimCard::create([
            'simcards_id' => $request->simcards_id,
            'department_id' => $request->department_id,
            'acceptance_date' => $request->acceptance_date,
            'note' => $request->note,
            'code_number' => $request->code_number,
        ]);

        session()->flash('status','تم الادخال بنجاح');
        return redirect(route('CovenantSimCards_index'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CovenantSimCard  $CovenantSimCard
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CovenantSimCard $CovenantSimCard)
    {
        $CovenantSimCard->update([
            'simcards_id' => $request->simcards_id,
            'department_id' => $request->department_id,
            'acceptance_date' => $request->acceptance_date,
            'note' => $request->note,
            'code_number' => $request->code_number,
        ]);

        session()->flash('status','تم التعديل بنجاح');
        return redirect(route('CovenantSimCard_index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CovenantSimCard  $CovenantSimCard
     * @return \Illuminate\Http\Response
     */
    public function destroy(CovenantSimCard $CovenantSimCard)
    {
        $CovenantSimCard->delete();
        session()->flash('status','تم الحذف بنجاح');
        return redirect(route('CovenantSimCard_index'));
    }
}
