<?php

use App\Http\Controllers\AccessoryController;
use App\Http\Controllers\AccountsController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\CitiesController;
use App\Http\Controllers\ConvenantPhoneController;
use App\Http\Controllers\CovenantAccessoryController;
use App\Http\Controllers\CovenantController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\FaultController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\LandlineController;
use App\Http\Controllers\LandlineCovenantController;
use App\Http\Controllers\PmodelController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProviderController;
use App\Http\Controllers\PtypelController;
use App\Http\Controllers\RankController;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ReturnCovenantController;
use App\Http\Controllers\SerialController;
use App\Http\Controllers\SimcardController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\PhoneController;
use App\Http\Controllers\DigitalCircuitController;
use App\Http\Controllers\DevicePhoneController;
use App\Http\Controllers\ConvenantDigitalCircuitController;
use App\Http\Controllers\RecordingController;
use App\Http\Controllers\CitrateController;
use App\Http\Controllers\CovenantDeviceRouteController;
use App\Http\Controllers\CovenantSimCardController;
use App\Http\Controllers\DeviceRouteController;
use App\Models\department;
use App\Models\device_route;
use App\Models\employee;
use App\Models\product_category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Auth::routes();


Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');

//cities
Route::get('cities/index', [CitiesController::class, 'index'])->name('cities_index');
Route::get('cities/create', [CitiesController::class, 'create'])->name('cities_create');
Route::post('cities/store', [CitiesController::class, 'store'])->name('cities_store');
Route::put('cities/{cities}/update', [CitiesController::class, 'update'])->name('cities_update');
Route::delete('cities/{id}/destroy', [CitiesController::class, 'destroy'])->name('cities_destroy');

// regions
Route::get('regions/index', [RegionController::class, 'index'])->name('regions_index');
Route::post('regions/store', [RegionController::class, 'store'])->name('regions_store');
Route::put('regions/{region}/update', [RegionController::class, 'update'])->name('regions_update');
Route::delete('regions/{id}/destroy', [RegionController::class, 'destroy'])->name('regions_destroy');

// branch
Route::get('branch/index',[BranchController::class , 'index'])->name('branch_index');
Route::post('branch/store', [BranchController::class, 'store'])->name('branch_store');
Route::put('branch/{branch}/update', [BranchController::class, 'update'])->name('branch_update');
Route::delete('branch/{id}/destroy', [BranchController::class, 'destroy'])->name('branch_destroy');

// department
Route::get('department/index',[DepartmentController::class , 'index'])->name('department_index');
Route::post('department/store', [DepartmentController::class, 'store'])->name('department_store');
Route::put('department/{department}/update', [DepartmentController::class, 'update'])->name('department_update');
Route::delete('department/{id}/destroy', [DepartmentController::class, 'destroy'])->name('department_destroy');


// rank
Route::get('rank/index',[RankController::class , 'index'])->name('rank_index');
Route::post('rank/store', [RankController::class, 'store'])->name('rank_store');
Route::put('rank/{rank}/update', [RankController::class, 'update'])->name('rank_update');
Route::delete('rank/{id}/destroy', [RankController::class, 'destroy'])->name('rank_destroy');

// job
Route::get('job/index',[JobController::class , 'index'])->name('job_index');
Route::post('job/store', [JobController::class, 'store'])->name('job_store');
Route::put('job/{job}/update', [JobController::class, 'update'])->name('job_update');
Route::delete('job/{id}/destroy', [JobController::class, 'destroy'])->name('job_destroy');



// employee
Route::get('employee/index',[EmployeeController::class , 'index'])->name('employee_index');
Route::post('employee/store', [EmployeeController::class, 'store'])->name('employee_store');
Route::put('employee/{employee}/update', [EmployeeController::class, 'update'])->name('employee_update');
Route::delete('employee/{id}/destroy', [EmployeeController::class, 'destroy'])->name('employee_destroy');


// porduct Category

Route::get('category/index',[ProductCategoryController::class , 'index'])->name('category_index');
Route::post('category/store', [ProductCategoryController::class, 'store'])->name('category_store');
Route::put('category/{product_category}/update', [ProductCategoryController::class, 'update'])->name('category_update');
Route::delete('category/{id}/destroy', [ProductCategoryController::class, 'destroy'])->name('category_destroy');

// porduct

Route::get('product/index',[ProductController::class , 'index'])->name('product_index');
Route::post('product/store', [ProductController::class, 'store'])->name('product_store');
Route::put('product/{product}/update', [ProductController::class, 'update'])->name('product_update');
Route::delete('product/{id}/destroy', [ProductController::class, 'destroy'])->name('product_destroy');

// model

