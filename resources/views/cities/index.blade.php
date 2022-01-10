@extends('layouts.app')
<meta name="csrf-token" content="{{ csrf_token() }}" />

@section('content')
<main class="sm:container sm:mx-auto sm:mt-10">

    {{-- card --}}
    <div class="card">
        <div class="card-header">
       <h3 class="title text-center"  >   {{__('ar.menus_cities')}}</h3>
         </div>
        <div class="card-body justify-content-center text-center">
            <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus" aria-hidden="true"></i> {{__('ar.add')}}</button>
    
        <table class="table">
            <thead class="text-center">
                           <tr>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">{{__('ar.citys')}}</th>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">{{__('ar.phone')}}</th>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">{{__('ar.location')}}</th>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">{{__('ar.regions')}}</th>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">{{__('ar.edit')}}</th>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">{{__('ar.reomve')}}</th>
             </tr>
            </thead>
            <tbody>
            @foreach ($cities as $city)
                
            
                <tr class="bg-white lg:hover:bg-gray-100 flex lg:table-row flex-row lg:flex-row flex-wrap lg:flex-no-wrap mb-10 lg:mb-0">
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                       {{$city->name}}
                    </td>
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                         {{$city->phone}}
                    </td>
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                         {{$city->location}}
                    </td>
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                        <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase"></span>
                        <span class="rounded bg-green-400 py-1 px-3 text-xs font-bold">{{$city->region->name}}</span>
                    </td>
              
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                        <button type="button" class="btn btn-outline-dark" data-toggle="modal" data-target="#modal{{$city->id}}">
                            <i class="fa fa-pencil-alt" aria-hidden="true"></i>  {{__('ar.edit')}}
                          </button>
                        </td>
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                      <form action="{{route('users_destroy',$city->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="button"  class="btn btn-outline-danger " onclick="return confirm('{{__('ar.reomve_confirm')}} {{__('ar.citys')}}')"><i class="fa fa-trash"></i> {{__('ar.reomve')}}</button>
                            </form>
                    </td>
                </tr>
               @endforeach
            </tbody>
        </table>
        <!-- component -->
    </div>
    
{{-- edit-modal --}}
@foreach ($cities as $city)

<div class="modal fade" id="modal{{$city->id}}">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
  
             <h4 class="modal-title modal-header justify-content-center text-center">{{__('ar.city')}} {{$city->name}}</h4>
           <!--Header End-->
        
           <!-- Modal Content-->
           <div class="modal-body justify-content-center text-center"> 
                 <form action="{{route('cities_update',$city->id)}}" method="POST">
                            @csrf
                                @method('PUT')
                      
                            <div class="form-group">
                                <label for="name"  >{{__('ar.names')}} {{__('ar.citys')}}</label>
                                <input value="{{$city->name}}" type="text" name="name" id="name"  required  class="form-control" />
                            </div>
                         
                            <div class="form-group">
        
                                <label for="phone"  >{{__('ar.phone')}}</label>
                                <input type="text"  value="{{$city->phone}}" name="phone" id="phone" placeholder="" required  class="form-control" />
                            </div>
                            
                            <div class="form-group">
                                <label for="location"  >{{__('ar.location')}}</label>
                                <input type="text"  value="{{$city->location}}" name="location" id="location" placeholder=""   class="form-control" />
                            </div>
                            

                                <div class="form-group">
                                    <div class="inline-block relative w-64">
                                        <label for="location"  >{{__('ar.regions')}}</label>
                                 
                                        <select name="regions_id" required
                                        class="form-control">
                                 
                                          @foreach ($regions as $region )
                                          <option value="{{$city->regions_id}}" {{($region->id == $city->regions_id) ? 'selected' : ''  }}>{{$region->name}}</option>
                         
                                          @endforeach
                                        
                                        </select>
                                    </div>
                                </div>
                                <div class="modal-footer">
                      
                                    <button type="submit" class="btn btn-outline-success"><i class="fa fa-save" aria-hidden="true"></i>  {{__('ar.save')}}</button>
         
                            </form>
                                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> {{__('ar.close')}}</button>
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
          <h4 class="modal-title">{{__('ar.city_add')}}</h4>
      
        </div>
             <!-- Modal Content-->
             <div class="modal-body justify-content-center text-center">
                           <div class="m-7">
                                <form action="{{route('cities_store')}}" method="POST">
                                        @csrf
                               <div class="form-group">
                                    <label for="name"  >{{__('ar.names')}} {{__('ar.citys')}}</label>
                                    <input type="text" name="name" id="name" placeholder="" required  class="form-control" />
                                </div>
                             
                                <div class="form-group">
            
                                    <label for="phone"  >{{__('ar.phone')}}</label>
                                    <input type="text" name="phone" id="phone" placeholder="" required  class="form-control" />
                                </div>
                                
                                <div class="form-group">
                                    <label for="location"  >{{__('ar.location')}}</label>
                                    <input type="text" name="location" id="location" placeholder=""   class="form-control" />
                                </div>
                                
                                <div class="form-group">
                                    <div class="inline-block relative w-64">
                                        <label for="location"  >{{__('ar.regions')}}</label>
                                 
                                        <select name="regions_id" required
                                        class="form-control">
                                          
                                          @foreach ($regions as $region )
                                          <option value="{{$region->id}}">{{$region->name}}</option>
                         
                                          @endforeach
                                        
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
                       </div>
              
      </div>
    </div>
</div>

                       @endsection
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
                var phone = $("input[name=phoneinsert]").val();
                var location = $("input[name=locationinsert]").val();
                var regions_id = $("select[name=regions_idinsert]").val();
                var url = '{{ url('cities/store') }}';
        
                $.ajax({
                   url:url,
                   method:'POST',
                   data:{
                        namen:namef, 
                        phone:phone, 
                        location:location, 
                        regions_id:regions_id
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

