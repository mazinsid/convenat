@extends('layouts.app')
<meta name="csrf-token" content="{{ csrf_token() }}" />

@section('content')
<main class="sm:container sm:mx-auto sm:mt-10">

  {{-- card --}}
  <div class="card">
    <div class="card-header">
   <h3 class="title text-center"  >   {{__('ar.mobile_type')}}</h3>
     </div>
    <div class="card-body justify-content-center text-center">
        <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus" aria-hidden="true"></i> {{__('ar.add')}}</button>

    <table class="table">
        <thead class="text-center">
                <tr>
                   <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">{{__('ar.mobile_fact')}}</th>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">{{__('ar.mobile_model')}}</th> 
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">{{__('ar.mobile_release_date')}}</th>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">{{__('ar.edit')}}</th>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">{{__('ar.reomve')}}</th>
        
           </tr>
            </thead>
            <tbody>
            @foreach ($device_phones as $device_phone)
                <tr class="bg-white lg:hover:bg-gray-100 flex lg:table-row flex-row lg:flex-row flex-wrap lg:flex-no-wrap mb-10 lg:mb-0">
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                        <span class="rounded bg-green-400 py-1 px-3 text-xs font-bold">{{$device_phone->type_phone}}</span>
                    </td>
                
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                        <span class="rounded bg-green-400 py-1 px-3 text-xs font-bold">{{$device_phone->phone_model}}</span>
                    </td>
                
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                        <span class="rounded bg-green-400 py-1 px-3 text-xs font-bold">{{$device_phone->release_date}}</span>
                    </td>
                
                </td>

                <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                    <button type="button" class="btn btn-outline-dark" data-toggle="modal" data-target="#modal{{$device_phone->id}}">
                        <i class="fa fa-pencil-alt" aria-hidden="true"></i>  {{__('ar.edit')}}
                      </button>
                    </td>
                <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                  <form action="{{route('DevicePhone_destroy',$device_phone->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit"  class="btn btn-outline-danger " onclick="return confirm('{{__('ar.reomve_confirm')}} {{__('ar.mobile')}}')"><i class="fa fa-trash"></i> {{__('ar.reomve')}}</button>
                        </form>
                </td>
            </tr>
            
            
           
                
                
           @endforeach
        </tbody>
    </table>
    <!-- component -->

{{-- edit-modal --}}
{{-- edit-modal --}}
@foreach ($device_phones as $device_phone)

<div class="modal fade" id="modal{{$device_phone->id}}">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        
              <h4 class="modal-title modal-header justify-content-center text-center">{{$device_phone->type_phone}} {{$device_phone->phone_model}}</h4> 
       
           
          
           <!--Header End-->
           <div class="modal-body justify-content-center text-center">
  
        
           <!-- Modal Content-->
    
                <form action="{{route('DevicePhone_update',$device_phone->id)}}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class=" form-group" id="route_modelu" >
                                <label for="location"  >{{__('ar.mobile_type')}}</label>
                                <input type="text" value="{{$device_phone->type_phone}}" name="type_phone" id="location" placeholder="" required class="form-control" />
                            </div>
                            <div class=" form-group" id="route_versionu" >
                                <label for="location"  >{{__('ar.mobile_model')}}</label>
                                <input type="text" value="{{$device_phone->phone_model}}" name="phone_model" id="location" placeholder="" required class="form-control" />
                            </div>
                       
                            
                            
                            <div class=" form-group">
                                    <label for="location"  >{{__('ar.mobile_release_date')}}</label>
                                    <input type="date" value="{{$device_phone->release_date}}" name="release_date" id="release_date" placeholder="" required class="form-control" />
                                </div>
                            
                            
       
                            <div class="modal-footer">
                      
                                <button type="submit" class="btn btn-outline-success"><i class="fa fa-save" aria-hidden="true"></i>  {{__('ar.save')}}</button>
     
                    
                            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> {{__('ar.close')}}</button>
                          </div>
                        </form>
                        </div>
      </div>
</div>

 @endforeach
        </div>
     </div>

{{-- insert-modal --}}
<div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
  
        <!-- Modal Header -->
        <div class="modal-header justify-content-center text-center">
          <h4 class="modal-title">{{__('ar.mobile_add')}}</h4>
          
        </div>
             <!-- Modal Content-->
             <div class="modal-body justify-content-center text-center">
  
                                <form action="{{route('DevicePhone_store')}}" method="POST">
                                        @csrf        
                                        
                                        <div class=" form-group" id="route_model-i">
                                            <label for="location"  >{{__('ar.mobile_type')}}</label>
                                            <input type="text" name="type_phone" id="type_phone" placeholder="" required class="form-control" />
                                        </div>
                                    
                                        <div class=" form-group" id="route_version-i" >
                                            <label for="location"  >{{__('ar.mobile_model')}}</label>
                                            <input type="text" name="phone_model" id="phone_model" placeholder="" required class="form-control" />
                                        </div>
                       
                                <div class=" form-group">
                                    <label for="location"  >{{__('ar.mobile_release_date')}}</label>
                                    <input type="date" name="release_date" id="release_date" placeholder="" required class="form-control" />
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-outline-success"><i class="fa fa-save" aria-hidden="true"></i> {{__('ar.save')}} </button>
                                        
                                    <p class="text-base text-center text-gray-400" id="result">
                                    </p>   
                                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i>  {{__('ar.close')}}</button>
                                </div>
                                </form>  
                                 
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
</main>
@endsection
