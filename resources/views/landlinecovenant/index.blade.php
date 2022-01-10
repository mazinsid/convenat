@extends('layouts.app')
<meta name="csrf-token" content="{{ csrf_token() }}" />

@section('content')
<main class="sm:container sm:mx-auto sm:mt-10">
  
    {{-- card --}}
    <div class="card">
        <div class="card-header">
       <h3 class="title text-center"  >   {{__('header.landline convenant')}}</h3>
         </div>
        <div class="card-body justify-content-center text-center">
            <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus" aria-hidden="true"></i> {{__('button.add')}}</button>
    
        <table class="table">
            <thead class="text-center">
            <thead>
                <tr class="text-center">
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">{{__('tables.branch')}}</th>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">{{__('header.landline')}}</th>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">{{__('tables.acceptance')}}</th>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">{{__('tables.note')}}</th>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">{{__('tables.code')}}</th>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">{{__('button.edit')}}</th>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">{{__('button.reomve')}}</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($landlineconvenants as $landlineconvenant)
                
            
                <tr class="bg-white lg:hover:bg-gray-100 flex lg:table-row flex-row lg:flex-row flex-wrap lg:flex-no-wrap mb-10 lg:mb-0">
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                       {{$landlineconvenant->branch->name}}
                 
                   </td>

                  <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                       {{$landlineconvenant->landline->serial}}
                        </td>
    
                        <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                            {{$landlineconvenant->acceptance_date}}
                            </td>
                     
                            <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                                {{$landlineconvenant->note}}
                                </td>

                        <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                           {{$landlineconvenant->code_number}}
                            </td>

                            <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                                <button type="button" class="btn btn-outline-dark" data-toggle="modal" data-target="#modal{{$landlineconvenant->id}}">
                                    <i class="fa fa-pencil" aria-hidden="true"></i>  {{__('button.edit')}}
                                  </button>
                                </td>
                            <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                              <form action="{{route('LandlineCovenant_destroy',$landlineconvenant->id)}}" method="post">
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
          
{{-- edit-modal --}}
@foreach ($landlineconvenants as $landlineconvenant)
     
<div class="modal fade" id="modal{{$landlineconvenant->id}}">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header justify-content-center text-center">  
            
           </div>
          
           <!--Header End-->
        
           <!-- Modal Content-->
                      <form action="{{route('LandlineCovenant_update',$landlineconvenant->id)}}" method="POST">
                        @csrf
                            @method('PUT')


                            <div class="form-group">  
                                <div class="inline-block relative w-64">
                                    <label for="name"   >{{__('header.branch')}}</label>
                                    <select name="branches_id" class="form-control">
                                      <option>أختار {{__('header.branch')}}</option>
                                      @foreach ($branches as $branche )
                                      <option value="{{$branche->id}}" {{($branche->id == $landlineconvenant->branches_id) ? 'selected' : ''  }} >{{$branche->name}}</option>
                     
                                      @endforeach
                                    
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">  
                                <div class="inline-block relative w-64">
                                    <label for="name"   >{{__('header.landline')}}</label>
                                    <select name="landlines_id" 
                                    class="form-control">
                                      <option>أختار {{__('header.landline')}}</option>
                                      @foreach ($landlines as $landline )
                                      <option value="{{$landline->id}}" {{($landline->id == $landlineconvenant->landlines_id) ? 'selected' : ''  }} >{{$landline->serial}}</option>
                     
                                      @endforeach
                                    
                                    </select>
                                </div>
                            </div>
               
                <div class="form-group">  
                    <label for="name"   >{{__('tables.acceptance')}}</label>
                    <input type="date" value="{{$landlineconvenant->acceptance_date}}" name="acceptance_date" id="name"   required   class="form-control"   />
                </div>
                
                <div class="form-group">  
                    <label for="name"   >{{__('tables.note')}}</label>
                    <input  type="text" value="{{$landlineconvenant->note}}" name="note" id="note"   required   class="form-control"   />
                </div>
                <div class="form-group">  
                    <label for="name"   >{{__('tables.code')}}</label>
                    <input  type="text" value="{{$landlineconvenant->code_number}}" name="code_number" id="note"   required   class="form-control"   />
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
                           <form action="{{route('LandlineCovenant_store')}}" method="POST">
                                    @csrf
                        
              
                                    <div class="form-group">  
                                        <div class="inline-block relative w-64">
                                            <label for="name"   >{{__('header.branch')}}</label>
                                            <select name="branches_id" 
                                            class="form-control">
                                              <option>أختار {{__('header.branch')}}</option>
                                              @foreach ($branches as $branche )
                                              <option value="{{$branche->id}}" >{{$branche->name}}</option>
                             
                                              @endforeach
                                            
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">  
                                        <div class="inline-block relative w-64">
                                            <label for="name"   >{{__('header.landline')}}</label>
                                            <select name="landlines_id" 
                                            class="form-control">
                                              <option>أختار {{__('header.landline')}}</option>
                                              @foreach ($landlines as $landline )
                                              <option value="{{$landline->id}}" >{{$landline->serial}}</option>
                             
                                              @endforeach
                                            
                                            </select>
                                        </div>
                                    </div>
                       
                        <div class="form-group">  
                            <label for="name"   >{{__('tables.acceptance')}}</label>
                            <input type="date" name="acceptance_date" id="name"   required   class="form-control"   />
                        </div>
                        
                        <div class="form-group">  
                            <label for="name"   >{{__('tables.note')}}</label>
                            <textarea  type="text" name="note" id="note"   required   class="form-control"   ></textarea>
                        </div>
                              
                        <div class="form-group">  
                            <label for="name"   >{{__('tables.code')}}</label>
                            <input  type="text" name="code_number" id="note"   required   class="form-control"   />
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-outline-success"><i class="fa fa-floppy-o" aria-hidden="true"></i> {{__('button.save')}} </button>
                            
                        <p class="text-base text-center text-gray-400" id="result">
                        </p>
                    
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i>  {{__('button.close')}}</button>
                      </div>
                    </form>  
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
