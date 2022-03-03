<?php

namespace App\Http\Controllers;

use App\Models\branch;
use App\Models\cities;
use Illuminate\Http\Request;

class BranchController extends Controller
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
        return view('branch.index')->with('branchs',branch::all())->with('cities',cities::all());
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
        branch::create([
            'name' => $request->name, //This Code coming from ajax request
            'phone' => $request->phone, //This name coming from ajax request
            'location' => $request->location, //This phone coming from ajax request
            'cities_id' => $request->cities_id, //This cities_id coming from ajax request
          ]);
          return redirect(route('branch_index'));
    
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
    public function update(Request $request, branch $branch)
    {
        $branch->update([
            'name' => $request->name, //This Code coming from ajax request
            'phone' => $request->phone, //This name coming from ajax request
            'location' => $request->location, //This location coming from ajax request
            'cities_id' => $request->cities_id, //This cities_id coming from ajax request
         
        ]);
        return redirect(route('branch_index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        branch::destroy($id);
        return redirect(route('branch_index'));
    }
}
