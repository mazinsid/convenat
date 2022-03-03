<?php

namespace App\Http\Controllers;

use App\Models\branch;
use App\Models\Recording;
use Facade\FlareClient\Glows\Recorder;
use Illuminate\Http\Request;

class RecordingController extends Controller
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
        return view('recording.index')
        ->with('recordings', Recording::all())
        ->with('branchs',branch::all());
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
        Recording::create([
            'type' => $request->type, 
            'branch_id' => $request->branch_id, 
            'size' => $request->size, 
         ]);

         session()->flash('status','تم الادخال بنجاح');
         return redirect(route('recording_index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Recording  $recording
     * @return \Illuminate\Http\Response
     */
    public function show(Recording $recording)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Recording  $recording
     * @return \Illuminate\Http\Response
     */
    public function edit(Recording $recording)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Recording  $recording
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Recording $recording)
    {
        $recording->update([
            'type' => $request->type, 
            'branch_id' => $request->branch_id, 
            'size' => $request->size, 
         ]);

         session()->flash('status','تم التعديل بنجاح');
         return redirect(route('recording_index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Recording  $recording
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Recording::destroy($id);

        session()->flash('status','تم الحذف بنجاح');
        return redirect(route('recording_index'));
    }
}
