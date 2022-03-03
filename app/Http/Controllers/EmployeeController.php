<?php

namespace App\Http\Controllers;

use App\Models\department;
use App\Models\employee;
use App\Models\job;
use App\Models\rank;
use App\Models\region;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
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
        return view('employee.index')->with('employes',employee::all())->with('regions',region::all())
        ->with('ranks',rank::all())->with('jobs',job::all())->with('departments' ,department::all());
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
        employee::create([
            'name' => $request->name, //This name coming from ajax request
            'phone' => $request->phone, //This phone coming from ajax request
            'email' => $request->email, //This email coming from ajax request
            'national_id' => $request->national_id, //This national_id coming from ajax request
            'rank_id' => $request->rank_id, //This rank_id coming from ajax request
            'job_id' => $request->job_id, //This job_id coming from ajax request
            'gender' => $request->gender, //This gender coming from ajax request
            'department_id' => $request->department_id, //This department_id coming from ajax request
            'branch_id' => $request->branch_id, //This department_id coming from ajax request
          ]);
          
          return redirect(route('employee_index'));
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
    public function update(Request $request, employee $employee)
    {
        $employee->update([
            'name' => $request->name, 
            'phone' => $request->phone, 
            'email' => $request->email, 
            'national_id' => $request->national_id, 
            'rank_id' => $request->rank_id, 
            'job_id' => $request->job_id,
            'gender' => $request->gender,
            'department_id' => $request->department_id,
            'branch_id' => $request->branch_id,
      
        ]);
        return redirect(route('employee_index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        employee::destroy($id);
        return redirect(route('employee_index'));
    }

    // load to select 
    
    public function getCities($id)
    {
                $cities = DB::table('cities')->select('id','name')->where('regions_id', $id)->get();
                return response()->json( $cities );
    }
    public function getBranche($id)
    {
                $branches = DB::table('branches')->select('id','name')->where('cities_id', $id)->get();
                return response()->json( $branches );
    }
    public function getEmployee($id)
    {
                $employees = DB::table('employees')->select('id','name')->where('branch_id', $id)->get();
                return response()->json( $employees );
    }
}
