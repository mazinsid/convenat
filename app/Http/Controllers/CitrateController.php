<?php

namespace App\Http\Controllers;

use App\Models\Citrate;
use Illuminate\Http\Request;

class CitrateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('citrate.index')->with('citrates' , Citrate::all());
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
        Citrate::create([
            'type' => $request->type, 
            'site' => $request->site, 
            'capacity' => $request->capacity, 
         ]);
         session()->flash('status','تم الادخال بنجاح');
         return redirect(route('citrate_index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Citrate  $citrate
     * @return \Illuminate\Http\Response
     */
    public function show(Citrate $citrate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Citrate  $citrate
     * @return \Illuminate\Http\Response
     */
    public function edit(Citrate $citrate)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Citrate  $citrate
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Citrate $citrate)
    {
       $citrate->update([
            'type' => $request->type, 
            'site' => $request->site, 
            'capacity' => $request->capacity, 
         ]);
         session()->flash('status','تم التعديل بنجاح');
         return redirect(route('citrate_index'));
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Citrate  $citrate
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Citrate::destroy($id);

        session()->flash('status','تم الحذف بنجاح');
        return redirect(route('citrate_index'));
    }
}
