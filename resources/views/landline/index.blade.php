@extends('layouts.app')
<meta name="csrf-token" content="{{ csrf_token() }}" />

@section('content')
<main class="sm:container sm:mx-auto sm:mt-10">
  
    {{-- card --}}
    <div class="card">
        <div class="card-header">
       <h3 class="title text-center"  >   {{__('header.landline')}}</h3>
         </div>
        <div class="card-body justify-content-center text-center">
            <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus" aria-hidden="true"></i> {{__('button.add')}}</button>
    
        <table class="table text-center">
            <thead >
            <thead>
                <tr>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">{{__('tables.leadline type')}}</th>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">{{__('tables.leadline properties')}}</th>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">{{__('tables.leadline uses')}}</th>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">{{__('tables.serial')}}</th>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">{{__('tables.cable number')}}</th>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">{{__('tables.circle number')}}</th>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">{{__('tables.circle type')}}</th>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">{{__('tables.circle speed')}}</th>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">{{__('header.provider')}}</th>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">{{__('tables.expiry')}}</th>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">{{__('button.edit')}}</th>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">{{__('button.reomve')}}</th>
            </tr>
            </thead>
            <tbody class="text-center">
            @foreach ($landlines as $landline)
                
            
                <tr class="bg-white lg:hover:bg-gray-100 flex lg:table-row flex-row lg:flex-row flex-wrap lg:flex-no-wrap mb-10 lg:mb-0">
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                       {{$landline->land_type}}
                 
                   </td>
                   <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                   {{$landline->properties}}
             
               </td>
               <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
               {{$landline->uses}}
         
           </td>
                  <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                       {{$landline->serial}}
                        </td>
    
                        <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                           {{$landline->cab_number}}
                            </td>
                     
                            <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                               {{$landline->circle_number}}
                                </td>

                        <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                           {{$landline->circuit_type}}
                            </td>

                        <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                           {{$landline->circuit_speed}}
                            </td>
                            <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                                {{$landline->provider->name}}
                                </td><td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                                    <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase"> </span>
                                   {{$landline->landline_expiry_date}}
                                    </td>
                                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                                        <button type="button" class="btn btn-outline-dark" data-toggle="modal" data-target="#modal{{$landline->id}}">
                                            <i class="fa fa-pencil" aria-hidden="true"></i>  {{__('button.edit')}}
                                          </button>
                                        </td>
                                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                                      <form action="{{route('landline_destroy',$landline->id)}}" method="post">
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
                    </div>
                    
                </main>
{{-- edit-modal --}}
@foreach ($landlines as $landline)

