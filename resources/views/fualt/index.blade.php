@extends('layouts.app')
<meta name="csrf-token" content="{{ csrf_token() }}" />

@section('content')
<main class="sm:container sm:mx-auto sm:mt-10">

       {{-- card --}}
       <div class="card">
        <div class="card-header">
       <h3 class="title text-center"  >{{__('ar.damages')}}</h3>
         </div>
        <div class="card-body justify-content-center text-center">
            <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus" aria-hidden="true"></i> {{__('ar.add')}}</button>
    
        <table class="table">
            <thead class="text-center">
         
                <tr>
                   <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">{{__('ar.damage_service')}}</th>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">{{__('ar.damage_type')}}</th>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">{{__('ar.damage_reason')}}</th>         
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">{{__('ar.damage_date')}}</th>         
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">{{__('ar.damage_fixed_date')}}</th>         
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">{{__('ar.edit')}}</th>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">{{__('ar.reomve')}}</th>
           </tr>
            </thead>
            <tbody>
            @foreach ($fualts as $fualt)
                
            
                <tr class="bg-white lg:hover:bg-gray-100 flex lg:table-row flex-row lg:flex-row flex-wrap lg:flex-no-wrap mb-10 lg:mb-0">
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                       {{$fualt->landline->name}}
                         
                    </td>
                    
                     <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                       {{$fualt->landline->name}}
                         
                    </td>
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                           {{$fualt->reason}}
                        </td>
                        <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                               {{$fualt->faults_date}}
                            </td>
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                       {{$fualt->faults_date}}
                    </td>
                 
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                        <button type="button" class="btn btn-outline-dark" data-toggle="modal" data-target="#modal{{$fualt->id}}">
                            <i class="fa fa-pencil-alt" aria-hidden="true"></i>  {{__('ar.edit')}}
                          </button>
                        </td>
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                      <form action="{{route('fault_destroy',$fualt->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit"  class="btn btn-outline-danger " onclick="return confirm('{{__('ar.reomve_confirm')}} {{__('ar.damage')}}')"><i class="fa fa-trash"></i> {{__('ar.reomve')}}</button>
                            </form>
                    </td>
                </tr>
               @endforeach
            </tbody>
        </table>
        <!-- component -->
  
  {{-- edit-modal --}}
@foreach ($fualts as $fualt)
<div class="modal fade" id="modal{{$fualt->id}}">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
         <h4 class="modal-title modal-header justify-content-center text-center">{{__('ar.edit')}}</h4>
          
           <!--Header End-->
        
           <!-- Modal Content-->
           <div class="modal-body justify-content-center text-center">
         
                        <form action="{{route('fault_update',$fualt->id)}}" method="POST">
                            @csrf
                                @method('PUT')
    
                                 <div class="form-group">
                                    <div class="inline-block relative w-64">
                                        <label for="name"  >{{__('ar.landline')}}</label>
                                        <select name="landline_id"   class="form-control">
                                   
                                          @foreach ($landlines as $landline )
                                           <option value="{{$landline->landline_id}}"  {{($landline->landline_id == $landline->id) ? 'selected' : ''  }}>{{$landline->land_type}}/{{$landline->circle_number}}</option>
                                          
                                           @endforeach
                                        </select>
                                    </div>
                                </div>  
                                 
                                        <div class="form-group">
                                        <label for="name">{{__('ar.damage_date')}}</label>
                                        <input value="{{$fualt->faults_date}}" type="date" name="faults_date" id="name"   required  class="form-control" />
                                        </div>
                                    
                                        <div class="form-group">
                                        <label for="name">{{__('ar.damage_fixed_date')}}</label>
                                        <input value="{{$fualt->fixed_date}}" type="date" name="fixed_date" id="name"   required  class="form-control" />
                                        </div>
                                        
                            
                                
                                 <div class="form-group green-border-focus">
                                         <i class="fas fa-pencil-alt prefix"></i> <label for="name"  >{{__('ar.damage_reason')}}</label>
                                        <textarea name="reason" id="name" value="555" class="md-textarea form-control" rows="3" required >
                                            {{$fualt->reason}}
                                        </textarea>
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
          <h4 class="modal-title">{{__('ar.damage_add')}}</h4>
          
        </div>
             <!-- Modal Content-->
             <div class="modal-body justify-content-center text-center">
                           <div class="m-7">  
                                  <form action="{{route('fault_store')}}" method="POST">
                                    @csrf
                                    
                                    
                                     <div class="form-group">
                                        <div class="inline-block relative w-64">
                                            <label for="name"  >{{__('ar.damage_service')}}</label>
                                            <select name="landline_id"   class="form-control">
                                           
                                            
                                              
                                               <option value="1">{{__('ar.damage_lineland')}}</option>
                                               <option value="2">{{__('ar.damage_circuits')}}</option>
                                               <option value="3">{{__('ar.damage_central')}}</option>
                                               
                 
                                            </select>
                                        </div>
                                    </div>
                        
                        
                                   <div class="form-group">
                                        <div class="inline-block relative w-64">
                                            <label for="name"  >{{__('ar.landline')}}</label>
                                            <select name="landline_id"   class="form-control">
                                           
                                              @foreach ($landlines as $landline )
                                              
                                               <option value="{{$landline->id}}"  {{($landline->id == $landline->id) ? 'selected' : ''  }}>{{$landline->land_type}}/{{$landline->circle_number}}</option>
                                               @endforeach
                                            </select>
                                        </div>
                                    </div>
                                     
                                   
                                
                                
                                 <div class="form-group">
                                        <label for="name"  >{{__('ar.damage_date')}}</label>
                                        <input type="date" name="faults_date" id="faults_date"  required  class="form-control" />
                                    </div>
                                     <div class="form-group">
                                            <label for="name"  >{{__('ar.damage_fixed_date')}}</label>
                                            <input type="date" name="fixed_date" id="name"  required  class="form-control" />
                                        </div>
                            {{--  <div class="form-group">
                                <div class="inline-block relative w-64">
                                    <select name="products_id" 
                                    class="block appearance-none w-full bg-white border border-gray-400
                                     hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none 
                                     focus:shadow-outline">
                                    
                                      @foreach ($products as $product )
                                      <option value="{{$product->id}}" >{{$product->name}}</option>
                     
                                      @endforeach
                                    
                                    </select> 
                                
                                </div>
                                </div> --}}
                                
                                 
                                    <div class="md-form">
                                         <i class="fas fa-pencil-alt prefix"></i> <label for="name"  >{{__('ar.damage_reason')}}</label>
                                      <textarea name="reason" id="reason" class="md-textarea form-control" rows="3" required  ></textarea>
 
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
            var products_id = $("select[name=products_idinsert]").val();
            var url = '{{ url('model/store') }}';
    
            $.ajax({
               url:url,
               method:'POST',
               data:{
       
                nameinsert:namef, 
                products_id:products_id, 
            
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
