<?php

namespace App\Http\Controllers;

use App\Models\cities;
use App\Models\region;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CitiesController extends Controller
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
        return view('cities.index')->with('cities',cities::all())->with('regions',region::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cities.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::table('cities')->insert([
            'name' => $request->name, //This Code coming from ajax request
            'phone' => $request->phone, //This Chief coming from ajax request
            'location' => $request->location, //This Chief coming from ajax request
            'regions_id' => $request->regions_id, //This Chief coming from ajax request
        ]);

        return redirect(route('cities_index'));
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
    public function update(Request $request, cities $cities)
    {
        $cities->update([
            'name' => $request->name, //This Code coming from ajax request
            'phone' => $request->phone, //This Chief coming from ajax request
            'location' => $request->location, //This Chief coming from ajax request
            'regions_id' => $request->regions_id, //This Chief coming from ajax request
        ]);
        return redirect(route('cities_index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        cities::destroy($id);
        return redirect(route('cities_index'));
    }
}
