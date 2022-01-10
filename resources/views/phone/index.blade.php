@extends('layouts.app')
<meta name="csrf-token" content="{{ csrf_token() }}" />

@section('content')
<main class="sm:container sm:mx-auto sm:mt-10">

    {{-- card --}}
    <div class="card">
        <div class="card-header">
       <h3 class="title text-center"  >   {{__('header.phones')}}</h3>
         </div>
        <div class="card-body justify-content-center text-center">
            <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus" aria-hidden="true"></i> {{__('button.add')}}</button>
    
        <table class="table">
            <thead class="text-center">
                <tr>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">{{__('tables.serial')}}</th>

                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">{{__('header.device_privete')}}</th>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">{{__('tables.mobile_number')}}</th>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">{{__('tables.Mobile_features')}}</th>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">{{__('tables.type_phone')}}</th>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">{{__('tables.phone_model')}}</th>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">{{__('tables.release_date')}}</th>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">{{__('button.edit')}}</th>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">{{__('button.reomve')}}</th>
           </tr>
            </thead>
            <tbody>
            @foreach ($phones as $phone)
                
            
                <tr class="bg-white lg:hover:bg-gray-100 flex lg:table-row flex-row lg:flex-row flex-wrap lg:flex-no-wrap mb-10 lg:mb-0">
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                       {{$phone->serial}}
                    </td>
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                        <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase"></span>
                        <span class="rounded bg-green-400 py-1 px-3 text-xs font-bold">{{$phone->type}}</span>
                    </td>
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                        <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase"></span>
                        {{$phone->mobile_number}}
                    </td>
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                        <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase"></span>
                        <span class="rounded bg-green-400 py-1 px-3 text-xs font-bold">{{$phone->mobile_features}}</span>
                    </td>
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                        <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase"></span>
                        <span class="rounded bg-green-400 py-1 px-3 text-xs font-bold">{{$phone->DevicePhone->type_phone}}</span>
                    </td>
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                        <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase"></span>
                        <span class="rounded bg-green-400 py-1 px-3 text-xs font-bold">{{$phone->DevicePhone->phone_model}}</span>
                    </td>
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                        <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase"></span>
                        <span class="rounded bg-green-400 py-1 px-3 text-xs font-bold">{{$phone->DevicePhone->release_date}}</span>
                    </td>
                </td>

                <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                    <button type="button" class="btn btn-outline-dark" data-toggle="modal" data-target="#modal{{$phone->id}}">
                        <i class="fa fa-pencil" aria-hidden="true"></i>  {{__('button.edit')}}
                      </button>
                    </td>
                <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                  <form action="{{route('phone_destroy',$phone->id)}}" method="post">
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
@foreach ($phones as $phone)
<div class="modal fade" id="modal{{$phone->id}}">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header justify-content-center text-center">  
           {{__('button.edit')}}
           </div>
          
           <!--Header End-->
        
           <!-- Modal Content-->
           <div class="modal-body justify-content-center text-center">
                        <form action="{{route('phone_update',$phone->id)}}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="name" >{{__('tables.serial')}}</label>
                                <input value="{{$phone->serial}}" type="text" name="serial" id="name"  required class="form-control" />
                            </div>

                               
                                <div class="form-group">
                                    <div class="inline-block relative w-64">
                                        <label for="location"  >{{__('header.device_privete')}}</label>
                                        <select name="type" 
                                        class="form-control">
                                          <option>أختار {{__('header.type')}}</option>
                                          <option value="{{$phone->type}}" {{($phone->type == __('tables.phone_public')) ? 'selected' : ''  }}>{{$phone->type}}</option>
                                          <option value="{{$phone->type}}" {{($phone->type == __('tables.phone_praived')) ? 'selected' : ''  }}>{{$phone->type}}</option>
                         
                                        </select>
                                    </div>
                                </div>
       
                            <div class="form-group">
        
                                <label for="phone" class="text-sm text-gray-600 dark:text-gray-400">{{__('tables.mobile_number')}}</label>
                                <input type="text"  value="{{$phone->mobile_number}}" name="mobile_number" id="phone" placeholder="+1 (555) 1234-567" required class="form-control" />
                            </div>
                            
                             <div class="mb-6" id="route_typeu" >
                                <label for="location" >{{__('tables.Mobile_features')}}</label>
                                <input type="text" value="{{$phone->mobile_features}}" name="mobile_features" id="location" placeholder="" required class="form-control" />
                            </div>
                        
       
                        
                        <div class="modal-footer">
                          
                                <button type="submit" class="btn btn-outline-success"><i class="fa fa-floppy-o" aria-hidden="true"></i>  {{__('button.save')}}</button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i> {{__('button.close')}}</button>
                          
                        </form>
                          </div>
                          
                        </div>
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
          <h4 class="modal-title">{{__('button.add')}}</h4>
        </div>
             <!-- Modal Content-->
             <div class="modal-body justify-content-center text-center">
                           <div class="m-7">
                                <form action="{{route('phone_store')}}" method="POST" novalidate>
                                        @csrf        
                                        <div class="form-group">
                                            <div class="inline-block relative w-64">
                                                <label for="location"  >{{__('header.type')}}</label>
                                                <select name="device_phone_id" 
                                                class="form-control">
                                                  <option>أختار {{__('header.type')}}</option>
                                                  @foreach ($deviecs as $deviec)
                                                      
                                                  @endforeach
                                                  <option value="{{$deviec->id}}" >{{$deviec->type_phone}} : {{$deviec->phone_model}}</option>
                                           
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="name" >{{__('tables.serial')}}</label>
                                            <input type="text" name="serial" id="name"  required class="form-control" />
                                        </div>

                                        <div class="form-group">
                                            <div class="inline-block relative w-64">
                                                <label for="location"  >{{__('header.device_privete')}}</label>
                                                <select name="type"  id="typephone"
                                                class="form-control">
                                                  <option>أختار {{__('header.type')}}</option>
                                                 <option value="{{__('tables.phone_public')}}">{{__('tables.phone_public')}}</option>
                                                 <option value="{{__('tables.phone_praived')}}">{{__('tables.phone_praived')}}</option>
                                 
                                             
                                                
                                                </select>
                                            </div>
                                        </div>

                                        <div id="phone_detiels">
                                <div class="form-group">
            
                                    <label for="phone" class="text-sm text-gray-600 dark:text-gray-400">{{__('tables.mobile_number')}}</label>
                                    <input type="text" name="mobile_number" id="mobile_number" placeholder="+1 (555) 1234-567" required class="form-control" />
                                </div>
                      
                                        <div class="form-group" id="Mobile_features-i" >
                                            <label for="location" >{{__('tables.Mobile_features')}}</label>
                                            <input type="text" name="mobile_features" id="mobile_features" placeholder="" required class="form-control" />
                                        </div>
                                    </div>
                             
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-outline-success"><i class="fa fa-floppy-o" aria-hidden="true"></i> {{__('button.save')}} </button>
                                                
                                            <p class="text-base text-center text-gray-400" id="result">
                                            </p>
                                         
                                            <button type="submit" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i>  {{__('button.close')}}</button>
                                          </div>
                                        </form> 
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

        <script type="text/javascript">
  $( "#typephone" ).change(function() 
{
    var nationality = $('select[id="typephone"]').val();

if ( nationality == 'جوال رسمي') {
    $('#phone_detiels').show();  
}else{
    $('#phone_detiels').hide();  
}
});
            </script>
@endsection
