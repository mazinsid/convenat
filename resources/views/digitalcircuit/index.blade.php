@extends('layouts.app')
<meta name="csrf-token" content="{{ csrf_token() }}" />
@section('content')
<main class="sm:container sm:mx-auto sm:mt-10">

      {{-- card --}}
    <div class="card">
      <div class="card-header">
     <h3 class="title text-center"  >   {{__('tables.digital circuit')}}</h3>
       </div>
      <div class="card-body justify-content-center text-center">
          <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus" aria-hidden="true"></i> {{__('button.add')}}</button>
  
      <table class="table">
          <thead class="text-center">
            <thead>
                <tr>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">{{__('tables.dctype')}}</th>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">{{__('tables.monthly_cost')}}</th>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">{{__('tables.design_type')}}</th>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">{{__('tables.name_circuit')}}</th>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">{{__('tables.speed')}}</th>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">{{__('tables.location')}}</th>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">{{__('button.edit')}}</th>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">{{__('button.reomve')}}</th>
           </tr>
            </thead>
            <tbody>
            @foreach ($DigitalCircuits as $DigitalCircuit)
                
            
                <tr class="bg-white lg:hover:bg-gray-100 flex lg:table-row flex-row lg:flex-row flex-wrap lg:flex-no-wrap mb-10 lg:mb-0">
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                       {{$DigitalCircuit->type}}
                    </td>
                 
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                        {{$DigitalCircuit->monthly_cost}}
                    </td>
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                        <span class="rounded bg-green-400 py-1 px-3 text-xs font-bold">{{$DigitalCircuit->design_type}}</span>
                    </td>
                
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                        <span class="rounded bg-green-400 py-1 px-3 text-xs font-bold">{{$DigitalCircuit->name_circuit}}</span>
                    </td>
                
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                        <span class="rounded bg-green-400 py-1 px-3 text-xs font-bold">{{$DigitalCircuit->speed}}</span>
                    </td>
                
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                        <span class="rounded bg-green-400 py-1 px-3 text-xs font-bold">{{$DigitalCircuit->location}}</span>
                    </td>
                
                </td>

                
                <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                    <button type="button" class="btn btn-outline-dark" data-toggle="modal" data-target="#modal{{$DigitalCircuit->id}}">
                        <i class="fa fa-pencil" aria-hidden="true"></i>  {{__('button.edit')}}
                      </button>
                    </td>
                <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                  <form action="{{route('DigitalCircuit_destroy',$DigitalCircuit->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit"  class="btn btn-outline-danger " onclick="return confirm('هل انت متاكد من الحذف')"><i class="fa fa-trash"></i> {{__('button.reomve')}}</button>
                        </form>
                </td>
            </tr>
           @endforeach
        </tbody>
    </table>
    <!-- component -->

{{-- edit-modal --}}
@foreach ($DigitalCircuits as $DigitalCircuit)

<div class="modal fade" id="modal{{$DigitalCircuit->id}}">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header justify-content-center text-center">  
        {{__('button.edit')}}
           </div>
          
           <!--Header End-->
        
           <!-- Modal Content-->
                        <form action="{{route('DigitalCircuit_update',$DigitalCircuit->id)}}" method="POST">
                            @csrf

                          
                                @method('PUT')
                                <div class="form-group">
                                    <div class="inline-block relative w-64">
                                        <label for="monthly_cost" >{{__('tables.dctype')}}</label>    <select name="type" 
                                        class="form-control">
                                          <option>أختار {{__('tables.dctype')}}</option>
                                          <option value="{{$DigitalCircuit->type}}" {{($DigitalCircuit->type == __('tables.Information center')) ? 'selected' : ''  }}>{{__('tables.Information center')}}</option>
                                          <option value="{{$DigitalCircuit->type}}" {{($DigitalCircuit->type == __('tables.city network')) ? 'selected' : ''  }}>{{__('tables.city network')}}</option>
                         
                                        </select>
                                    </div>
                                </div>
       
                            <div class="form-group">
        
                                <label for="monthly_cost" class="text-sm text-gray-600 dark:text-gray-400">{{__('tables.monthly_cost')}}</label>
                                <input type="text"  value="{{$DigitalCircuit->monthly_cost}}" name="monthly_cost" id="DigitalCircuit" placeholder="+1 (555) 1234-567" required class="form-control" />
                            </div>
                            
                             <div class="form-group" id="design_type" >
                                <label for="location" class="block mb-2 text-sm text-gray-600 dark:text-gray-400">{{__('tables.design_type')}}</label>
                                <input type="text" value="{{$DigitalCircuit->design_type}}" name="design_type" id="design_type" placeholder="" required class="form-control" />
                            </div>
                            <div class="form-group" id="name_circuit" >
                                <label for="location" class="block mb-2 text-sm text-gray-600 dark:text-gray-400">{{__('tables.name_circuit')}}</label>
                                <input type="text" value="{{$DigitalCircuit->name_circuit}}" name="name_circuit" id="name_circuit" placeholder="" required class="form-control" />
                            </div>
                            <div class="form-group" id="route_versionu" >
                                <label for="location" class="block mb-2 text-sm text-gray-600 dark:text-gray-400">{{__('tables.speed')}}</label>
                                <input type="text" value="{{$DigitalCircuit->speed}}" name="speed" id="location" placeholder="" required class="form-control" />
                            </div>
                       
                            <div class="form-group">
                                <label for="location" class="block mb-2 text-sm text-gray-600 dark:text-gray-400">{{__('tables.location')}}</label>
                                <input type="text"  value="{{$DigitalCircuit->location}}" name="location" id="location" placeholder="" required class="form-control" />
                            </div>
                            <div class="modal-footer">
                      
                                <button type="submit" class="btn btn-outline-success"><i class="fa fa-floppy-o" aria-hidden="true"></i>  {{__('button.save')}}</button>
     
                     
                            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i> {{__('button.close')}}</button>
                          </div>
                        </form>
                        </div>
      </div>
