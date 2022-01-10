@extends('layouts.app')
<meta name="csrf-token" content="{{ csrf_token() }}" />

@section('content')
<main class="sm:container sm:mx-auto sm:mt-10">

            
    {{-- card --}}
    <div class="card">
        <div class="card-header">
       <h3 class="title text-center"  >   {{__('header.covenant add')}}</h3>
         </div>
        <div class="card-body justify-content-center text-center">
            <a href="{{route('covenant_create')}}" type="button" class="btn btn-info btn-lg"><i class="fa fa-plus" aria-hidden="true"></i> {{__('button.add')}}</a>
    
        <table class="table">
            <thead class="text-center">
            <thead>
                <tr>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">{{__('header.employee')}}</th>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">{{__('header.rank')}}</th>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">{{__('tables.type')}}</th>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">{{__('tables.serial')}}</th>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">{{__('tables.acceptance')}}</th>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">{{__('tables.code')}}</th>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">{{__('tables.call_code')}}</th>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">{{__('tables.call_number')}}</th>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">{{__('tables.note')}}</th>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">{{__('header.accessory')}}</th>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">{{__('button.edit')}}</th>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">{{__('button.reomve')}}</th>
            </tr>
            </thead>
            <tbody id="tbody">

                
            @foreach ($covenants as $covenant)
                
            
                <tr class="bg-white lg:hover:bg-gray-100 flex lg:table-row flex-row lg:flex-row flex-wrap lg:flex-no-wrap mb-10 lg:mb-0">
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                       {{$covenant->employee->name}}
                    </td>
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                        {{$covenant->employee->rank->name}}
                    </td>
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                       {{$covenant->ptype->name}}
                    </td>
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                       {{$covenant->serial->serial}}
                    </td>
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                       {{$covenant->acceptance}}
                    </td>
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                       {{$covenant->code_number}}
                    </td>
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                        {{$covenant->call_code}}
                     </td>
                     <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                        {{$covenant->call_number}}
                     </td>
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                           {{$covenant->note}}
                        </td>
                        <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                                <a  href="{{route('CovenantAccessory' ,$covenant->id)}} " id="btn" class="btn btn-outline-secondary"><i     class="fa fa-book fa-fw" aria-hidden="true"></i>{{__('button.accessory')}}</a>
                            </td>
                            <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                                <button type="button" class="btn btn-outline-dark" data-toggle="modal" data-target="#modal{{$covenant->id}}">
                                    <i class="fa fa-pencil" aria-hidden="true"></i>  {{__('button.edit')}}
                                  </button>
                                </td>
                            <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                              <form action="{{route('users_destroy',$covenant->id)}}" method="post">
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
            </div>
            
          </main>
          {{-- edit-modal --}}

{{-- edit-modal --}}
@foreach ($covenants as $covenant)
 
<div class="modal fade" id="modal{{$covenant->id}}">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header justify-content-center text-center">  
  
           </div>
          
           <!--Header End-->
        
           <!-- Modal Content-->
           <div class="modal-body justify-content-center text-center">
                            <form action="{{route('covenant_update',$covenant->id)}}" method="POST">
                                    @csrf
                                        @method('PUT')
                             <div class="form-group">
                                <label for="employees_id"    >{{__('header.employee')}}</label>
                                <input readonly value="{{$covenant->employee->name}}" type="text" id="name"    required    class="form-control" />
                                <input hidden value="{{$covenant->employees_id}}" type="text" name="employees_id" id="name"    required    class="form-control" />
                                <input value="{{$covenant->id}}" type="hidden" name="id" id="name"    required    class="form-control" />
                                    </div>
                            
                             <div class="form-group">
                                <label for="name"    >{{__('tables.type')}}</label>
                                <div  class="inline-block relative w-64">
                                 
                                    <input readonly value="{{$covenant->ptype->name}}" type="text" id="name"    required    class="form-control" />
                                    <input hidden value="{{$covenant->ptypes_id}}" type="text" name="ptypes_id" id="name" />
                              
                            </div>
                             </div>
                            
                             <div class="form-group">
                                <label for="name"    >{{__('tables.serial')}}</label>
                                <input readonly value="{{$covenant->serial->serial}}" type="text" id="name"    class="form-control" />
                                <input hidden value="{{$covenant->serials_id}}" type="text" name="serials_id" id="name"/>
                            </div>
                             <div class="form-group">
                                <label for="name"   >{{__('tables.acceptance')}}</label>
                                <input  type="text" name="acceptance"  value="{{$covenant->acceptance}}" required class="form-control" />
                            </div>
                             <div class="form-group">
                                <label for="name"    >{{__('tables.code')}}</label>
                                <input value="{{$covenant->code_number}}" type="text" name="code_number" id="name"    required    class="form-control" />
                            </div>
                            <div class="form-group">
                                <label for="name"    >{{__('tables.call_code')}}</label>
                                <input value="{{$covenant->call_code}}" type="text" name="call_code" id="name"    required    class="form-control" />
                            </div>
                            <div class="form-group">
                                <label for="name"    >{{__('tables.call_number')}}</label>
                                <input value="{{$covenant->call_number}}" type="text" name="call_number" id="name"    required    class="form-control" />
                            </div>
                             <div class="form-group">
                                <label for="name"    >{{__('tables.note')}}</label>
                                <textarea  type="text" name="note" id="name"    required    class="form-control" >
                                        {{$covenant->note}}
                                </textarea>
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

 @endforeach
 {{-- insert-modal --}}
 {{-- <dialog id="myModal" class="h-auto w-11/12 md:w-1/2 p-5  bg-white rounded-md ">
        
    <div class="flex flex-col w-full h-auto ">
         <!-- Header -->
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
         

                             <div class="form-group">
                                <label for="name"    >{{__('tables.name')}}</label>
                                <input type="text" name="nameinsert" id="name"    required    class="form-control" />
                            </div>
                                <button type="submit" class=" btn-insert w-full px-3 py-4 text-white bg-indigo-500 rounded-md focus:bg-indigo-600 focus:outline-none">{{__('button.add')}}</button>
                            </div>
                            <p class="text-base text-center text-gray-400" id="result">
                            </p>
                    </div>
           </div>
           <!-- End of Modal Content-->
           
           
           
         </div>
 </dialog> --}}
{{-- ajax  --}}

<script type="text/javascript">

    $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    
    
        $(".btn-insert").click(function(e){
    
            e.preventDefault();
    
            var namef = $("input[name=nameinsert]").val();
            var url = '{{ url('/covenant/public/job/store') }}';
    
            $.ajax({
               url:url,
               method:'POST',
               data:{
                nameinsert:namef, 
                processData: false,
                        contentType: false,
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
    
    </script>


<script type="text/javascript">

    $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    
        $(".btsearch").click(function(e){
    
            e.preventDefault();
    
            var SearchEmployee = $("input[name=search]").val();
            var url = '{{ url('covenant/SearchEmployee') }}';
    
            $.ajax({
               url:url,
               method:'POST',
               datatype: false,
               data:{
                SearchEmployee:SearchEmployee, 
                    },
               success:function(response){
                   console.log(response)
               
                $('#tbody').html(response);
                  
               },
               error:function(error){
                  console.log(error)
               }
            });
        });
  

    </script>

    
    @endsection 