Route::get('model/index',[PmodelController::class , 'index'])->name('model_index');
Route::post('model/store', [PmodelController::class, 'store'])->name('model_store');
Route::put('model/{pmodel}/update', [PmodelController::class, 'update'])->name('model_update');
Route::delete('model/{id}/destroy', [PmodelController::class, 'destroy'])->name('model_destroy');
// type

Route::get('type/index',[PtypelController::class , 'index'])->name('type_index');
Route::post('type/store',[PtypelController::class, 'store'])->name('type_store');
Route::put('type/{ptype}/update', [PtypelController::class, 'update'])->name('type_update');
Route::delete('type/{id}/destroy', [PtypelController::class, 'destroy'])->name('type_destroy');

// serial

Route::get('serial/index',[SerialController::class , 'index'])->name('serial_index');
Route::post('serial/store',[SerialController::class, 'store'])->name('serial_store');
Route::put('serial/{serial}/update', [SerialController::class, 'update'])->name('serial_update');
Route::delete('serial/{id}/destroy', [SerialController::class, 'destroy'])->name('serial_destroy');
// covenant

Route::get('covenant/index',[CovenantController::class , 'index'])->name('covenant_index');
Route::get('covenant/create',[CovenantController::class , 'create'])->name('covenant_create');
Route::post('covenant/store',[CovenantController::class, 'store'])->name('covenant_store');
Route::put('covenant/{covenant}/update',[CovenantController::class, 'update'])->name('covenant_update');
Route::delete('covenant/{id}/destroy', [CovenantController::class, 'destroy'])->name('covenant_destroy');
Route::get('covenant/{id}/accessory' , [CovenantController::class, 'CovenantAccessory'])->name('CovenantAccessory');

// CovenantAccessory
Route::post('covenantaccessory/store',[CovenantAccessoryController::class, 'store'])->name('covenantaccessory_store');
Route::put('covenantaccessory/{accessore}/update',[CovenantAccessoryController::class, 'update'])->name('covenantaccessory_update');
Route::delete('covenantaccessory/{id}/{covenans_id}/destroy', [CovenantAccessoryController::class, 'destroy'])->name('covenantaccessory_destroy');


// accessory
Route::get('accessory/index' , [AccessoryController::class ,'index'])->name('accessory_index');
Route::put('accessory/{accessory}/update' , [AccessoryController::class ,'update'])->name('accessory_update');
Route::post('accessory/store' , [AccessoryController::class ,'store'])->name('accessory_store');
Route::delete('accessory/{id}/destroy', [AccessoryController::class, 'destroy'])->name('accessory_destroy');

//return covenant
Route::get('return/index',[ReturnCovenantController::class , 'index'])->name('return_index');
Route::post('return/create',[ReturnCovenantController::class , 'create'])->name('return_create');
Route::post('return/store',[ReturnCovenantController::class, 'store'])->name('return_store');
Route::put('return/{return_covenant}/update', [ReturnCovenantController::class, 'update'])->name('return_update');
Route::delete('return/{id}/destroy', [ReturnCovenantController::class, 'destroy'])->name('return_destroy');
Route::get('return/{id}/getSerial', [ReturnCovenantController::class, 'getSerial'])->name('return_getSerial');

//simcard
Route::get('simcard/index' , [SimcardController::class ,'index'])->name('simcard_index');
Route::put('simcard/{simcard}/update' , [SimcardController::class ,'update'])->name('simcard_update');
Route::post('simcard/store' , [SimcardController::class ,'store'])->name('simcard_store');
Route::delete('simcard/{id}/destroy', [SimcardController::class, 'destroy'])->name('simcard_destroy');
//CovenantSimCards
Route::get('CovenantSimCards/index' , [CovenantSimCardController::class ,'index'])->name('CovenantSimCards_index');
Route::get('phoneCovenantSimCard/create' , [CovenantSimCardController::class ,'create'])->name('CovenantSimCards_index');
Route::put('CovenantSimCards/{CovenantSimCards}/update' , [CovenantSimCardController::class ,'update'])->name('CovenantSimCards_update');
Route::post('CovenantSimCards/store' , [CovenantSimCardController::class ,'store'])->name('CovenantSimCards_store');
Route::delete('CovenantSimCards/{id}/destroy', [CovenantSimCardController::class, 'destroy'])->name('CovenantSimCards_destroy');


// provider
Route::get('provider/index' , [ProviderController::class ,'index'])->name('provider_index');
Route::put('provider/{provider}/update' , [ProviderController::class ,'update'])->name('provider_update');
Route::post('provider/store' , [ProviderController::class ,'store'])->name('provider_store');
Route::delete('provider/{id}/destroy', [ProviderController::class, 'destroy'])->name('provider_destroy');


// landline

