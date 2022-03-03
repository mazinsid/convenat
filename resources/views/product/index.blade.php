@extends('layouts.app')
<meta name="csrf-token" content="{{ csrf_token() }}" />
@section('content')
<main class="sm:container sm:mx-auto sm:mt-10">
{{-- card --}}
    <div class="card">
        <div class="card-header">
       <h3 class="title text-center"  >   {{__('ar.brand_product')}}</h3>
         </div>
        <div class="card-body justify-content-center text-center">
            <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus" aria-hidden="true"></i> {{__('ar.add')}}</button>
            
          <table class="table">
            <thead class="text-center">
                <tr>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">{{__('ar.brand')}}</th>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">{{__('ar.vendor')}}</th>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">{{__('ar.category')}}</th>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">{{__('ar.edit')}}</th>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">{{__('ar.reomve')}}</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($products as $product)
                
            
                <tr class="bg-white lg:hover:bg-gray-100 flex lg:table-row flex-row lg:flex-row flex-wrap lg:flex-no-wrap mb-10 lg:mb-0">
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                       {{$product->name}}
                    </td>
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                       {{$product->vendor}}
                    </td>
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                       {{__('ar.wireless')}}
                    </td>
                 
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                        <button type="button" class="btn btn-outline-dark" data-toggle="modal" data-target="#modal{{$product->id}}">
                            <i class="fa fa-pencil-alt" aria-hidden="true"></i>  {{__('ar.edit')}}
                          </button>
                        </td>
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                      <form action="{{route('product_destroy',$product->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit"  class="btn btn-outline-danger " onclick="return confirm('{{__('ar.reomve_confirm')}} {{__('ar.brand')}}')"><i class="fa fa-trash"></i> {{__('ar.reomve')}}</button>
                            </form>
                    </td>
                </tr>
               @endforeach
            </tbody>
        </table>
        <!-- component -->
  
{{-- edit-modal --}}
@foreach ($products as $product)
<div class="modal fade" id="modal{{$product->id}}">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
         
           <h4 class="modal-title modal-header justify-content-center text-center">{{$product->name}}</h4>
           <!--Header End-->
        
           <!-- Modal Content-->
           <div class="modal-body justify-content-center text-center">
         
                        <form action="{{route('product_update',$product->id)}}" method="POST">
                            @csrf
                                @method('PUT')
    
                          <div class="form-group">
                                <label for="name"  >{{__('ar.vendor')}}</label>
                                <input value="{{$product->vendor}}" type="text" name="vendor" id="name"    required   class="form-control"/>
                            </div>
                          <div class="form-group">
                                <label for="name"  >{{__('ar.brand_products')}}</label>
                                <input value="{{$product->name}}" type="text" name="name" id="name"    required   class="form-control"/>
                            </div>
                            {{-- <div class="mb-6">
                                <div class="inline-block relative w-64">
                                    <select name="product_categories_id" 
                                    class="block appearance-none w-full bg-white border border-gray-400
                                     hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none 
                                     focus:shadow-outline">
                                      
                                      @foreach ($categores as $category )
                                      <option value="{{$category->id}}" {{($category->id == $product->product_categories_id) ? 'selected' : ''  }}>{{$category->name}}</option>
                     
                                      @endforeach
                                    
                                    </select> 
                                
                                </div> --}}
                                <div class="modal-footer">
                      
                                    <button type="submit" class="btn btn-outline-success"><i class="fa fa-save" aria-hidden="true"></i>  {{__('ar.save')}}</button>
         
                            </form>
                                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> {{__('ar.close')}}</button>
                              </div>
           </div>
    </div>
</div>
    </div>
</div>
   
 
           <!-- End of Modal Content-->
 @endforeach
 {{-- insert-modal --}}
 <div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
  
        <!-- Modal Header -->
        <div class="modal-header justify-content-center text-center">
          <h4 class="modal-title">{{__('ar.brands')}}</h4>
           
        </div>
             <!-- Modal Content-->
             <div class="modal-body justify-content-center text-center">
                           <div class="m-7">
                            <form action="{{route('product_store')}}" method="POST">
                                    @csrf
                        

                          <div class="form-group">
                                <label for="name"  >{{__('ar.vendor')}}</label>
                                <input type="text" name="vendor" id="vendor"    required   class="form-control"/>
                            </div>
                          <div class="form-group">
                                <label for="name"  >{{__('ar.brand_products')}}</label>
                                <input type="text" name="nameinsert" id="name"    required   class="form-control"/>
                            </div>
                            {{-- <div class="mb-6">
                                <div class="inline-block relative w-64">
                                    <select name="product_categories_id" 
                                    class="block appearance-none w-full bg-white border border-gray-400
                                     hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none 
                                     focus:shadow-outline">
                                      
                                      @foreach ($categores as $category )
                                      <option value="{{$category->id}}" >{{$category->name}}</option>
                     
                                      @endforeach
                                    
                                    </select> 
                                
                                </div> --}}
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
 
{{-- ajax insert --}}
{{-- <script type="text/javascript">

    $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    
    
        $(".btn-insert").click(function(e){
    
            e.preventDefault();
    
            var vendor = $("input[name=vendorinsert]").val();
            var namef = $("input[name=nameinsert]").val();
            var product_categories_id = $("select[name=product_categories_id_insert]").val();
            var url = '{{ url('product/store') }}';
    
            $.ajax({
               url:url,
               method:'POST',
               data:{
                vendor:vendor, 
                nameinsert:namef, 
                product_categories_id:product_categories_id, 
            
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