</div>
 @endforeach

      </div>
</main>
{{-- insert-modal --}}
<div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
  
        <!-- Modal Header -->
        <div class="modal-header justify-content-center text-center">
          <h4 class="modal-title">{{__('button.add')}}</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
             <!-- Modal Content-->
             <div class="modal-body justify-content-center text-center">
                           <div class="m-7">
                                <form action="{{route('DigitalCircuit_store')}}" method="POST">
                                        @csrf        
                                    
                                        <div class="form-group">
                                            <div class="inline-block relative w-64">
                                                <label for="monthly_cost" >{{__('tables.dctype')}}</label>
                                                <select name="type"  id=""
                                                class="form-control">
                                                  <option>أختار {{__('tables.dctype')}}</option>
                                                 <option value="{{__('tables.Information center')}}">{{__('tables.Information center')}}</option>
                                                 <option value="{{__('tables.city network')}}">{{__('tables.city network')}}</option>
                                 
                                             
                                                
                                                </select>
                                            </div>
                                        </div>

                          
                                <div class="form-group">
            
                                    <label for="monthly_cost" >{{__('tables.monthly_cost')}}</label>
                                    <input type="text" name="monthly_cost" id="monthly_cost" placeholder="" required class="form-control" />
                                </div>
                      
                                        <div class="form-group" id="design_type">
                                            <label for="monthly_cost" >{{__('tables.design_type')}}</label>
                                            <input type="text" name="design_type" id="design_type" placeholder="" required class="form-control" />
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="location" class="block mb-2 text-sm text-gray-600 dark:text-gray-400">{{__('tables.name_circuit')}}</label>
                                            <input type="text" name="name_circuit" id="name_circuit" placeholder="" required class="form-control" />
                                        </div>
                                    
                                        <div class="form-group" id="speed" >
                                            <label for="location" class="block mb-2 text-sm text-gray-600 dark:text-gray-400">{{__('tables.speed')}}</label>
                                            <input type="text" name="speed" id="speed" placeholder="" required class="form-control" />
                                        </div>
                       
                                <div class="form-group">
                                    <label for="location" class="block mb-2 text-sm text-gray-600 dark:text-gray-400">{{__('tables.location')}}</label>
                                    <input type="text" name="location" id="location" placeholder="" required class="form-control" />
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-outline-success"><i class="fa fa-floppy-o" aria-hidden="true"></i> {{__('button.save')}} </button>
                                        
                                    <p class="text-base text-center text-gray-400" id="result">
                                    </p>
                                </form>  
                                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i>  {{__('button.close')}}</button>
                                  </div>
                       </div>
                </div>
              </div>
</div>
             
{{-- ajax insert --}}
{{-- <script type="text/javascript">

        $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        
        
            $(".btn-insert").click(function(e){
        
                e.preventDefault();
        
                var serial = $("input[name=serialinsert]").val();
                var DigitalCircuit = $("input[name=DigitalCircuitinsert]").val();
                var statusf = $("input[name=statusinsert]").val();
                var provider_id = $("select[name=provider_idinsert]").val();
                var url = '{{ url('simcard/store') }}';
        
                $.ajax({
                   url:url,
                   method:'POST',
                   data:{
                    serial:serial, 
                        DigitalCircuit:DigitalCircuit, 
                        status:statusf, 
                        provider_id:provider_id
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

@endsection
