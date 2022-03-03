<?php

namespace App\Http\Controllers;

use App\Models\branch;
use App\Models\covenant;
use App\Models\landline;
use App\Models\landline_covenant;
use App\Models\pmodel;
use App\Models\product;
use App\Models\region;
use App\Models\serial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{

          public function __construct()
          {
              $this->middleware('auth');
          }
   public function convent()
   {
    return view('report.convent')->with('covenants' , covenant::all());
   }


   public function landline()
   {
        return view('report.landline')->with('landlineconvenants' , landline_covenant::all())
        ->with('branches' ,branch::all())->with('landlines' ,landline::all());
   }


   public function status()
   {
      return view('report.status')->with('serials',serial::all());
   }

   public function serial()
   {
      return view('report.serial')->with('products',product::all());
   }

   public function employee(){
        return view('report.employee')->with('regions', region::all());
   }

   public function SearchConventDate(Request $request)
   {
     
           $covenants = covenant::all()->whereBetween('acceptance', [$request->start,$request->end]);
           if($covenants->isEmpty()){
                return  response()->json('empte');
           }else{
           return   view('report.dataconvent')->with('covenants',$covenants);
           }
     }

     public function SearchLandlineDate(Request $request)
     {
       
             $landline_covenant = landline_covenant::all()
             ->whereBetween('acceptance_date', [$request->start,$request->end]);
             if($landline_covenant->isEmpty()){
                  return  response()->json('empte');
             }else{
             return   view('report.dataLandline')
             ->with('landlineconvenants',$landline_covenant);
             }
       }

       public function SearchStaute(Request $request)
       {
         
               $serials = serial::all()->where('status', $request->status);
               if($serials->isEmpty()){
                    return  response()->json('empte');
               }else{
               return   view('report.searchstatue')->with('serials',$serials);
               }
         }

         public function SearchSerials(Request $request)
         {
           
                 $covenants = covenant::all()->where('serials_id', $request->serials);
                 if($covenants->isEmpty()){
                      return  response()->json('empte');
                 }else{
                 return   view('report.searchserial')->with('covenants',$covenants);
                 }
           }
           public function SearchEmployees(Request $request)
           {
             
                   $covenants = covenant::all()->where('employees_id', $request->employees);
                   if($covenants->isEmpty()){
                        return  response()->json('empte');
                   }else{
                   return   view('report.searchemployee')->with('covenants',$covenants);
                   }
             }
  

           
           
           public function getSerial($id)
{
			$serials = DB::table('serials')->select('id','serial')->where('ptype_id', $id)->get();
			return response()->json( $serials );
}
}
