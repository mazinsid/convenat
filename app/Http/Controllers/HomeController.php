<?php

namespace App\Http\Controllers;

use App\Models\device_phone;
use App\Models\DigitalCircuit;
use App\Models\landline;
use App\Models\landline_covenant;
use App\Models\phone;
use App\Models\pmodel;
use App\Models\product;
use App\Models\ptype;
use App\Models\serial;
use App\Models\simcard;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
  
        $ptype = ptype::count();
        $serial = serial::count();
        $serialv = serial::where('status' , 0)->count();
        $serialn = serial::where('status' , 1)->count();

        $landline = landline::count();
        $landline_covenant = landline_covenant::count();
        $device_phone = device_phone::count();
        $simcard = simcard::count();

        $DigitalCircuit = DigitalCircuit::count();

        $barvo_id = DB::table('products')->where('name','برافو')->value('id');
        $barvo_model = DB::table('pmodels')->where('products_id',$barvo_id)->value('id');
        $barvo_type = DB::table('ptypes')->where('pmodel_id',$barvo_model)->value('id');
        $barvo = serial::where('ptype_id' , $barvo_type)->count();
        $covenant_bravo = serial::where('ptype_id' , $barvo_type)->where('status' ,1)->count();

        $tetra_id = DB::table('products')->where('name','تترا')->value('id');
        $barvo_model = DB::table('pmodels')->where('products_id',$barvo_id)->value('id');
        $barvo_type = DB::table('ptypes')->where('pmodel_id',$barvo_model)->value('id');
        $tetra = pmodel::where('products_id' , $tetra_id)->count();

        $fwran_id = DB::table('products')->where('name','فوراً')->value('id');
        $fwran_model = DB::table('pmodels')->where('products_id',$fwran_id)->value('id');
        $fwran_type = DB::table('ptypes')->where('pmodel_id',$fwran_model)->value('id');
        $fwran = serial::where('ptype_id' , $fwran_type)->count();
        $covenant_fwran = serial::where('ptype_id' , $fwran_type)->where('status' ,1)->count();
        
        return view('home')->with('ptype' , $ptype)
        ->with('serial' ,$serial)->with('serialv' , $serialv)
        ->with('serialn' , $serialn)
        ->with('DigitalCircuit' , $DigitalCircuit)
        ->with('landline' ,$landline)->with('landline_covenant' ,$landline_covenant)
        ->with('device_phone' ,$device_phone)->with('simcard' ,$simcard)
        ->with('bravo',$barvo)->with('tetra',$tetra)->with('fwran',$fwran)
        ->with('covenant_bravo',$covenant_bravo)->with('covenant_fwran',$covenant_fwran);
    }
}
