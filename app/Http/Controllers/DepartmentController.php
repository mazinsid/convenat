<?php

namespace App\Http\Controllers;

use App\Models\branch;
use App\Models\department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
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
        return view('department.index')->with('departments',department::all())->with('branchs',branch::all());
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
        department::create([
            'name' => $request->nameinsert, //This name coming from ajax request
         ]);
         session()->flash('status','تم الادخال بنجاح');
         return redirect(route('department_index'));
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
    public function update(Request $request, department $department)
    {
        $department->update([
            'name' => $request->name, //This name 
        ]);
        session()->flash('status','تم التعديل بنجاح');
        return redirect(route('department_index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        department::destroy($id);
        session()->flash('status','تم الحذف بنجاح');
        return redirect(route('department_index'));
    }
}
