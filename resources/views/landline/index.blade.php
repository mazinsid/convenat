@extends('layouts.app')
<meta name="csrf-token" content="{{ csrf_token() }}" />

@section('content')
<main class="sm:container sm:mx-auto sm:mt-10">
  
    {{-- card --}}
    <div class="card">
        <div class="card-header">
       <h3 class="title text-center"  >   {{__('ar.landline')}}</h3>
         </div>
        <div class="card-body justify-content-center text-center">
            <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus" aria-hidden="true"></i> {{__('ar.add')}}</button>
    
        <table class="table text-center">
            <thead >
            <thead>
                <tr>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">{{__('ar.landline_type')}}</th>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">{{__('ar.landline_properties')}}</th>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">{{__('ar.landline_uses')}}</th>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">{{__('ar.serial')}}</th>
                   
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">{{__('ar.landline_circuit_number')}}</th>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">{{__('ar.landline_circuit_type')}}</th>
                    
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">{{__('ar.provider')}}</th>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">{{__('ar.expiry_date')}}</th>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">{{__('ar.edit')}}</th>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">{{__('ar.reomve')}}</th>
            </tr>
            </thead>
            <tbody class="text-center">
            @foreach ($landlines as $landline)
                
            
                <tr class="bg-white lg:hover:bg-gray-100 flex lg:table-row flex-row lg:flex-row flex-wrap lg:flex-no-wrap mb-10 lg:mb-0">
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                       {{$landline->land_type}}
                 
                   </td>
                   <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                   {{$landline->properties}}
             
               </td>
               <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
               {{$landline->uses}}
         
           </td>
                  <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                       {{$landline->serial}}
                        </td>
     
                     
                            <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                               {{$landline->circle_number}}
                                </td>

                        <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                           {{$landline->circuit_type}}
                            </td>

                        
                            <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                                {{$landline->provider->name}}
                                </td><td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                                    <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase"> </span>
                                   {{$landline->landline_expiry_date}}
                                    </td>
                                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                                        <button type="button" class="btn btn-outline-dark" data-toggle="modal" data-target="#modal{{$landline->id}}">
                                            <i class="fa fa-pencil-alt" aria-hidden="true"></i>  {{__('ar.edit')}}
                                          </button>
                                        </td>
                                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                                      <form action="{{route('landline_destroy',$landline->id)}}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"  class="btn btn-outline-danger " onclick="return confirm('{{__('ar.reomve_confirm')}} {{__('ar.landlines')}}')"><i class="fa fa-trash"></i> {{__('ar.reomve')}}</button>
                                            </form>
                                    </td>
                                </tr>
                               @endforeach
                            </tbody>
                        </table>
                        <!-- component -->
                    </div>
                    
               
{{-- edit-modal --}}
@foreach ($landlines as $landline)

