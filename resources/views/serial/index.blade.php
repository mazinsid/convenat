@extends('layouts.app')
<meta name="csrf-token" content="{{ csrf_token() }}">

@section('content')
<main class="sm:container sm:mx-auto sm:mt-10">

     {{-- card --}}
     <div class="card">
        <div class="card-header">
       <h3 class="title text-center"  >   {{__('ar.serial')}}</h3>
        
        <div class="card-body justify-content-center text-center">
            <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus" aria-hidden="true"></i> {{__('ar.add')}}</button>
          </div>
        <table class="table">
            <thead class="text-center">
                <tr>
                   <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">{{__('ar.serial')}}</th>
                   <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">{{__('ar.model')}}</th>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">{{__('ar.type')}}</th>       
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">{{__('ar.edit')}}</th>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">{{__('ar.reomve')}}</th>
             </tr>
            </thead>
            <tbody>
            @foreach ($serials as $serial)
                
            
                <tr class="bg-white lg:hover:bg-gray-100 flex lg:table-row flex-row lg:flex-row flex-wrap lg:flex-no-wrap mb-10 lg:mb-0">
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                       {{$serial->serial}}
                    </td>
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                       {{$serial->ptype->pmodel->name}}
                    </td>
                 
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                      {{$serial->ptype->name}}
                   </td>
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                        <button type="button" class="btn btn-outline-dark" data-toggle="modal" data-target="#modal{{$serial->id}}">
                            <i class="fa fa-pencil-alt " aria-hidden="true"></i>  {{__('ar.edit')}}
                          </button>
                        </td>
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                      <form action="{{route('users_destroy',$serial->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="button"  class="btn btn-outline-danger " onclick="return confirm('{{__('ar.reomve_confirm')}} {{__('ar.serial')}}')"><i class="fa fa-trash"></i> {{__('ar.reomve')}}</button>
                            </form>
                    </td>
                </tr>
               @endforeach
            </tbody>
        </table>
        <!-- component -->
    </div>
    
     

{{-- edit-modal --}}
@foreach ($serials as $serial)
<div class="modal fade" id="modal{{$serial->id}}">
    <div class="modal-dialog">
      <div class="modal-content">
      
      <!-- Modal Header -->
      
         <h4 class="modal-title modal-header justify-content-center text-center">{{__('ar.edit')}}</h4> 
          <!-- Modal Content-->
          <div class="modal-body justify-content-center text-center">
        
                        <form action="{{route('serial_update',$serial->id)}}" method="POST">
                            @csrf
                                @method('PUT')

                             <div class="form-group">
                              <label for="name">{{__('ar.serial')}}</label>
                                <input value="{{$serial->serial}}" type="text" name="serial" 
                                id="name" required class="form-control" />
                            </div>
                             <div class="form-group">
                                  <label for="name">{{__('ar.type')}}</label>
                                  <select name="ptype_id" id="typese"
                                    class="form-control">
                                    
                                      @foreach ($products as $product )
                                      <option value="{{$product->id}}">{{$product->name}}</option>
                                      @endforeach
                                    </select> 
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
 {{-- insert-modal --}}
 <div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
  
        <!-- Modal Header -->
        <div class="modal-header justify-content-center text-center">
          <h4 class="modal-title">{{__('ar.serial_add')}}</h4>
           
        </div>
             <!-- Modal Content-->
             <div class="modal-body justify-content-center text-center">
                     
                            <form action="{{route('serial_store')}}" method="POST">
                                @csrf
                         <div class="form-group">
                            <div class="inline-block relative w-64">
                              <label for="name">{{__('ar.product')}}</label>
                              <select name="product_id" id="productselect"
                                class="form-control">
                                  <option>أختار {{__('ar.product')}}</option>
                                  @foreach ($products as $product )
                                  <option value="{{$product->id}}">{{$product->name}}</option>
                 
                                  @endforeach
                                
                                </select> 
                            
                            </div>
                            </div>
                             <div class="form-group">
                                <div  class="inline-block relative w-64">
                                  <label for="name">{{__('ar.model')}}</label>
                                  <select name="pmodels" id="pmodel"
                                        class="form-control">
                                        </select>
                                </div>
                                
                            </div>
                             <div class="form-group">
                                    <div  class="inline-block relative w-64">
                                      <label for="name">{{__('ar.type')}}</label>
                                      <select name="ptype_id" id="ptype"
                                            class="form-control">
                                            </select>
                                    </div>
                                    
                                </div>
                             <div class="form-group">
                                <label for="name"    >{{__('ar.serial')}}</label>
                                <input type="text" name="serial" id="name"     required    class="form-control" />
                            </div>
                       
                       
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-outline-success"><i class="fa fa-save" aria-hidden="true"></i> {{__('ar.save')}} </button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i>  {{__('ar.close')}}</button>
                            
                                <p class="text-base text-center text-gray-400" id="result">
                                </p>
                            </div>
             
    
                            </form>  
                                 </div>
             </div>
      </div>
    </div>
           <!-- End of Modal Content-->
           
           
 



<script type="text/javascript">
          /* Load getModle into postion <selec> */
  $("#productselect").change(function() 
  {
   
    // alert('dsfsd');
    // $.getJSON("/serial/"+ $(this).val() +"/getModle", function(jsonData){
    $.getJSON("/covenant/public/serial/"+ $(this).val() +"/getModle", function(jsonData){
        select = '';
          $.each(jsonData, function(i,data)
          {

               select +='<option value="'+data.id+'">'+data.name+'</option>';
           });
        select += '</select>';
        $("#pmodel").html(select);
    });
  });

            /* Load ptype into option <selec> */
 $( "#pmodel" ).change(function() 
  {
    // $.getJSON("/serial/"+ $(this).val()+"/getType", function(jsonData){
    $.getJSON("/covenant/public/serial/"+ $(this).val()+"/getType", function(jsonData){
        select = '';
        select += '';
          $.each(jsonData, function(i,data)
          {
               select +='<option value="'+data.id+'">'+data.name+'</option>';
           });
        select += '</select>';
        $("#ptype").html(select);
    });
  });
    </script>

</main>

 @endsection
