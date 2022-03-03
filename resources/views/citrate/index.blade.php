@extends('layouts.app')
<meta name="csrf-token" content="{{ csrf_token() }}" />

@section('content')
<main class="sm:container sm:mx-auto sm:mt-10">
 
    {{-- card --}}
    <div class="card">
        <div class="card-header">
       <h3 class="title text-center"  >   {{__('ar.central')}}</h3>
         </div>
        <div class="card-body justify-content-center text-center">
            <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus" aria-hidden="true"></i> {{__('ar.add')}}</button>
    
        <table class="table">
            <thead class="text-center">
        
                <tr>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">{{__('ar.central_type')}}</th>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">{{__('ar.central_install_site')}}</th>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">{{__('ar.central_capacity')}}</th>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">{{__('ar.edit')}}</th>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">{{__('ar.reomve')}}</th>
              </tr>
            </thead>
            <tbody>
            @foreach ($citrates as $citrate)
                
            
                <tr class="bg-white lg:hover:bg-gray-100 flex lg:table-row flex-row lg:flex-row flex-wrap lg:flex-no-wrap mb-10 lg:mb-0">
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                        {{$citrate->type}}
                     </td>
                     <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                        {{$citrate->site}}
                     </td>
                     <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                        {{$citrate->capacity}}
                     </td>
                 
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                        <button type="button" class="btn btn-outline-dark" data-toggle="modal" data-target="#modal{{$citrate->id}}">
                            <i class="fa fa-pencil-alt" aria-hidden="true"></i>  {{__('ar.edit')}}
                          </button>
                        </td>
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                      <form action="{{route('citrate_destroy',$citrate->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit"  class="btn btn-outline-danger " onclick="return confirm('{{__('ar.reomve_confirm')}} {{__('ar.central')}}')"><i class="fa fa-trash"></i> {{__('ar.reomve')}}</button>
                            </form>
                    </td>
                </tr>
               @endforeach
            </tbody>
        </table>
        <!-- component -->

{{-- edit-modal --}}
@foreach ($citrates as $citrate)

<div class="modal fade" id="modal{{$citrate->id}}">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
 
            <h4 class="modal-title modal-header justify-content-center text-center">{{$citrate->type}}</h4>
         
          
           <!--Header End-->
        
           <!-- Modal Content-->
           <div class="modal-body justify-content-center text-center">
         
                       <form action="{{route('citrate_update',$citrate->id)}}" method="POST">
                        @csrf
                            @method('PUT')
                  
                            <div class="form-group">
                                <label for="name">{{__('ar.central_type')}}</label>
                                <input value="{{$citrate->type}}" type="text" name="type"   required class=" form-control" />
                            </div>
                            <div class="form-group">
                                <label for="name ">{{__('ar.central_install_site')}}</label>
                                <input value="{{$citrate->site}}" type="text" name="site"   required class=" form-control" />
                            </div>
                            <div class="form-group">
                                <label for="name">{{__('ar.central_capacity')}}</label>
                                <input value="{{$citrate->capacity}}" type="text" name="capacity"   required class="form-control" />
                            </div>
                            <div class="modal-footer">
                      
                                <button type="submit" class="btn btn-outline-success"><i class="fa fa-save" aria-hidden="true"></i>  {{__('ar.save')}}</button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> {{__('ar.close')}}</button>
                            </div>
                        </form>
                          
                          
                        </div>
      </div>
      
 @endforeach
</div>
        </div>
    </div>
</main>
 {{-- insert-modal --}}
 

<div class="modal fade" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
  
             <h4 class="modal-title modal-header justify-content-center text-center"> {{__('ar.central_add')}}</h4>
           <!--Header End-->
        
           <!-- Modal Content-->
           <div class="modal-body justify-content-center text-center"> 
               
               
               
                <form action="{{route('citrate_store')}}" method="POST">
                                    @csrf
                        
                                    <div class="form-group">
                                        <label for="name">{{__('ar.central_type')}}</label>
                                        <input type="text" name="type"   required class="form-control" />
                                    </div>
                                    <div class="form-group">
                                        <label for="name">{{__('ar.central_install_site')}}</label>
                                        <input type="text" name="site"   required class="form-control" />
                                    </div>
                                    <div class="form-group">
                                        <label for="name">{{__('ar.central_capacity')}}</label>
                                        <input type="text" name="capacity"   required class="form-control" />
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
         
{{-- <script type="text/javascript">

    $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    
    
        $(".btn-insert").click(function(e){
    
            e.preventDefault();
    
            var namef = $("input[name=nameinsert]").val();
        
            var url = '{{ url('citrate/store') }}';
    
            $.ajax({
               url:url,
               method:'POST',
               data:{
                nameinsert:namef, 
          
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