<div class="modal fade" id="modal{{$landline->id}}">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header justify-content-center text-center">  
            {{$landline->name}}
           </div>
          
           <!--Header End-->
        
           <!-- Modal Content-->
           <div class="modal-body justify-content-center text-center">
                      <form action="{{route('landline_update',$landline->id)}}" method="POST">
                        @csrf
                            @method('PUT')
 
                             <div class="form-group">
                                <div class="inline-block relative w-64">
                                    <label for="name"  >{{__('tables.leadline type')}}</label>
                                    <select name="land_type" 
                                    class="form-control">
                                      <option>أختار {{__('tables.leadline type')}}</option>
                                      <option value="{{__('tables.leadline type1')}}"
                                      {{($landline->land_type == __('tables.leadline type1')) ? 'selected' : ''  }}
                                       >{{__('tables.leadline type1')}}</option>
                                      <option value="{{__('tables.leadline type2')}}"
                                      {{($landline->land_type == __('tables.leadline type2')) ? 'selected' : ''  }}
                                      >{{__('tables.leadline type2')}}</option>
                                      <option value="{{__('tables.leadline type3')}}" 
                                      {{($landline->land_type == __('tables.leadline type3')) ? 'selected' : ''  }}
                                       >{{__('tables.leadline type3')}}</option>
                                      <option value="{{__('tables.leadline type4')}}" 
                                      {{($landline->land_type == __('tables.leadline type4')) ? 'selected' : ''  }}></option>
                                    </select>
                                </div>
                            </div>
    
                             <div class="form-group">
                                <div class="inline-block relative w-64">
                                    <label for="name"  >{{__('tables.leadline properties')}}</label>
                                    <select name="properties" 
                                    class="form-control">
                                      <option>أختار {{__('tables.leadline properties')}}</option>
                                      <option value="{{__('tables.leadline properties1')}}"
                                      {{($landline->properties == __('tables.leadline properties1')) ? 'selected' : ''  }}
                                       >{{__('tables.leadline properties1')}}</option>
                                      <option value="{{__('tables.leadline properties2')}}"
                                      {{($landline->properties == __('tables.leadline properties2')) ? 'selected' : ''  }}
                                      >{{__('tables.leadline properties2')}}</option>
                                      <option value="{{__('tables.leadline properties3')}}" 
                                      {{($landline->properties == __('tables.leadline properties3')) ? 'selected' : ''  }}
                                       >{{__('tables.leadline properties3')}}</option>
                                      <option value="{{__('tables.leadline properties4')}}" 
                                      {{($landline->properties == __('tables.leadline properties4')) ? 'selected' : ''  }}>
                                      {{__('tables.leadline properties4')}}</option>
                                      <option value="{{__('tables.leadline properties5')}}" 
                                      {{($landline->properties == __('tables.leadline properties5')) ? 'selected' : ''  }}>
                                      {{__('tables.leadline properties5')}}</option>
                                    </select>
                                </div>
                            </div>

                              <div class="form-group">
                                <div class="inline-block relative w-64">
                                    <label for="name"  >{{__('tables.leadline uses')}}</label>
                                    <select name="uses" 
                                    class="form-control">
                                      <option>أختار {{__('tables.leadline uses')}}</option>
                                      <option value="{{__('tables.leadline uses1')}}"
                                      {{($landline->uses == __('tables.leadline uses1')) ? 'selected' : ''  }}
                                       >{{__('tables.leadline uses1')}}</option>
                                      <option value="{{__('tables.leadline uses2')}}"
                                      {{($landline->uses == __('tables.leadline uses2')) ? 'selected' : ''  }}
                                      >{{__('tables.leadline uses2')}}</option>
                                      <option value="{{__('tables.leadline uses3')}}" 
                                      {{($landline->uses == __('tables.leadline uses3')) ? 'selected' : ''  }}
                                       >{{__('tables.leadline uses3')}}</option>
                                      <option value="{{__('tables.leadline uses4')}}" 
                                      {{($landline->uses == __('tables.leadline uses4')) ? 'selected' : ''  }}>
                                      {{__('tables.leadline uses4')}}</option>
                                    </select>
                                </div>
                            </div>

                             <div class="form-group">
                                <label for="name"  >{{__('tables.serial')}}</label>
                                <input value="{{$landline->serial}}" type="text" name="serial" id="name"   required  class="form-control"/>
                            </div>

                             <div class="form-group">
                                <label for="name"  >{{__('tables.cable number')}}</label>
                                <input value="{{$landline->cab_number}}" type="text" name="cab_number" id="name"   required  class="form-control"/>
                            </div>
                            
                             <div class="form-group">
                                <label for="name"  >{{__('tables.circle number')}}</label>
                                <input value="{{$landline->circle_number}}" type="text" name="circle_number" id="name"   required  class="form-control"/>
                            </div>
                            
                             <div class="form-group">
                                <label for="name"  >{{__('tables.circle type')}}</label>
                                <input value="{{$landline->circuit_type}}" type="text" name="circuit_type" id="name"   required  class="form-control"/>
                            </div>
                            
                             <div class="form-group">
                                <label for="name"  >{{__('tables.circle speed')}}</label>
                                <input value="{{$landline->circuit_speed}}" type="text" name="circuit_speed" id="name"   required  class="form-control"/>
                            </div>
                            
                             <div class="form-group">
                                <label for="name"  >{{__('header.provider')}}</label>
                                <input value="{{$landline->providers_id}}" type="text" name="providers_id" id="name"   required  class="form-control"/>
                            </div>

                             <div class="form-group">
                                <label for="name"  >{{__('tables.expiry')}}</label>
                                <input value="{{$landline->landline_expiry_date}}" type="date" name="landline_expiry_date" id="name"   required  class="form-control"/>
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
                            <form action="{{route('landline_store')}}" method="POST">
                                    @csrf
                       
                         <div class="form-group">
                            <div class="inline-block relative w-64">
                                <label for="name"  >{{__('tables.leadline type')}}</label>
                                <select name="land_type" 
                                class="form-control" >
                                  <option>{{__('tables.leadline select')}} {{__('tables.leadline type')}}</option>
                                  <option value="{{__('tables.leadline type1')}}" >{{__('tables.leadline type1')}}</option>
                                  <option value="{{__('tables.leadline type2')}}" >{{__('tables.leadline type2')}}</option>
                                  <option value="{{__('tables.leadline type3')}}" >{{__('tables.leadline type3')}}</option>
                                  
                                </select>
                            </div>
                        </div>

                         <div class="form-group">
                            <div class="inline-block relative w-64">
                                <label for="name"  >{{__('tables.leadline properties')}}</label>
                                <select name="properties" 
                                class="form-control">
                                  <option>{{__('tables.leadline select')}} {{__('tables.leadline properties')}}</option>
                                  <option value="{{__('tables.leadline properties1')}}" >{{__('tables.leadline properties1')}}</option>
                                  <option value="{{__('tables.leadline properties2')}}" >{{__('tables.leadline properties2')}}</option>
                                  <option value="{{__('tables.leadline properties3')}}" >{{__('tables.leadline properties3')}}</option>
                                  <option value="{{__('tables.leadline properties4')}}" >{{__('tables.leadline properties4')}}</option>
                                  <option value="{{__('tables.leadline properties5')}}" >{{__('tables.leadline properties5')}}</option>
                                  </select>
                            </div>
                        </div>


                         <div class="form-group">
                            <div class="inline-block relative w-64">
                                <label for="name"  >{{__('tables.leadline uses')}}</label>
                                    <select name="uses" 
                                class="form-control">
                                  <option>{{__('tables.leadline select')}} {{__('tables.leadline uses')}}</option>
                                  <option value="{{__('tables.leadline uses1')}}" >{{__('tables.leadline uses1')}}</option>
                                  <option value="{{__('tables.leadline uses2')}}" >{{__('tables.leadline uses2')}}</option>
                                  <option value="{{__('tables.leadline uses3')}}" >{{__('tables.leadline uses3')}}</option>
                                  <option value="{{__('tables.leadline uses4')}}" >{{__('tables.leadline uses4')}}</option>
                                  </select>
                            </div>
                        </div>


                         <div class="form-group">
                            <label for="name"  >{{__('tables.serial')}}</label>
                            <input  type="text" name="serial" id="name"   required  class="form-control"/>
                        </div>

                         <div class="form-group">
                            <label for="name"  >{{__('tables.cable number')}}</label>
                            <input type="text" name="cab_number" id="name"   required  class="form-control"/>
                        </div>
                        
                         <div class="form-group">
                            <label for="name"  >{{__('tables.circle number')}}</label>
                            <input  type="text" name="circle_number" id="name"   required  class="form-control"/>
                        </div>
                        
                         <div class="form-group">
                            <label for="name"  >{{__('tables.circle type')}}</label>
                            <input  type="text" name="circuit_type" id="name"   required  class="form-control"/>
                        </div>
                        
                         <div class="form-group">
                            <label for="name"  >{{__('tables.circle speed')}}</label>
                            <input  type="text" name="circuit_speed" id="name"   required  class="form-control"/>
                        </div>
                                   
                         <div class="form-group">
                            <div class="inline-block relative w-64">
                                <label for="name"  >{{__('header.provider')}}</label>
                                <select name="providers_id" 
                                class="form-control">
                                  <option>{{__('tables.leadline select')}} {{__('header.provider')}}</option>
                                  @foreach ($providers as $provider )
                                  <option value="{{$provider->id}}" >{{$provider->name}}</option>
                 
                                  @endforeach
                                
                                </select>
                            </div>
                        </div>
                
                         <div class="form-group">
                            <label for="name"  >{{__('tables.expiry')}}</label>
                            <input  type="date" name="landline_expiry_date" id="name"   required  class="form-control"/>
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
    
            var land_type = $("input[name=land_typei]").val();
            var serial = $("input[name=seriali]").val();
            var cab_number = $("input[name=cab_numberi]").val();
            var circle_number = $("input[name=circle_numberi]").val();
            var circuit_type = $("input[name=circuit_typei]").val();
            var circuit_speed = $("input[name=circuit_speedi]").val();
            var providers_id = $("input[name=providers_idi]").val();
            var landline_expiry_date = $("input[name=landline_expiry_datei]").val();
            var url = '{{ url('landline/store') }}';
    
            $.ajax({
               url:url,
               method:'POST',
               data:{
                land_type:land_type, 
                serial:serial, 
                cab_number:cab_number, 
                circle_number:circle_number, 
                circuit_type:circuit_type, 
                circuit_speed:circuit_speed, 
                providers_id:providers_id, 
                landline_expiry_date:landline_expiry_date, 
            
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
