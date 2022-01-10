<?php

namespace App\Http\Controllers;

use App\Models\accessory;
use App\Models\covenant;
use App\Models\covenant_accessory;
use App\Models\department;
use App\Models\employee;
use App\Models\last_covenant;
use App\Models\product;
use App\Models\ptype;
use App\Models\region;
use App\Models\serial;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function PHPSTORM_META\type;

class CovenantController extends Controller
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
     
        //  dd($code);
        return view('covenant.index')->with('covenants' , covenant::all())
        ->with('ptypes' , ptype::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   $year = Carbon::now()->format('ymd');
        $pur_id = covenant::select('id')->orderBy('created_at','asc')->first();

        if($pur_id==null)
         {
             $pur_id='1';

             $code  = '11'.$year.$pur_id;
         }

         else
         {
            $pur_id->id;

            $pur_id =$pur_id->id+1;

            $code = '11'.$year.$pur_id;
         }

        return view('covenant.create')
        ->with('regions',region::all())->with('products',product::all())->with('code' ,$code);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        covenant::create([
            'employees_id' => $request->employees_id, 
            'ptypes_id' => $request->ptypes_id, 
            'serials_id' => $request->serials_id,
            'acceptance' => $request->acceptance, 
            'code_number' => $request->code_number, 
            'plate_number' => $request->plate_number, 
            'vehicle_type' => $request->vehicle_type, 
            'call_code' => $request->call_code, 
            'call_number' => $request->call_number, 
            'note' => $request->note, 
          ]);

          DB::update('update serials set status = 0 where id = ?', [$request->serials_id]);
              
          $covenats = DB::table('covenants')->select('id')->latest()->get();
          foreach($covenats as $covenat)
          {
              $covenant_id = $covenat->id ;
          }
          last_covenant::create([
            'covenans_id' => $covenant_id , 
            'employees_id'=> $request->employees_id ,
            'serials_id'  => $request->serials_id ,
            'acceptance' => $request->acceptance,
          ]);

          session()->flash('status','تم الادخال بنجاح');
        return  redirect(route('covenant_index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //  show accesstort
    public function CovenantAccessory($id)
    {
        $type_ids = DB::table('covenants')->select('ptypes_id')->where('id', $id)->get();

        foreach($type_ids as $key => $type_id){

        $type = $type_id->ptypes_id;
        }
      

        return view('covenant.CovenantAccessory')->with('id' , $id)
        ->with('accessories' ,accessory::all()->where('ptype_id',$type))
        ->with('covenant_accessores' , covenant_accessory::all()->where('covenans_id' ,$id));
    }
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
    public function update(Request $request, covenant $covenant)
    {
        $covenant->update([
            'employees_id' => $request->employees_id,
            'ptypes_id' => $request->ptypes_id,
            'serials_id' => $request->serials_id,
            'acceptance' => $request->acceptance,
            'code_number' => $request->code_number,
            'plate_number' => $request->plate_number, 
            'vehicle_type' => $request->vehicle_type, 
            'call_code' => $request->call_code, 
            'call_number' => $request->call_number, 
            'note' => $request->note
        ]);
        session()->flash('status','تم التعديل بنجاح');
        return redirect(route('covenant_index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        covenant::destroy($id);
        session()->flash('status','تم الحذف بنجاح');
        return redirect(route('covenant_index'));
    }

    // search emplloyee

    public function SearchEmployee(Request $request)
    {
        $employees = DB::table('employees')->select('id')->where('name', 'like','%'.$request->SearchEmployee.'%')->get();

        if ($employees->isNotEmpty()){
            foreach($employees as $employee){
                $emp_id = $employee->id;
            }
            $covenants = covenant::all()->where('employees_id' , $emp_id);
        //    ;
     }
     else{
         $covenants = null ;
         $view = null ;
     }
// return $view ;
   return  view('covenant.search')->with('covenants',$covenants);
}
    
}
