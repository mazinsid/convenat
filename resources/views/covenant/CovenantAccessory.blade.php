@extends('layouts.app')
<meta name="csrf-token" content="{{ csrf_token() }}" />

@section('content')
<main class="sm:container sm:mx-auto sm:mt-10">

    <div class="card">
        <div class="card-header">
       <h3 class="title text-center"  >   {{__('header.accessory')}}</h3>
         </div>
        <div class="card-body justify-content-center text-center">
            <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus" aria-hidden="true"></i> {{__('button.add')}}</button>
    
           
    {{-- opaen model --}}
     <table class="table">
        <thead class="text-center">
            <thead>
                <tr>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">{{__('tables.covenant')}}</th>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">{{__('button.accessory')}}</th>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">{{__('button.edit')}}</th>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">{{__('button.reomve')}}</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($covenant_accessores as $covenant_accessore)
                
            
                <tr class="bg-white lg:hover:bg-gray-100 flex lg:table-row flex-row lg:flex-row flex-wrap lg:flex-no-wrap mb-10 lg:mb-0">
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                        {{$covenant_accessore->covenans_id}}
                    </td>
               <div hidden>

               </div>
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                          {{$covenant_accessore->accessory->name}}
                        </td>
                 
                        <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                            <button type="button" class="btn btn-outline-dark" data-toggle="modal" data-target="#modal{{$covenant_accessore->id}}">
                                <i class="fa fa-pencil" aria-hidden="true"></i>  {{__('button.edit')}}
                              </button>
                            </td>
                      <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                
                          <form action="{{url('covenantaccessory/'.$covenant_accessore->id.'/'.$covenant_accessore->covenans_id.'/destroy')}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit"  class="btn btn-outline-danger " onclick="return confirm('هل انت متاكد من الحذف')"><i class="fa fa-trash"></i> {{__('button.reomve')}}</button>
                        </form>
                </td>
            </tr>
           @endforeach
        </tbody>
    </table>
{{-- edit-modal --}}
@foreach ($covenant_accessores as $covenant_accessore)

<div class="modal fade" id="modal{{$covenant_accessore->id}}">
    <div class="modal-dialog">
        <div class="modal-content">
        
          <!-- Modal Header -->
          <div class="modal-header justify-content-center text-center">  
           
           </div>
          
           <!--Header End-->
        
           <!-- Modal Content-->
                      <form action="{{route('covenantaccessory_update',$covenant_accessore->id)}}" method="POST">
                        @csrf
                            @method('PUT')


                            <div class="form-group">
                                <div class="inline-block relative w-64">
                                    <select name="accessories_id" 
                                    class="form-control">
                                      <option>أختار {{__('button.accessory')}}</option>
                                      @foreach ($accessories as $accessoriy )
                                      <option value="{{$accessoriy->id}}" {{($accessoriy->id == $covenant_accessore->accessories_id)}}  >{{$accessoriy->name}}</option>
                     
                                      @endforeach
                                    
                                    </select> 
                                
                                </div>
                                </div>

                     
                                <div class="modal-footer">
                      
                                    <button type="submit" class="btn btn-outline-success"><i class="fa fa-floppy-o" aria-hidden="true"></i>  {{__('button.save')}}</button>
         
                            </form>
                                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i> {{__('button.close')}}</button>
                              </div>
                              
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
                        <form action="{{route('covenantaccessory_store')}}" method="POST">
                            @csrf
                            <input type="hidden" value="{{$id}}" name="covenans_id" id="covenans_id" required  class="form-control" />
                            <div class="form-group">
                                    <div class="inline-block relative w-64">
                                        <select name="accessories_id" 
                                        class="form-control">
                                          <option>أختار {{__('button.accessory')}}</option>
                                          @foreach ($accessories as $accessoriy )
                                          <option value="{{$accessoriy->id}}" >{{$accessoriy->name}}</option>
                         
                                          @endforeach
                                        
                                        </select> 
                                    
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
    
            var namef = $("input[name=nameinsert]").val();
            var url = '{{ url('category/store') }}';
    
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
