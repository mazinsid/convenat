<?php

namespace App\Http\Controllers;

use App\Models\pmodel;
use App\Models\product;
use Illuminate\Http\Request;

class PmodelController extends Controller
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
        return view('model.index')->with('models',pmodel::all())->with('products',product::all());
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
        pmodel::create([
             'name' => $request->nameinsert, //This name coming from ajax request
            'products_id' => $request->products_id, //This name coming from ajax request
          ]);
          session()->flash('status','تم الادخال بنجاح');
          return redirect(route('model_index'));
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
    public function update(Request $request, pmodel $pmodel)
    {
        $pmodel->update([
            'name' => $request->name, 
            'products_id' => $request->products_id,
        ]);
        session()->flash('status','تم التعديل بنجاح');
        return redirect(route('model_index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        pmodel::destroy($id);
        session()->flash('status','تم الحذف بنجاح');
        return redirect(route('model_index'));
    }
}