Route::get('landline/index' , [LandlineController::class ,'index'])->name('landline_index');
Route::put('landline/{landline}/update' , [LandlineController::class ,'update'])->name('landline_update');
Route::post('landline/store' , [LandlineController::class ,'store'])->name('landline_store');
Route::delete('landline/{id}/destroy', [LandlineController::class, 'destroy'])->name('landline_destroy');

//fualts
Route::get('fault/index' , [FaultController::class ,'index'])->name('fault_index');
Route::post('fault/store',[FaultController::class, 'store'])->name('fault_store');
Route::put('fault/{faults}/update',[FaultController::class, 'update'])->name('fault_update');
Route::delete('fault/{id}/destroy', [FaultController::class, 'destroy'])->name('fault_destroy');

//users
Route::get('users/index' , [UsersController::class ,'index'])->name('users_index');
Route::post('users/store',[UsersController::class, 'store'])->name('users_store');
Route::put('users/{user}/update',[UsersController::class, 'update'])->name('users_update');
Route::delete('users/{id}/destroy', [UsersController::class, 'destroy'])->name('users_destroy');

//phone
Route::get('phone/index' , [PhoneController::class ,'index'])->name('phone_index');
Route::post('phone/store',[PhoneController::class, 'store'])->name('phone_store');
Route::put('phone/{phone}/update',[PhoneController::class, 'update'])->name('phone_update');
Route::delete('phone/{id}/destroy', [PhoneController::class, 'destroy'])->name('phone_destroy');

// DevicePhone
Route::get('DevicePhone/index' , [DevicePhoneController::class ,'index'])->name('DevicePhone_index');
Route::post('DevicePhone/store',[DevicePhoneController::class, 'store'])->name('DevicePhone_store');
Route::put('DevicePhone/{device_phone}/update',[DevicePhoneController::class, 'update'])->name('DevicePhone_update');
Route::delete('DevicePhone/{id}/destroy', [DevicePhoneController::class, 'destroy'])->name('DevicePhone_destroy');

//convenant_phone
Route::get('convenant_phone/index' , [ConvenantPhoneController::class ,'index'])->name('phonecovenant_index');
Route::get('convenant_phone/create',[ConvenantPhoneController::class , 'create'])->name('phonecovenant_create');
Route::post('convenant_phone/store',[ConvenantPhoneController::class, 'store'])->name('phonecovenant_store');
Route::put('convenant_phone/{device_phone}/update',[ConvenantPhoneController::class, 'update'])->name('phonecovenant_update');
Route::delete('convenant_phone/{id}/destroy', [ConvenantPhoneController::class, 'destroy'])->name('phonecovenant_destroy');

// DeviceRoute
Route::get('DeviceRoute/index' , [DeviceRouteController::class ,'index'])->name('DeviceRoute_index');
Route::post('DeviceRoute/store',[DeviceRouteController::class, 'store'])->name('DeviceRoute_store');
Route::put('DeviceRoute/{device_route}/update',[DeviceRouteController::class, 'update'])->name('DeviceRoute_update');
Route::delete('DeviceRoute/{id}/destroy', [DeviceRouteController::class, 'destroy'])->name('DeviceRoute_destroy');
//CovenantDeviceRoute
Route::get('CovenantDeviceRoute/index' , [CovenantDeviceRouteController::class ,'index'])->name('CovenantDeviceRoute_index');
Route::get('CovenantDeviceRoute/create' , [CovenantDeviceRouteController::class ,'create'])->name('CovenantDeviceRoute_create');
Route::post('CovenantDeviceRoute/store',[CovenantDeviceRouteController::class, 'store'])->name('CovenantDeviceRoute_store');
Route::put('CovenantDeviceRoute/{device_route}/update',[CovenantDeviceRouteController::class, 'update'])->name('CovenantDeviceRoute_update');
Route::delete('CovenantDeviceRoute/{id}/destroy', [CovenantDeviceRouteController::class, 'destroy'])->name('CovenantDeviceRoute_destroy');


//DigitalCircuit
Route::get('DigitalCircuit/index' , [DigitalCircuitController::class ,'index'])->name('DigitalCircuit_index');
Route::post('DigitalCircuit/store',[DigitalCircuitController::class, 'store'])->name('DigitalCircuit_store');
Route::put('DigitalCircuit/{DigitalCircuit}/update',[DigitalCircuitController::class, 'update'])->name('DigitalCircuit_update');
Route::delete('DigitalCircuit/{id}/destroy', [DigitalCircuitController::class, 'destroy'])->name('DigitalCircuit_destroy');


