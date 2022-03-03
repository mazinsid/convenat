@extends('layouts.app')

<meta name="csrf-token" content="{{ csrf_token() }}" />


@section('content')
<main class="sm:container sm:mx-auto sm:mt-10">
 

    {{-- card --}}
    <div class="card">
        <div class="card-header">
       <h3 class="title text-center"  >   {{__('ar.menus_simcard')}}</h3>
         </div>
        <div class="card-body justify-content-center text-center">
            <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus" aria-hidden="true"></i> {{__('ar.add')}}</button>
    
        <table class="table">
            <thead class="text-center">
                <tr>
                    
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">{{__('ar.menus_provider')}}</th>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">{{__('ar.sim_data')}}</th>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">{{__('ar.serial')}}</th>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">{{__('ar.sim_type')}}</th>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">{{__('ar.sim_use_type')}}</th>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">{{__('ar.edit')}}</th>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">{{__('ar.reomve')}}</th>
           </tr>
            </thead>
            <tbody>
            @foreach ($simcards as $simcard)
                
            
                <tr class="bg-white lg:hover:bg-gray-100 flex lg:table-row flex-row lg:flex-row flex-wrap lg:flex-no-wrap mb-10 lg:mb-0">
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                        <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase"></span>
                       
                       {{$simcard->provider->name}}
                    </td>
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                        <span class="rounded bg-green-400 py-1 px-3 text-xs font-bold">{{$simcard->phone}}</span>
                    </td>
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                        <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase"></span>
                        {{$simcard->serial}}
                    </td>
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                        <span class="rounded bg-green-400 py-1 px-3 text-xs font-bold">{{$simcard->type}}</span>
                    </td>
                
         
                
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                        {{$simcard->status}}
                    </td>

                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                        <button type="button" class="btn btn-outline-dark" data-toggle="modal" data-target="#modal{{$simcard->id}}">
                            <i class="fa fa-pencil-alt" aria-hidden="true"></i>  {{__('ar.edit')}}
                          </button>
                        </td>
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                      <form action="{{route('simcard_destroy',$simcard->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit"  class="btn btn-outline-danger " onclick="return confirm('{{__('ar.reomve_confirm')}} {{__('ar.sim')}}')"><i class="fa fa-trash"></i> {{__('ar.reomve')}}</button>
                            </form>
                    </td>
                </tr>
               @endforeach
            </tbody>
        </table>
        <!-- component -->

{{-- edit-modal --}}
@foreach ($simcards as $simcard)
<div class="modal fade" id="modal{{$simcard->id}}">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header justify-content-center text-center">  
             
            <h4 class="modal-title">{{$simcard->phone}}</h4>
           </div>
          
           <!--Header End-->
        
           <!-- Modal Content-->
           <div class="modal-body justify-content-center text-center">
                        <form action="{{route('simcard_update',$simcard->id)}}" method="POST">
                            @csrf
                                @method('PUT')
                                 <div class="form-group">
                                    <div class="inline-block relative w-64">
                                        <label for="name" >{{__('ar.provider')}}</label>
                                        <select name="provider_id"  required
                                        class="form-control">
                                    
                                          @foreach ($providers as $provider )
                                          <option value="{{$provider->id}}" {{($provider->id == $simcard->provider_id) ? 'selected' : ''  }}>{{$provider->name}}</option>
                         
                                          @endforeach
                                        
                                        </select>
                                    </div>
                                </div>

                             
                         
                             <div class="form-group">
        
                                <label for="phone" class="text-sm text-gray-600 dark:text-gray-400">{{__('ar.sim_data')}}</label>
                                <input type="text"  value="{{$simcard->phone}}" name="phone" id="phone" placeholder="" required  class="form-control" />
                            </div>
                            <div class="form-group">
                                <label for="name" >{{__('ar.serial')}}</label>
                                <input value="{{$simcard->serial}}" type="text" name="serial" id="name"  required class="form-control" />
                            </div>
                            
                             <div class="form-group">
                                <div class="inline-block relative w-64">
                                    <label for="name" >{{__('ar.sim_type')}}</label>
                                    <select name="type" id="typesime" required
                                    class="form-control">
                                     
                                   
                                      <option value="{{__('ar.sim_encodedd')}}" {{($simcard->type == __('ar.sim_encodedd')) ? 'selected' : ''  }}>{{__('ar.sim_encodedd')}}</option>
                                      <option value="{{__('ar.sim_restricted')}}" {{($simcard->type == __('ar.sim_restricted')) ? 'selected' : ''  }}>{{__('ar.sim_restricted')}}</option>
                                      <option value="{{__('ar.sim_open')}}" {{($simcard->type == __('ar.sim_open')) ? 'selected' : ''  }}>{{__('ar.sim_open')}}</option>
                                    
                    
                                    </select>
                                </div>
                            </div>
                        
                            
                            <div class="form-group">
                                <div class="inline-block relative w-64">
                                    <label for="name" >{{__('ar.sim_use_type')}}</label>
                                    <select name="status" id="status" required
                                    class="form-control">
                                     
                                    
                                      <option value="{{__('ar.sim_phone')}}" {{($simcard->status == __('ar.sim_phone')) ? 'selected' : ''  }}>{{__('ar.sim_phone')}}</option>
                                      <option value="{{__('ar.sim_data_cal')}}" {{($simcard->status == __('ar.sim_data_cal')) ? 'selected' : ''  }}>{{__('ar.sim_data_cal')}}</option>
                                      <option value="{{__('ar.sim_data_phone')}}" {{($simcard->status == __('ar.sim_data_phone')) ? 'selected' : ''  }}>{{__('ar.sim_data_phone')}}</option>
                                    
                    
                                    </select>
                                </div>
                            </div>
                            
                            
                            
       
                            <div class="modal-footer">
                      
                                <button type="submit" class="btn btn-outline-success"><i class="fa fa-save" aria-hidden="true"></i>  {{__('ar.save')}}</button>
                                <button type="submit" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> {{__('ar.close')}}</button>
                            </div>
                        </form>
                         
           </div>
    </div>
