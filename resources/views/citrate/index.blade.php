@extends('layouts.app')
<meta name="csrf-token" content="{{ csrf_token() }}" />

@section('content')
<main class="sm:container sm:mx-auto sm:mt-10">
 
    {{-- card --}}
    <div class="card">
        <div class="card-header">
       <h3 class="title text-center"  >   {{__('header.citrates')}}</h3>
         </div>
        <div class="card-body justify-content-center text-center">
            <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus" aria-hidden="true"></i> {{__('button.add')}}</button>
    
        <table class="table">
            <thead class="text-center">
        
                <tr>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">{{__('tables.citral type')}}</th>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">{{__('tables.installation site')}}</th>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">{{__('tables.citral capacity')}}</th>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">{{__('button.edit')}}</th>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">{{__('button.reomve')}}</th>
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
                            <i class="fa fa-pencil" aria-hidden="true"></i>  {{__('button.edit')}}
                          </button>
                        </td>
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                      <form action="{{route('citrate_destroy',$citrate->id)}}" method="post">
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
@foreach ($citrates as $citrate)

<div class="modal fade" id="modal{{$citrate->id}}">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header justify-content-center text-center">  
            {{__('button.edit')}}
           </div>
          
           <!--Header End-->
        
           <!-- Modal Content-->
           <div class="modal-body justify-content-center text-center">
         
                       <form action="{{route('citrate_update',$citrate->id)}}" method="POST">
                        @csrf
                            @method('PUT')
                  
                            <div class="form-group">
                                <label for="name">{{__('tables.citral type')}}</label>
                                <input value="{{$citrate->type}}" type="text" name="type"   required class=" form-control" />
                            </div>
                            <div class="form-group">
                                <label for="name ">{{__('tables.installation site')}}</label>
                                <input value="{{$citrate->site}}" type="text" name="site"   required class=" form-control" />
                            </div>
                            <div class="form-group">
                                <label for="name">{{__('tables.citral capacity')}}</label>
                                <input value="{{$citrate->capacity}}" type="text" name="capacity"   required class="form-control" />
                            </div>
                            <div class="modal-footer">
                      
                                <button type="submit" class="btn btn-outline-success"><i class="fa fa-floppy-o" aria-hidden="true"></i>  {{__('button.save')}}</button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i> {{__('button.close')}}</button>
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
 <div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
  
         <div class="flex w-full h-auto justify-center items-center">
           <div class="flex w-10/12 h-auto py-3 justify-center items-center text-2xl font-bold">
                
           </div>
           <div onclick="document.getElementById('myModal').close();" class="flex w-1/12 h-auto justify-center cursor-pointer">
                 <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
           </div>
           <!--Header End-->
         </div>
           <!-- Modal Content-->
            <div class="flex w-full h-auto py-10 px-2 justify-center items-center bg-gray-200 rounded text-center text-gray-500">
                    <div class="m-7">
                            <form action="{{route('citrate_store')}}" method="POST">
                                    @csrf
                        
                                    <div class="form-group">
                                        <label for="name">{{__('tables.citral type')}}</label>
                                        <input type="text" name="type"   required class="form-control" />
                                    </div>
                                    <div class="form-group">
                                        <label for="name">{{__('tables.installation site')}}</label>
                                        <input type="text" name="site"   required class="form-control" />
                                    </div>
                                    <div class="form-group">
                                        <label for="name">{{__('tables.citral capacity')}}</label>
                                        <input type="text" name="capacity"   required class="form-control" />
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
