@extends('layouts.app')
 
@section('content')
<main class="sm:container sm:mx-auto sm:mt-10">
    
<br /> <h5 class="card-title text-center"> {{ __('ar.menus_wireless_manager') }} </h5>
    <hr style="width:50%">
    <div class="container">
    <div class="row">
        
       
        
        <div class="col-md-3">
        <div class="card-counter danger">
            <i class="fa fa-microphone-alt"></i>
            <span class="count-numbers">{{$bravo}}</span>
            <span class="count-name">{{__('ar.count_bravo_total')}}</span>
        </div>
        </div>

        <div class="col-md-3">
        <div class="card-counter green">
            <i class="fa fa-microphone-alt" aria-hidden="true"></i>
            <span class="count-numbers">{{$tetra}}</span>
            <span class="count-name">{{__('ar.count_tetra_total')}}</span>
        </div>
        </div>
      
        <div class="col-md-3">
        <div class="card-counter info">
            <i class="fa fa-microphone-alt" aria-hidden="true"></i>
            <span class="count-numbers">{{0}}</span>
            <span class="count-name">{{__('ar.count_sebora_total')}}</span>
        </div>
        </div>
      
        <div class="col-md-3">
        <div class="card-counter gold">
            <i class="fa fa-microphone-alt" aria-hidden="true"></i>
            <span class="count-numbers">{{$fwran}}</span>
            <span class="count-name">{{__('ar.count_fwran_total')}}</span>
        </div>
        </div>
        
             <div class="col-md-3">
        <div class="card-counter danger">
            <i class="fa fa-microphone-alt"></i>
            <span class="count-numbers">{{$covenant_bravo}}</span>
            <span class="count-name">{{__('ar.count_covenant_bravo_total')}}</span>
        </div>
        </div>

        <div class="col-md-3">
        <div class="card-counter green">
            <i class="fa fa-microphone-alt"  ></i>
            <span class="count-numbers">{{0}}</span>
            <span class="count-name">{{__('ar.count_covenant_tetra_total')}}</span>
        </div>
        </div>
      
        <div class="col-md-3">
        <div class="card-counter info">
            <i class="fa fa-microphone-alt" aria-hidden="true"></i>
            <span class="count-numbers">{{0}}</span>
            <span class="count-name">{{__('ar.count_covenant_sebora_total')}}</span>
        </div>
        </div>
        
        <div class="col-md-3">
        <div class="card-counter gold">
            <i class="fa fa-microphone-alt" aria-hidden="true"></i>
            <span class="count-numbers">{{$covenant_fwran}}</span>
            <span class="count-name">{{__('ar.count_covenant_fwran_total')}}</span>
        </div>
        </div>
    </div>
    </div>    
    
    <hr style="width:50%">      
     
    <div class="container">
    <div class="row">
        
        <div class="col-md-3">
        <div class="card-counter green">
            <i class="fa fa-sim-card"></i>
            <span class="count-numbers">{{$simcard}}</span>
            <span class="count-name">{{__('ar.sim_total')}}</span>
        </div>
        </div>

        <div class="col-md-3">
        <div class="card-counter danger">
            <i class="fa fa-mobile-alt" aria-hidden="true"></i>
            <span class="count-numbers">{{$device_phone}}</span>
            <span class="count-name">{{__('ar.mobile_total')}}</span>
        </div>
        </div>
      
        <div class="col-md-3">
        <div class="card-counter gold">
            <i class="fa fa-network-wired" aria-hidden="true"></i>
            <span class="count-numbers">{{0}}</span>
            <span class="count-name">{{__('ar.routers_total')}}</span>
        </div>
        </div>
        
         <div class="col-md-3">
        <div class="card-counter success">
            <i class="fa fa-network-wired" aria-hidden="true"></i>
            <span class="count-numbers">{{0}}</span>
            <span class="count-name">{{__('ar.count_accessories_total')}}</span>
        </div>
        </div>
        
        <div class="col-md-3">
        <div class="card-counter green">
            <i class="fa fa-sim-card"></i>
            <span class="count-numbers">{{0}}</span>
            <span class="count-name">{{__('ar.count_covenant_simcard_total')}}</span>
        </div>
        </div>
        
        <div class="col-md-3">
        <div class="card-counter danger">
            <i class="fa fa-mobile-alt"></i>
            <span class="count-numbers">{{0}}</span>
            <span class="count-name">{{__('ar.count_covenant_mobile_total')}}</span>
        </div>
        </div>
        
        <div class="col-md-3">
        <div class="card-counter gold">
            <i class="fa fa-network-wired" aria-hidden="true"></i>
            <span class="count-numbers">{{0}}</span>
            <span class="count-name">{{__('ar.count_covenant_router_total')}}</span>
        </div>
        </div>
         
        <div class="col-md-3">
        <div class="card-counter success">
            <i class="fa fa-network-wired" aria-hidden="true"></i>
            <span class="count-numbers">{{0}}</span>
            <span class="count-name">{{__('ar.count_covenant_accessories_total')}}</span>
        </div>
        </div>       
    </div>
    </div>
 
    <br /><h5 class="card-title text-center"> {{ __('ar.menus_wired') }} </h5>
    <hr style="width:50%">
    <div class="container">
    <div class="row">
  
        <div class="col-md-3">
        <div class="card-counter gold">
            <i class="fa fa-phone-alt" aria-hidden="true"></i>
            <span class="count-numbers">{{$landline}}</span>
            <span class="count-name">{{__('ar.landline_total')}}</span>
        </div>
        </div>
      
        <div class="col-md-3">
        <div class="card-counter green">
            <i class="fa fa-check" aria-hidden="true"></i>
            <span class="count-numbers">{{$landline}}</span>
          <span class="count-name">{{__('ar.central_total')}}</span>
        </div>
        </div>


        <div class="col-md-3">
        <div class="card-counter danger">
            <i class="fa fa-ethernet" aria-hidden="true"></i>
            <span class="count-numbers">{{$DigitalCircuit}}</span>
            <span class="count-name">{{__('ar.circuit_total')}}</span>
        </div>
        </div>

        <div class="col-md-3">
        <div class="card-counter info">
            <i class="fa fa-record-vinyl"></i>
            <span class="count-numbers">{{0}}</span>
            <span class="count-name">{{(__('ar.count_recorder_total'))}}</span>
        </div>
        </div>
        
             <div class="col-md-3">
        <div class="card-counter gold">
            <i class="fa fa-phone-alt" aria-hidden="true"></i>
            <span class="count-numbers">{{$landline}}</span>
            <span class="count-name">{{__('ar.count_covenant_landline_total')}}</span>
        </div>
        </div>
      
        <div class="col-md-3">
        <div class="card-counter green">
            <i class="fa fa-check" aria-hidden="true"></i>
            <span class="count-numbers">{{$landline}}</span>
          <span class="count-name">{{__('ar.count_covenant_central_total')}}</span>
        </div>
        </div>


        <div class="col-md-3">
        <div class="card-counter danger">
            <i class="fa fa-ethernet" aria-hidden="true"></i>
            <span class="count-numbers">{{0}}</span>
            <span class="count-name">{{__('ar.count_covenant_circuit_total')}}</span>
        </div>
        </div>

        <div class="col-md-3">
        <div class="card-counter info">
            <i class="fa fa-record-vinyl"></i>
            <span class="count-numbers">{{0}}</span>
            <span class="count-name">{{(__('ar.count_covenant_recorder_total'))}}</span>
        </div>
        </div>
        
    </div>
    </div>
  
    <br><h5 class="card-title text-center"> {{ __('ar.count_general') }} </h5>
    <hr style="width:50%">
     <div class="container">
      <div class="row">
  
        <div class="col-md-3">
          <div class="card-counter red">
            <i class="fa fa-map-marker-alt"></i>
            <span class="count-numbers">{{0}}</span>
            <span class="count-name">{{__('ar.menus_regions')}}</span>
          </div>
        </div>

        <div class="col-md-3">
        <div class="card-counter green">
            <i class="fa fa-city" aria-hidden="true"></i>
            <span class="count-numbers">{{0}}</span>
            <span class="count-name">{{__('ar.menus_cities')}}</span>
        </div>
        </div>
      
        <div class="col-md-3">
        <div class="card-counter primary">
            <i class="fa fa-code-branch" aria-hidden="true"></i>
            <span class="count-numbers">{{0}}</span>
            <span class="count-name">{{__('ar.menus_branch')}}</span>
        </div>
        </div>
      
        <div class="col-md-3">
        <div class="card-counter danger">
            <i class="fa fa-people-arrows" aria-hidden="true"></i>
            <span class="count-numbers">{{0}}</span>
            <span class="count-name">{{__('ar.count_recipients')}}</span>
        </div>
        </div>
  
    </div>
  </div>

  
     
</main>
@endsection
