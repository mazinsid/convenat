@extends('layouts.app')
<meta name="csrf-token" content="{{ csrf_token() }}" />
@section('content')
<main class="sm:container sm:mx-auto sm:mt-10">

  {{-- card --}}
  <div class="card">
    <div class="card-header">
   <h3 class="title text-center"  >   {{__('ar.menus_wireless_accessory')}}</h3>
     </div>
    <div class="card-body justify-content-center text-center">
        <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus" aria-hidden="true"></i> {{__('ar.add')}}</button>

    <table class="table">
        <thead class="text-center">
            <thead>
                <tr class="text-center">
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">{{__('ar.menus_wireless_accessory')}}</th>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">{{__('ar.type')}}</th>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">{{__('ar.edit')}}</th>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">{{__('ar.reomve')}}</th>
              </tr>
            </thead>
            <tbody>
            @foreach ($accessores as $accessory)
                
            
                <tr class="bg-white lg:hover:bg-gray-100 flex lg:table-row flex-row lg:flex-row flex-wrap lg:flex-no-wrap mb-10 lg:mb-0">
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                       {{$accessory->name}}
                    </td>
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                        {{$accessory->ptype->name}} : {{$accessory->ptype->pmodel->name}}
                    </td>
                 
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                        <button type="button" class="btn btn-outline-dark" data-toggle="modal" data-target="#modal{{$accessory->id}}">
                            <i class="fa fa-pencil-alt" aria-hidden="true"></i>  {{__('ar.edit')}}
                          </button>
                        </td>
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                      <form action="{{route('accessory_destroy',$accessory->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit"  class="btn btn-outline-danger " onclick="return confirm('{{__('ar.reomve_confirm')}} {{__('ar.accessory')}}')"><i class="fa fa-trash"></i> {{__('ar.reomve')}}</button>
                            </form>
                    </td>
                </tr>
               @endforeach
            </tbody>
        </table>
        <!-- component -->

{{-- edit-modal --}}
@foreach ($accessores as $accessory)

<div class="modal fade" id="modal{{$accessory->id}}">
    <div class="modal-dialog">
        <div class="modal-content">
        
          <!-- Modal Header -->
           
            <div class="modal-header justify-content-center text-center">
          <h4 class="modal-title">{{$accessory->name}}</h4>
         
        </div>
           <!--Header End-->
           <div class="modal-body justify-content-center text-center">
         
           <!-- Modal Content-->
                       <form action="{{route('accessory_update',$accessory->id)}}" method="POST">
                        @csrf
                            @method('PUT')
                  
                            <div class="form-group">
                                <label for="name"  >{{__('ar.accessory')}}</label>
                                <input value="{{$accessory->name}}" type="text" name="name" id="name"    required   class="form-control" />
                            </div>

                            <div class="form-group">
                            <div class="inline-block relative w-64">
                              <label for="name"  >{{__('ar.type')}}</label>
                              <select name="ptype_id" 
                                class="form-control">
                                
                                  @foreach ($types as $type )
                                  <option value="{{$type->id}}" {{($type->id == $accessory->ptype_id) ? 'selected' : ''  }}>{{$type->name}} : {{$type->pmodel->name}}</option>
                 
                                  @endforeach
                                
                                </select> 
                            
                            </div>
                            </div>
                            <div class="modal-footer">
                      
                                <button type="submit" class="btn btn-outline-success"><i class="fa fa-save" aria-hidden="true"></i>  {{__('ar.save')}}</button>
     
                      
                            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> {{__('ar.close')}}</button>
                          </div>
                        </form>
                        </div>
      </div>
    </div> 
  </div> 

 @endforeach

    </div>
  </div>
</main>
{{-- insert-modal --}}
<div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
  
        <!-- Modal Header -->
        <div class="modal-header justify-content-center text-center">
          <h4 class="modal-title">{{__('ar.accessory_add')}}</h4>
         
        </div>
             <!-- Modal Content-->
             <div class="modal-body justify-content-center text-center">
                            <form action="{{route('accessory_store')}}" method="POST">
                                    @csrf
                        
                            <div class="form-group">
                                <label for="name"  >{{__('ar.accessory')}}</label>
                                <input type="text" name="name" id="name"    required   class="form-control" />
                            </div>
                            <div class="form-group">
                                <div class="inline-block relative w-64">
                                  <label for="name"  >{{__('ar.type')}}</label>
                                  <select name="type_id" 
                                    class="form-control">
                                     
                                      @foreach ($types as $type )
                                      <option value="{{$type->id}}">{{$type->name}} : {{$type->pmodel->name}}</option>
                     
                                      @endforeach
                                    
                                    </select>
                                </div>
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
    
            var namef = $("input[name=nameinsert]").val();
            var type_idI = $("select[name=type_idinsert]").val();

            var url = '{{ url('accessory/store') }}';
    
            $.ajax({
               url:url,
               method:'POST',
               data:{
                name:namef, 
                type_id:type_idI, 
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