<div class="modal fade" id="modal{{$landline->id}}">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
     
          <h4 class="modal-title modal-header justify-content-center text-center">{{$landline->land_type}}</h4>
           <!--Header End-->
        
           <!-- Modal Content-->
           <div class="modal-body justify-content-center text-center">
                      <form action="{{route('landline_update',$landline->id)}}" method="POST">
                        @csrf
                            @method('PUT')
 
                             <div class="form-group">
                                <div class="inline-block relative w-64">
                                    <label for="name"  >{{__('ar.landline_type')}}</label>
                                    <select name="land_type" 
                                    class="form-control">
                                      
                                      <option value="{{__('ar.landline_sip')}}"
                                      {{($landline->land_type == __('ar.landline_sip')) ? 'selected' : ''  }}
                                       >{{__('ar.landline_sip')}}</option>
                                      <option value="{{__('ar.landline_ather')}}"
                                      {{($landline->land_type == __('ar.landline_ather')) ? 'selected' : ''  }}
                                      >{{__('ar.landline_ather')}}</option>
                                      <option value="{{__('ar.landline_land')}}" 
                                      {{($landline->land_type == __('ar.landline_land')) ? 'selected' : ''  }}
                                       >{{__('ar.landline_land')}}</option>
                                    
                                    </select>
                                </div>
                            </div>
    
                             <div class="form-group">
                                <div class="inline-block relative w-64">
                                    <label for="name"  >{{__('ar.landline_properties')}}</label>
                                    <select name="properties" 
                                    class="form-control">
                                   
                                      <option value="{{__('ar.landline_local_zero')}}"
                                      {{($landline->properties == __('ar.landline_local_zero')) ? 'selected' : ''  }}
                                       >{{__('ar.landline_local_zero')}}</option>
                                      <option value="{{__('ar.landline_int_zero')}}"
                                      {{($landline->properties == __('ar.landline_int_zero')) ? 'selected' : ''  }}
                                      >{{__('ar.landline_int_zero')}}</option>
                                      <option value="{{__('ar.landline_caller_id')}}" 
                                      {{($landline->properties == __('ar.landline_caller_id')) ? 'selected' : ''  }}
                                       >{{__('ar.landline_caller_id')}}</option>
                                      <option value="{{__('ar.landline_call_forwarding')}}" 
                                      {{($landline->properties == __('ar.landline_call_forwarding')) ? 'selected' : ''  }}>
                                      {{__('ar.landline_call_forwarding')}}</option>
                                      <option value="{{__('ar.landline_fax_servies')}}" 
                                      {{($landline->properties == __('ar.landline_fax_servies')) ? 'selected' : ''  }}>
                                      {{__('ar.landline_fax_servies')}}</option>
                                    </select>
                                </div>
                            </div>

                              <div class="form-group">
                                <div class="inline-block relative w-64">
                                    <label for="name"  >{{__('ar.landline_uses')}}</label>
                                    <select name="uses" 
                                    class="form-control">
                                      
                                      <option value="{{__('ar.landline_central')}}"
                                      {{($landline->uses == __('ar.landline_central')) ? 'selected' : ''  }}
                                       >{{__('ar.landline_central')}}</option>
                                      <option value="{{__('ar.landline_fax')}}"
                                      {{($landline->uses == __('ar.landline_fax')) ? 'selected' : ''  }}
                                      >{{__('ar.landline_fax')}}</option>
                                      <option value="{{__('ar.landline_direct')}}" 
                                      {{($landline->uses == __('ar.landline_direct')) ? 'selected' : ''  }}
                                       >{{__('ar.landline_direct')}}</option>
                                      <option value="{{__('ar.landline_system')}}" 
                                      {{($landline->uses == __('ar.landline_system')) ? 'selected' : ''  }}>
                                      {{__('ar.landline_system')}}</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="name"  >{{__('ar.serial')}}</label>
                                <input value="{{$landline->serial}}" type="text" name="serial" id="name"   required  class="form-control"/>
                            </div>  

                            {{--  <div class="form-group">
                                <label for="name"  >{{__('ar.landline_cable_number')}}</label>
                                <input value="{{$landline->cab_number}}" type="text" name="cab_number" id="name"   required  class="form-control"/>
                            </div>--}}
                            
                             <div class="form-group">
                                <label for="name"  >{{__('ar.landline_circuit_number')}}</label>
                                <input value="{{$landline->circle_number}}" type="text" name="circle_number" id="name"   required  class="form-control"/>
                            </div>
                            
                             <div class="form-group">
                                <label for="name"  >{{__('ar.landline_circuit_type')}}</label>
                                <input value="{{$landline->circuit_type}}" type="text" name="circuit_type" id="name"   required  class="form-control"/>
                            </div>
                            
                           {{--  <div class="form-group">
                                <label for="name"  >{{__('ar.landline_circuit_speed')}}</label>
                                <input value="{{$landline->circuit_speed}}" type="text" name="circuit_speed" id="name"   required  class="form-control"/>
                            </div> --}}
                            
                             <div class="form-group">
                                <label for="name"  >{{__('ar.provider')}}</label>
                                <input value="{{$landline->providers_id}}" type="text" name="providers_id" id="name"   required  class="form-control"/>
                            </div>

                             <div class="form-group">
                                <label for="name"  >{{__('ar.expiry_date')}}</label>
                                <input value="{{$landline->landline_expiry_date}}" type="date" name="landline_expiry_date" id="name"   required  class="form-control"/>
                            </div>
                            
                        </div>
                        <div class="modal-footer">
                          
                                <button type="submit" class="btn btn-outline-success"><i class="fa fa-save" aria-hidden="true"></i>  {{__('ar.save')}}</button>
     
                        </form>
                            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> {{__('ar.close')}}</button>
                          </div>
                          
                        </div>
                      </div>
    </div>

 @endforeach
 {{-- insert-modal --}}
 <div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
  
        <!-- Modal Header -->
        <div class="modal-header justify-content-center text-center">
          <h4 class="modal-title">{{__('ar.add')}} {{__('ar.invoice_landline')}}</h4>
          
        </div>
             <!-- Modal Content-->
             <div class="modal-body justify-content-center text-center">
                           <div class="m-7">
                            <form action="{{route('landline_store')}}" method="POST">
                                    @csrf
                       
                         <div class="form-group">
                            <div class="inline-block relative w-64">
                                <label for="name"  >{{__('ar.landline_type')}}</label>
                                <select name="land_type" 
                                class="form-control" >
                             
                                  <option value="{{__('ar.landline_sip')}}" >{{__('ar.landline_sip')}}</option>
                                  <option value="{{__('ar.landline_ather')}}" >{{__('ar.landline_ather')}}</option>
                                  <option value="{{__('ar.landline_land')}}" >{{__('ar.landline_land')}}</option>
                              
                                </select>
                            </div>
                        </div>

                         <div class="form-group">
                            <div class="inline-block relative w-64">
                                <label for="name"  >{{__('ar.landline_properties')}}</label>
                                <select name="properties" 
                                class="form-control">
                                
                                  <option value="{{__('ar.landline_local_zero')}}" >{{__('ar.landline_local_zero')}}</option>
                                  <option value="{{__('ar.landline_int_zero')}}" >{{__('ar.landline_int_zero')}}</option>
                                  <option value="{{__('ar.landline_caller_id')}}" >{{__('ar.landline_caller_id')}}</option>
                                  <option value="{{__('ar.landline_call_forwarding')}}" >{{__('ar.landline_call_forwarding')}}</option>
                                  <option value="{{__('ar.landline_fax_servies')}}" >{{__('ar.landline_fax_servies')}}</option>
                               
                                  </select>
                            </div>
                        </div>


                         <div class="form-group">
                            <div class="inline-block relative w-64">
                                <label for="name"  >{{__('ar.landline_uses')}}</label>
                                    <select name="uses" 
                                class="form-control">
                            
                                  <option value="{{__('ar.landline_central')}}" >{{__('ar.landline_central')}}</option>
                                  <option value="{{__('ar.landline_fax')}}" >{{__('ar.landline_fax')}}</option>
                                  <option value="{{__('ar.landline_direct')}}" >{{__('ar.landline_direct')}}</option>
                                  <option value="{{__('ar.landline_system')}}" >{{__('ar.landline_system')}}</option>
                               
                                      
                                  </select>
                            </div>
                        </div>


                         <div class="form-group">
                            <label for="name"  >{{__('ar.serial')}}</label>
                            <input  type="text" name="serial" id="name"   required  class="form-control"/>
                        </div>

                        {{-- <div class="form-group">
                            <label for="name"  >{{__('ar.landline_cable_number')}}</label>
                            <input type="text" name="cab_number" id="name"   required  class="form-control"/>
                        </div> --}}
                        
                         <div class="form-group">
                            <label for="name"  >{{__('ar.landline_circuit_number')}}</label>
                            <input  type="text" name="circle_number" id="name"   required  class="form-control"/>
                        </div>
                        
                         <div class="form-group">
                            <label for="name"  >{{__('ar.landline_circuit_type')}}</label>
                            <input  type="text" name="circuit_type" id="name"   required  class="form-control"/>
                        </div>
                        
                       {{--  <div class="form-group">
                            <label for="name"  >{{__('ar.landline_circuit_speed')}}</label>
                            <input  type="text" name="circuit_speed" id="name"   required  class="form-control"/>
                        </div> --}}
                                   
                         <div class="form-group">
                            <div class="inline-block relative w-64">
                                <label for="name"  >{{__('ar.provider')}}</label>
                                <select name="providers_id" 
                                class="form-control">
                                 
                                  @foreach ($providers as $provider )
                                  <option value="{{$provider->id}}" >{{$provider->name}}</option>
                 
                                  @endforeach
                                
                                </select>
                            </div>
                        </div>
                
                         <div class="form-group">
                            <label for="name"  >{{__('ar.expiry_date')}}</label>
                            <input  type="date" name="landline_expiry_date" id="name"   required  class="form-control"/>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-outline-success"><i class="fa fa-save" aria-hidden="true"></i> {{__('ar.save')}} </button>
                                
                            <p class="text-base text-center text-gray-400" id="result">
                            </p>
                        </form>  
                            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i>  {{__('ar.close')}}</button>
                          </div>
               </div>
        </div>
      </div>
     </div>
               <!-- End of Modal Content-->
{{-- ajax insert --}}
{{-- <script type="text/javascript">

    $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    
    
        $(".btn-insert").click(function(e){
    
            e.preventDefault();
    
            var land_type = $("input[name=land_typei]").val();
            var serial = $("input[name=seriali]").val();
       
            var circle_number = $("input[name=circle_numberi]").val();
            var circuit_type = $("input[name=circuit_typei]").val();
           
            var providers_id = $("input[name=providers_idi]").val();
            var landline_expiry_date = $("input[name=landline_expiry_datei]").val();
            var url = '{{ url('landline/store') }}';
    
            $.ajax({
               url:url,
               method:'POST',
               data:{
                land_type:land_type, 
                serial:serial, 
                 
                circle_number:circle_number, 
                circuit_type:circuit_type, 
              
                providers_id:providers_id, 
                landline_expiry_date:landline_expiry_date, 
            
                    },
               success:function(response){
                  if(response.success){
                    document.getElementById('myModal').close()
                      alert(response.message) //Message come from controller
                  }else{
                      alert("Error")
                  }
               },
               error:function(error){
                  console.log(error)
               }
            });
        });
    
    </script> --}}
    </main>
@endsection
