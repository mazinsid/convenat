@extends('layouts.app')

<meta name="csrf-token" content="{{ csrf_token() }}" />


@section('content')
<main class="sm:container sm:mx-auto sm:mt-10">
 

    {{-- card --}}
    <div class="card">
        <div class="card-header">
       <h3 class="title text-center"  >   {{__('header.simcard')}}</h3>
         </div>
        <div class="card-body justify-content-center text-center">
            <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus" aria-hidden="true"></i> {{__('button.add')}}</button>
    
        <table class="table">
            <thead class="text-center">
                <tr>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">{{__('tables.serial')}}</th>

                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">{{__('header.provider')}}</th>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">{{__('tables.phone')}}</th>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">{{__('tables.type sim')}}</th>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">{{__('tables.router t')}}</th>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">{{__('tables.router m')}}</th>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">{{__('tables.router v')}}</th>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">{{__('tables.status')}}</th>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">{{__('button.edit')}}</th>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">{{__('button.reomve')}}</th>
           </tr>
            </thead>
            <tbody>
            @foreach ($simcards as $simcard)
                
            
                <tr class="bg-white lg:hover:bg-gray-100 flex lg:table-row flex-row lg:flex-row flex-wrap lg:flex-no-wrap mb-10 lg:mb-0">
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                        <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase"> {{__('tables.name')}}</span>
                       {{$simcard->serial}}
                    </td>
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                        <span class="rounded bg-green-400 py-1 px-3 text-xs font-bold">{{$simcard->provider->name}}</span>
                    </td>
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                        <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase"></span>
                        {{$simcard->phone}}
                    </td>
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                        <span class="rounded bg-green-400 py-1 px-3 text-xs font-bold">{{$simcard->type}}</span>
                    </td>
                
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                        <span class="rounded bg-green-400 py-1 px-3 text-xs font-bold">{{$simcard->route_type != null ? $simcard->route_type : 'null' }}</span>
                    </td>
                
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                        <span class="rounded bg-green-400 py-1 px-3 text-xs font-bold">{{$simcard->route_model != null ? $simcard->route_model : 'null'}}</span>
                    </td>
                
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                        <span class="rounded bg-green-400 py-1 px-3 text-xs font-bold">{{$simcard->route_version != null ? $simcard->route_version : 'null'}}</span>
                    </td>
                
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                        {{$simcard->status}}
                    </td>

                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                        <button type="button" class="btn btn-outline-dark" data-toggle="modal" data-target="#modal{{$simcard->id}}">
                            <i class="fa fa-pencil" aria-hidden="true"></i>  {{__('button.edit')}}
                          </button>
                        </td>
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                      <form action="{{route('simcard_destroy',$simcard->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="button"  class="btn btn-outline-danger " onclick="return confirm('هل انت متاكد من الحذف')"><i class="fa fa-trash"></i> {{__('button.reomve')}}</button>
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
            {{$simcard->name}}
           </div>
          
           <!--Header End-->
        
           <!-- Modal Content-->
           <div class="modal-body justify-content-center text-center">
                        <form action="{{route('simcard_update',$simcard->id)}}" method="POST">
                            @csrf
                                @method('PUT')
                                 <div class="form-group">
                                    <div class="inline-block relative w-64">
                                        <label for="name" >{{__('tables.provider')}}</label>
                                        <select name="provider_id" 
                                        class="form-control">
                                          <option>أختار {{__('header.provider')}}</option>
                                          @foreach ($providers as $provider )
                                          <option value="{{$provider->id}}" {{($provider->id == $simcard->provider_id) ? 'selected' : ''  }}>{{$provider->name}}</option>
                         
                                          @endforeach
                                        
                                        </select>
                                    </div>
                                </div>

                             <div class="form-group">
                                <label for="name" >{{__('tables.name')}}</label>
                                <input value="{{$simcard->serial}}" type="text" name="serial" id="name"   required  class="form-control" />
                            </div>
                         
                             <div class="form-group">
        
                                <label for="phone" class="text-sm text-gray-600 dark:text-gray-400">{{__('tables.phone')}}</label>
                                <input type="text"  value="{{$simcard->phone}}" name="phone" id="phone" placeholder="+1 (555) 1234-567" required  class="form-control" />
                            </div>
                            
                             <div class="form-group">
                                <div class="inline-block relative w-64">
                                    <label for="name" >{{__('tables.type sim')}}</label>
                                    <select name="type" id="typesime"
                                    class="form-control">
                                      <option>أختار {{__('tables.type sim')}}</option>
                                    
                                      <option value="{{__('tables.type sim1')}}" 
                                      {{($simcard->type == __('tables.type sim1')) ? 'selected' : ''  }}
                                      >{{__('tables.type sim1')}}</option>
                                      <option value="{{__('tables.type sim2')}}" 
                                      {{($simcard->type == __('tables.type sim2')) ? 'selected' : ''  }}
                                      >{{__('tables.type sim2')}}</option>
                                      <option value="{{__('tables.type sim3')}}" 
                                      {{($simcard->type == __('tables.type sim3')) ? 'selected' : ''  }}
                                      >{{__('tables.type sim3')}}</option>
                                      <option value="{{__('tables.router')}}" 
                                      {{($simcard->type == __('tables.router')) ? 'selected' : ''  }}
                                      >{{__('tables.router')}}</option>
                     
                                    </select>
                                </div>
                            </div>
                            @if($simcard->type == __('tables.router'))
                            <div class="mb-6" id="route_typeu" >
                                <label for="location" >{{__('tables.router t')}}</label>
                                <input type="text" value="{{$simcard->route_type}}" name="route_type" id="location" placeholder="" required  class="form-control" />
                            </div>
                            <div class="mb-6" id="route_modelu" >
                                <label for="location" >{{__('tables.router m')}}</label>
                                <input type="text" value="{{$simcard->route_model}}" name="route_model" id="location" placeholder="" required  class="form-control" />
                            </div>
                            <div class="mb-6" id="route_versionu" >
                                <label for="location" >{{__('tables.router v')}}</label>
                                <input type="text" value="{{$simcard->route_version}}" name="route_version" id="location" placeholder="" required  class="form-control" />
                            </div>
                            @endif
                             <div class="form-group">
                                <label for="location" >{{__('tables.status')}}</label>
                                <input type="text"  value="{{$simcard->status}}" name="status" id="location" placeholder="" required  class="form-control" />
                            </div>
                            
                            
                            
       
                            <div class="modal-footer">
                      
                                <button type="submit" class="btn btn-outline-success"><i class="fa fa-floppy-o" aria-hidden="true"></i>  {{__('button.save')}}</button>
                                <button type="submit" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i> {{__('button.close')}}</button>
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
          <h4 class="modal-title">{{__('button.add')}}</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
             <!-- Modal Content-->
             <div class="modal-body justify-content-center text-center">
                           <div class="m-7">
                                <form action="{{route('simcard_store')}}" method="POST" novalidate> 
                                        @csrf        

                                         <div class="form-group">
                                            <div class="inline-block relative w-64">
                                                <label for="name" >{{__('header.provider')}}</label>
                                                <select name="provider_id" 
                                                class="form-control">
                                                  <option>أختار {{__('header.provider')}}</option>
                                                  @foreach ($providers as $provider )
                                                  <option value="{{$provider->id}}" >{{$provider->name}}</option>
                                 
                                                  @endforeach
                                                
                                                </select>
                                            </div>
                                        </div>

                                 <div class="form-group">
                                    <label for="name" >{{__('tables.serial')}}</label>
                                    <input type="text" name="serial" id="name"   required  class="form-control" />
                                </div>
                             
                                 <div class="form-group">
            
                                    <label for="phone" class="text-sm text-gray-600 dark:text-gray-400">{{__('tables.phone')}}</label>
                                    <input type="text" name="phone" id="phone" placeholder="+1 (555) 1234-567" required  class="form-control" />
                                </div>
                                    <div class="form-group">
                                            <div class="inline-block relative w-64">
                                                <label for="name" >{{__('tables.type sim')}}</label>
                                                <select name="type" id="typesim"
                                                class="form-control">
                                                  <option>أختار {{__('tables.type sim')}}</option>
                                                
                                                  <option value="{{__('tables.type sim1')}}" >{{__('tables.type sim1')}}</option>
                                                  <option value="{{__('tables.type sim2')}}" >{{__('tables.type sim2')}}</option>
                                                  <option value="{{__('tables.type sim3')}}" >{{__('tables.type sim3')}}</option>
                                                  <option value="{{__('tables.router')}}" >{{__('tables.router')}}</option>
                                 
                                                </select>
                                            </div>
                                        </div>
                                        <div class="mb-6" id="route_type-i" >
                                            <label for="location" >{{__('tables.router t')}}</label>
                                            <input type="text" name="route_type" id="location" placeholder="" required  class="form-control" />
                                        </div>
                                        <div class="mb-6" id="route_model-i" >
                                            <label for="location" >{{__('tables.router m')}}</label>
                                            <input type="text" name="route_model" id="location" placeholder="" required  class="form-control" />
                                        </div>
                                        <div class="mb-6" id="route_version-i" >
                                            <label for="location" >{{__('tables.router v')}}</label>
                                            <input type="text" name="route_version" id="location" placeholder="" required  class="form-control" />
                                        </div>

                                 <div class="form-group">
                                    <label for="location" >{{__('tables.status')}}</label>
                                    <input type="text" name="status" id="location" placeholder="" required  class="form-control" />
                                </div>
                                
                            
                              
                                <div class="form-group modal-footer">
                                    <button type="submit" class="btn btn-outline-success"><i class="fa fa-floppy-o" aria-hidden="true"></i> {{__('button.save')}} </button>
                                        
                                 
                                    <button type="submit" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i>  {{__('button.close')}}</button>
                                </div>
                        </form>  
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

        <script type="text/javascript">
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
            </script>
@endsection
