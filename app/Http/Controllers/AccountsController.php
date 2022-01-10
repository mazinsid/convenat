<?php

namespace App\Http\Controllers;

use App\Models\accounts;
use Illuminate\Http\Request;

class AccountsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('accounts.index')->with('accounts' , accounts::all());
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
        accounts::create([
            'type' => $request->type, 
            'invoice_no' => $request->invoice_no, 
            'amount' => $request->amount, 
          ]);
          session()->flash('status','تم الادخال بنجاح');
          return redirect(route('accounts_index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\accounts  $accounts
     * @return \Illuminate\Http\Response
     */
    public function show(accounts $accounts)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\accounts  $accounts
     * @return \Illuminate\Http\Response
     */
    public function edit(accounts $accounts)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\accounts  $accounts
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, accounts $accounts)
    {
        $accounts->update([
            'type' => $request->type, 
            'invoice_no' => $request->invoice_no, 
            'amount' => $request->amount, 
          ]);
        session()->flash('status','تم التعديل بنجاح');
          return redirect(route('accounts_index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\accounts  $accounts
     * @return \Illuminate\Http\Response
     */
    public function destroy(accounts $accounts)
    {
        //
    }
}