</div>
           <!-- End of Modal Content-->
</div>
 @endforeach
       
    </div>
    </div>
</main>
{{-- insert-modal --}}
<div class="modal fade" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
  
        <!-- Modal Header -->
        <div class="modal-header justify-content-center text-center">
          <h4 class="modal-title">{{__('ar.simcard_add')}}</h4>
           
        </div>
             <!-- Modal Content-->
             <div class="modal-body justify-content-center text-center">
                          
                                <form action="{{route('simcard_store')}}" method="POST" novalidate> 
                                        @csrf        

                                         <div class="form-group">
                                            <div class="inline-block relative w-64">
                                                <label for="name" >{{__('ar.provider')}}</label>
                                                <select name="provider_id"  required
                                                class="form-control">
                                             
                                                  @foreach ($providers as $provider )
                                                  <option value="{{$provider->id}}" >{{$provider->name}}</option>
                                 
                                                  @endforeach
                                                
                                                </select>
                                            </div>
                                        </div>
                                        
                                          <div class="form-group">
            
                                    <label for="phone" class="text-sm text-gray-600 dark:text-gray-400">{{__('ar.sim_data')}}</label>
                                    <input type="text" name="phone" id="phone" placeholder="" required  class="form-control" />
                                </div>


                                 <div class="form-group">
                                    <label for="name" >{{__('ar.serial')}}</label>
                                     
                                    <input type="text" name="serial" id="name" required class="form-control" />
                                </div>
                             
                               
                                    <div class="form-group">
                                            <div class="inline-block relative w-64">
                                                <label for="name" >{{__('ar.sim_type')}}</label>
                                                <select name="type" id="typesim" required
                                                class="form-control">
                                                
                                                
                                                  <option value="{{__('ar.sim_encodedd')}}" >{{__('ar.sim_encodedd')}}</option>
                                                  <option value="{{__('ar.sim_restricted')}}" >{{__('ar.sim_restricted')}}</option>
                                                  <option value="{{__('ar.sim_open')}}" >{{__('ar.sim_open')}}</option>
                                                  
                                
                                                </select>
                                            </div>
                                        </div>
                                        
                      
                            
                                <div class="form-group">
                                <div class="inline-block relative w-64">
                                    <label for="name" >{{__('ar.sim_use_type')}}</label>
                                    <select name="status" id="" required
                                    class="form-control">
                                     
                                     
                                      <option value="{{__('ar.sim_phone')}}">{{__('ar.sim_phone')}}</option>
                                      <option value="{{__('ar.sim_data_cal')}}">{{__('ar.sim_data_cal')}}</option>
                                      <option value="{{__('ar.sim_data_phone')}}">{{__('ar.sim_data_phone')}}</option>
                                    
                    
                                    </select>
                                </div>
                            </div>
                            
                            
                              
                               
                                
                                   <div class="modal-footer">
                                    <button type="submit" class="btn btn-outline-success"><i class="fa fa-save" aria-hidden="true"></i> {{__('ar.save')}} </button>
                                        
                                    <p class="text-base text-center text-gray-400" id="result">
                                    </p>
                                </form>  
                                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i>  {{__('ar.close')}}</button>
                                  </div>
                         
              
               <!-- End of Modal Content-->
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
                var phone = $("input[name=phoneinsert]").val();
                var statusf = $("input[name=statusinsert]").val();
                var provider_id = $("select[name=provider_idinsert]").val();
                var url = '{{ url('simcard/store') }}';
        
                $.ajax({
                   url:url,
                   method:'POST',
                   data:{
                    serial:serial, 
                        phone:phone, 
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

   {{--      <script type="text/javascript">
  $("#typesim").change(function() 
{

var nationality = $('select[id="typesim"]').val();

if ( nationality == 'راوتر') {
    $('#route_type-i').show();  
    $('#route_model-i').show();  
    $('#route_version-i').show();  

}else{
    $('#route_type-i').hide();  
    $('#route_model-i').hide();  
    $('#route_version-i').hide();  

}
});
            </script> --}}
@endsection
