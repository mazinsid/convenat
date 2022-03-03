<?php

namespace App\Http\Controllers;

use App\Models\pmodel;
use App\Models\ptype;
use Illuminate\Http\Request;

class PtypelController extends Controller
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
        return view('type.index')->with('ptypes',ptype::all())->with('models',pmodel::all());
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
        ptype::create([
            'name' => $request->name, //This name coming from ajax request
            'pmodel_id' => $request->pmodel_id, //This name coming from ajax request
            'status' => 1
          ]);

          session()->flash('status','تم الادخال بنجاح');
          return redirect(route('type_index'));
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
    public function update(Request $request, ptype $ptype)
    {
        $ptype->update([
            'name' => $request->name,
            'pmodel_id' => $request->pmodel_id, 
        ]);

        session()->flash('status','تم التعديل بنجاح');
        return redirect(route('type_index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ptype::destroy($id);
        session()->flash('status','تم الحذف بنجاح');
        return redirect(route('type_index'));
    }
}
