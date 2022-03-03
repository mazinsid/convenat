@extends('layouts.app')
<meta name="csrf-token" content="{{ csrf_token() }}" />
@section('content')
<main class="sm:container sm:mx-auto sm:mt-10">
    <div class="w-full sm:px-6">

        @if (session('status'))
            <div class="text-sm border border-t-8 rounded text-green-700 border-green-600 bg-green-100 px-3 py-4 mb-4" role="alert">
                {{ session('status') }}
            </div>
        @endif
    </div>
  {{-- card --}}
  <div class="card">
    <div class="card-header">
   <h3 class="title text-center"  >   {{__('ar.regionss')}}</h3>
     </div>
    <div class="card-body justify-content-center text-center">
        <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus" aria-hidden="true"></i> {{__('ar.add')}}</button>

    <table class="table">
        <thead class="text-center">
                <tr>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">{{__('ar.regions_code')}}</th>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">{{__('ar.regions')}}</th>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">{{__('ar.phone')}}</th>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">{{__('ar.location')}}</th>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">{{__('ar.edit')}}</th>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">{{__('ar.reomve')}}</th>    </tr>
            </thead>
            <tbody>
            @foreach ($regions as $region)
                
            
                <tr class="bg-white lg:hover:bg-gray-100 flex lg:table-row flex-row lg:flex-row flex-wrap lg:flex-no-wrap mb-10 lg:mb-0">
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                       {{$region->code}}
                    </td>
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                            {{$region->name}}
                        </td>
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                         {{$region->phone}}
                    </td>
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                        {{$region->location}}
                    </td>
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                        <button type="button" class="btn btn-outline-dark" data-toggle="modal" data-target="#modal{{$region->id}}">
                            <i class="fa fa-pencil-alt" aria-hidden="true"></i>  {{__('ar.edit')}}
                          </button>
                        </td>
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                      <form action="{{route('regions_destroy',$region->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit"  class="btn btn-outline-danger " onclick="return confirm('{{__('ar.reomve_confirm')}} {{__('ar.regions')}}')"><i class="fa fa-trash"></i> {{__('ar.reomve')}}</button>
                            </form>
                    </td>
                </tr>
                
               @endforeach
               
            </tbody>
        </table>
        <!-- component -->
    </div>
{{-- edit-modal --}}
@foreach ($regions as $region)
<div class="modal fade" id="modal{{$region->id}}">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
         
          <h4 class="modal-title modal-header justify-content-center text-center">{{__('ar.region')}} {{$region->name}}</h4>
           <!--Header End-->
        
           <!-- Modal Content-->
           <div class="modal-body justify-content-center text-center">
                        
                        <form action="{{route('regions_update',$region->id)}}" method="POST">
                            @csrf
                                @method('PUT')
                            <div class="form-group">
                                <label for="name"  >{{__('ar.code')}} {{__('ar.regions')}}</label>
                                <input value="{{$region->code}}" type="text" name="code" id="name"    class="form-control" />
                            </div>
                            <div class="form-group">
                                    <label for="name"  >{{__('ar.names')}} {{__('ar.regions')}}</label>
                                    <input value="{{$region->name}}" type="text" name="name" id="name"    required class="form-control" />
                                </div>
                            <div class="form-group">
        
                                <label for="phone" c   >{{__('ar.phone')}}</label>
                                <input type="text"  value="{{$region->phone}}" name="phone" id="phone" placeholder="" required class="form-control" />
                            </div>
                            
                            <div class="form-group">
                                <label for="location"  >{{__('ar.location')}}</label>
                                <input type="text"  value="{{$region->location}}" name="location" id="location" location=""  class="form-control" />
                            </div>
                            
                           
                            <div class="modal-footer">
                      
                                <button type="submit" class="btn btn-outline-success"><i class="fa fa-save" aria-hidden="true"></i>  {{__('ar.save')}}</button>
     
                        </form>
                            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> {{__('ar.close')}}</button>
                          </div>
                    </div>
           </div>
           <!-- End of Modal Content-->
           
</div>
  </div>


 @endforeach
 {{-- end edit modal --}}

 {{-- insert-modal --}}
 <div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
  
        <!-- Modal Header -->
       
          <h4 class="modal-title modal-header justify-content-center text-center">{{__('ar.regions_add')}}</h4>
       
       
             <!-- Modal Content-->
             <div class="modal-body justify-content-center text-center">
                           <div class="m-7">
                                <form action="{{route('regions_store')}}" method="POST">
                                        @csrf
                            
                                <div class="form-group">
                                    <label for="code"  >{{__('ar.code')}} {{__('ar.regions')}}</label>
                                    <input type="text" name="code" id="code"     class="form-control" />
                                </div>
                                <div class="form-group">
                                        <label for="name"  >{{__('ar.names')}} {{__('ar.regions')}}</label>
                                        <input type="text" name="name" id="name"    required class="form-control" />
                                    </div>
                                <div class="form-group">
            
                                    <label for="phone" c   >{{__('ar.phone')}}</label>
                                    <input type="text" name="phone" id="phone" placeholder="" required class="form-control" />
                                </div>
                                
                                <div class="form-group">
                                    <label for="location"  >{{__('ar.location')}}</label>
                                    <input type="text" name="location" id="location"  class="form-control" />
                                </div>
           
                                
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
        
                var code = $("input[name=codeinsert]").val();
                var nameinsert = $("input[name=nameinsert]").val();
                var phone = $("input[name=phoneinsert]").val();
                var location = $("input[name=locationinsert]").val();
                var url = '{{ url('regions/store') }}';
        
                $.ajax({
                   url:url,
                   method:'POST',
                   data:{
                        codes:code, 
                        nameinsert:nameinsert, 
                        phone:phone, 
                        location:location
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