//convenant_DigitalCircuit
Route::get('convenant_DigitalCircuit/index' , [ConvenantDigitalCircuitController::class ,'index'])->name('DigitalCircuitcovenant_index');
Route::get('convenant_DigitalCircuit/create',[ConvenantDigitalCircuitController::class , 'create'])->name('DigitalCircuitcovenant_create');
Route::post('convenant_DigitalCircuit/store',[ConvenantDigitalCircuitController::class, 'store'])->name('DigitalCircuitcovenant_store');
Route::put('convenant_DigitalCircuit/{DigitalCircuit}/update',[ConvenantDigitalCircuitController::class, 'update'])->name('DigitalCircuitcovenant_update');
Route::delete('convenant_DigitalCircuit/{id}/destroy', [ConvenantDigitalCircuitController::class, 'destroy'])->name('DigitalCircuitcovenant_destroy');



//LandlineCovenant
Route::get('LandlineCovenant/index' , [LandlineCovenantController::class ,'index'])->name('LandlineCovenant_index');
Route::post('LandlineCovenant/store',[LandlineCovenantController::class, 'store'])->name('LandlineCovenant_store');
Route::put('LandlineCovenant/{landline_covenant}/update',[LandlineCovenantController::class, 'update'])->name('LandlineCovenant_update');
Route::delete('LandlineCovenant/{id}/destroy', [LandlineCovenantController::class, 'destroy'])->name('LandlineCovenant_destroy');



//Citrate
Route::get('citrate/index' , [CitrateController::class ,'index'])->name('citrate_index');
Route::post('citrate/store',[CitrateController::class, 'store'])->name('citrate_store');
Route::put('citrate/{citrate}/update',[CitrateController::class, 'update'])->name('citrate_update');
Route::delete('citrate/{id}/destroy', [CitrateController::class, 'destroy'])->name('citrate_destroy');




// load ajax select serial
Route::get('serial/{id}/getModle', [SerialController::class , 'getModle'])->name('getModle');
Route::get('serial/{id}/getType', [SerialController::class , 'getType'])->name('getType');
Route::get('serial/{id}/getSerial', [SerialController::class , 'getSerial'])->name('getSerials');

// load ajax select serial phone


Route::get('serial/{id}/getPhoneSerial', [ConvenantPhoneController::class , 'getPhoneSerial'])->name('getPhoneSerial');


// load ajax select employee
Route::get('employee/{id}/getCities', [EmployeeController::class , 'getCities'])->name('getCities');
Route::get('employee/{id}/getBranche', [EmployeeController::class , 'getBranche'])->name('getBranche');
Route::get('employee/{id}/getEmployee', [EmployeeController::class , 'getEmployee'])->name('getEmployee');



// ACOUNTS

Route::get('accounts/index' , [AccountsController::class ,'index'])->name('accounts_index');
Route::put('accounts/{accounts}/update' , [AccountsController::class ,'update'])->name('accounts_update');
Route::post('accounts/store' , [AccountsController::class ,'store'])->name('accounts_store');
Route::delete('accounts/{id}/destroy', [AccountsController::class, 'destroy'])->name('accounts_destroy');




// recording

Route::get('recording/index' , [RecordingController::class ,'index'])->name('recording_index');
Route::put('recording/{recording}/update' , [RecordingController::class ,'update'])->name('recording_update');
Route::post('recording/store' , [RecordingController::class ,'store'])->name('recording_store');
Route::delete('recording/{id}/destroy', [RecordingController::class, 'destroy'])->name('recording_destroy');




// search

Route::post('covenant/SearchEmployee', [CovenantController::class , 'SearchEmployee'])->name('SearchEmployee');


// reports
Route::get('report/landline' , [ReportController::class , 'landline'])->name('report_landline');
Route::get('report/convent' , [ReportController::class , 'convent'])->name('report_convent');
Route::get('report/status' , [ReportController::class , 'status'])->name('report_status');
Route::get('report/serial' , [ReportController::class , 'serial'])->name('report_serial');
Route::get('report/employee' , [ReportController::class , 'employee'])->name('report_employee');


// reports search

Route::post('report/SearchConventDate' , [ReportController::class , 'SearchConventDate'])->name('SearchConventDate');
Route::post('report/SearchLandlineDate' , [ReportController::class , 'SearchLandlineDate'])->name('SearchConventDate');
Route::post('report/SearchStaute' , [ReportController::class , 'SearchStaute'])->name('SearchStaute');
Route::post('report/SearchSerials' , [ReportController::class , 'SearchSerials'])->name('SearchSerials');
Route::post('report/SearchEmployees' , [ReportController::class , 'SearchEmployees'])->name('SearchEmployees');



Route::get('report/{id}/getSerial' , [ReportController::class , 'getSerial'])->name('getSerial');
Route::get('report/{id}/getCovenan' , [ReportController::class , 'getCovenans'])->name('getCovenan');

