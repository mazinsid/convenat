@extends('layouts.app')
<meta name="csrf-token" content="{{ csrf_token() }}" />
@section('content')
<main class="sm:container sm:mx-auto sm:mt-10">

             
    {{-- card --}}
    <div class="card">
      <div class="card-header">
     <h3 class="title text-center"  >   {{__('ar.invoice_all')}}</h3>
       </div>
      <div class="card-body justify-content-center text-center">
          <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModaljob">
            <i class="fa fa-plus" aria-hidden="true"></i> {{__('ar.add')}}</button>
  
      <table class="table">
          <thead class="text-center">
                <tr>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">{{__('ar.hash')}}</th>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">{{__('ar.invoice_type')}}</th>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">{{__('ar.invoice_no')}}</th>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">{{__('ar.invoice_total')}}</th>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">{{__('ar.invoice_date')}}</th>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">{{__('ar.edit')}}</th>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">{{__('ar.reomve')}}</th>
              </tr>
            </thead>
            <tbody>
            @foreach ($accounts as $account)
                
            
                <tr class="bg-white lg:hover:bg-gray-100 flex lg:table-row flex-row lg:flex-row flex-wrap lg:flex-no-wrap mb-10 lg:mb-0">
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                       {{$account->id}}
                    </td>
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                        {{$account->type}}
                     </td>
                     <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                        {{$account->invoice_no}}
                     </td>
                     <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                        {{$account->amount}}
                     </td>
                     <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                        {{$account->date}}
                     </td>
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                      <button type="button" class="btn btn-outline-dark" data-toggle="modal" data-target="#modal{{$account->id}}">
                          <i class="fa fa-pencil-alt" aria-hidden="true"></i>  {{__('ar.edit')}}
                        </button>
                      </td>
                  <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                    <form action="{{route('accounts_destroy',$account->id)}}" method="post">
                              @csrf
                              @method('DELETE')
                              <button type="submit"  class="btn btn-outline-danger " onclick="return confirm('{{__('ar.reomve_confirm')}} {{__('ar.invoice')}}')"><i class="fa fa-trash"></i> {{__('ar.reomve')}}</button>
                          </form>
                  </td>
              </tr>
             @endforeach
          </tbody>
      </table>
      </div>
      <!-- component -->
{{-- edit-modal --}}
@foreach ($accounts as $account) 

<div class="modal fade" id="modal{{$account->id}}">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
         <h4 class="modal-title modal-header justify-content-center text-center">{{__('ar.invoices')}} {{$account->type}} </h4> 
          
           <!--Header End-->
        
           <!-- Modal Content-->
           <div class="modal-body justify-content-center text-center">
                      <form action="{{route('accounts_update',$account->id)}}" method="POST">
                        @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="name" >{{__('ar.invoice_type')}}</label>
                                <select name="type" id="type"
                                class="form-control">
                                  
                               
                                       <option value="{{__('ar.invoice_landline')}}" {{($account->type  == __('ar.invoice_landline')) ? 'selected' : ''  }}>{{__('ar.invoice_landline')}}</option>
                                      <option value="{{__('ar.invoice_circuit')}}" {{($account->type  == __('ar.invoice_circuit')) ? 'selected' : ''  }}>{{__('ar.invoice_circuit')}}</option>
                                    <option value="{{__('ar.invoice_simcard')}}" {{($account->type  == __('ar.invoice_simcard')) ? 'selected' : ''  }}>{{__('ar.invoice_simcard')}}</option>
                                    <option value="{{__('ar.invoice_data')}}" {{($account->type  == __('ar.invoice_data')) ? 'selected' : ''  }}>{{__('ar.invoice_data')}}</option>
                         
                         
                                </select> 
                            </div>

                            <div class="form-group">
                                <label for="name" >{{__('ar.invoice_no')}}</label>
                                <input value="{{$account->invoice_no}}" type="text" name="invoice_no" id="invoice_no" required class="form-control" />
                            </div>
                            
                            <div class="form-group">
                                <label for="name" >{{__('ar.invoice_total')}}</label>
                                <input value="{{$account->amount}}" type="text" name="amount" id="amount" required class="form-control" />
                            </div>
                            
                            <div class="form-group">
                                <label for="name"  >{{__('ar.invoice_date')}}</label>
                                <input value="{{$account->dates}}" type="date" name="invoice_date" id="dates"   required  class="form-control"/>
                            </div>
                            
                          
                            <div class="modal-footer">
                      
                              <button type="submit" class="btn btn-outline-success"><i class="fa fa-save" aria-hidden="true"></i>  {{__('ar.save')}}</button>
   
                      </form>
                          <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> {{__('ar.close')}}</button>
                        </div>
                        
                      </div>
    </div>
</div>
    </div>

 @endforeach
 {{-- insert-modal --}}
 <div class="modal" id="myModaljob">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header justify-content-center text-center">
         <h4 class="modal-title modal-header justify-content-center text-center">{{__('ar.invoice_add')}}</h4> 
        
      </div>
           <!-- Modal Content-->
           <div class="modal-body justify-content-center text-center">
                         <div class="m-7">
                           <form action="{{route('accounts_store')}}" method="POST">
                            @csrf
                
                            <div class="form-group">
                                <label for="name" >{{__('ar.invoice_type')}}</label>
                            
                                <select name="type" id="type"
                                class="form-control">
                             
                                  
                                    <option value="{{__('ar.invoice_landline')}}" >{{__('ar.invoice_landline')}}</option>
                                  <option value="{{__('ar.invoice_circuit')}}">{{__('ar.invoice_circuit')}}</option>
                                  <option value="{{__('ar.invoice_simcard')}}">{{__('ar.invoice_simcard')}}</option>
                                  <option value="{{__('ar.invoice_data')}}">{{__('ar.invoice_data')}}</option>
                                </select> 
                               </div>

                            <div class="form-group">
                                <label for="name" >{{__('ar.invoice_no')}}</label>
                                <input  type="text" name="invoice_no" id="invoice_no" required class="form-control" />
                            </div>
                            
                            <div class="form-group">
                                <label for="name" >{{__('ar.invoice_total')}}</label>
                                <input  type="text" name="amount" id="amount" required class="form-control" />
                            </div>
                            
                            <div class="form-group">
                                <label for="name"  >{{__('ar.invoice_date')}}</label>
                                <input type="date" name="invoice_date" id="dates"   required  class="form-control"/>
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
    
            var namef = $("input[name=nameinsert]").val();
            var invoice_date = $("input[name=invoice_date]").val();
            var url = '{{ url('job/store') }}';
             
    
            $.ajax({
               url:url,
               method:'POST',
               data:{
                nameinsert:namef, 
                invoice_date:invoice_date,
            
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


 --}}
 </main>
@endsection
