@extends('layouts.app')
<meta name="csrf-token" content="{{ csrf_token() }}" />
@section('content')
<main class="sm:container sm:mx-auto sm:mt-10">

             
    {{-- card --}}
    <div class="card">
      <div class="card-header">
     <h3 class="title text-center"  >   {{__('header.Accounts')}}</h3>
       </div>
      <div class="card-body justify-content-center text-center">
          <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModaljob">
            <i class="fa fa-plus" aria-hidden="true"></i> {{__('button.add')}}</button>
  
      <table class="table">
          <thead class="text-center">
                <tr>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">{{__('header.id')}}</th>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">{{__('tables.type_invoice')}}</th>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">{{__('tables.invoice_no')}}</th>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">{{__('tables.amount')}}</th>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">{{__('button.edit')}}</th>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">{{__('button.reomve')}}</th>
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
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                      <button type="button" class="btn btn-outline-dark" data-toggle="modal" data-target="#modal{{$account->id}}">
                          <i class="fa fa-pencil" aria-hidden="true"></i>  {{__('button.edit')}}
                        </button>
                      </td>
                  <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                    <form action="{{route('users_destroy',$account->id)}}" method="post">
                              @csrf
                              @method('DELETE')
                              <button type="button"  class="btn btn-outline-danger " onclick="return confirm('هل انت متاكد من الحذف')"><i class="fa fa-trash"></i> {{__('button.reomve')}}</button>
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
        <div class="modal-header justify-content-center text-center">  
            {{$account->id}}
           </div>
          
           <!--Header End-->
        
           <!-- Modal Content-->
           <div class="modal-body justify-content-center text-center">
                      <form action="{{route('accounts_update',$account->id)}}" method="POST">
                        @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="name" >{{__('tables.type_invoice')}}</label>
                                <select name="type" id="type"
                                class="form-control">
                                  <option>أختار {{__('tables.type_invoice')}}</option>
                                  <option value="خطا هاتف" >خطا هاتف</option>
                                  <option value="دائرة">دائرة</option>
                                  <option value="شرائح">شرائح</option>
                                  <option value="بيانات">بيانات</option>
                                </select> 
                            </div>

                            <div class="form-group">
                                <label for="name" >{{__('tables.invoice_no')}}</label>
                                <input value="{{$account->invoice_no}}" type="text" name="invoice_no" id="invoice_no" required class="form-control" />
                            </div>
                            <div class="form-group">
                                <label for="name" >{{__('tables.amount')}}</label>
                                <input value="{{$account->amount}}" type="text" name="amount" id="amount" required class="form-control" />
                            </div>
                          
                            <div class="modal-footer">
                      
                              <button type="submit" class="btn btn-outline-success"><i class="fa fa-floppy-o" aria-hidden="true"></i>  {{__('button.save')}}</button>
   
                      </form>
                          <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i> {{__('button.close')}}</button>
                        </div>
                        
                      </div>
    </div>
</div>
    </div>
</main>
 @endforeach
 {{-- insert-modal --}}
 <div class="modal" id="myModaljob">
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
                           <form action="{{route('accounts_store')}}" method="POST">
                            @csrf
                
                            <div class="form-group">
                                <label for="name" >{{__('tables.type_invoice')}}</label>
                            
                                <select name="type" id="type"
                                class="form-control">
                                  <option>أختار {{__('tables.type_invoice')}}</option>
                                  <option value="خطا هاتف">خطا هاتف</option>
                                  <option value="دائرة">دائرة</option>
                                  <option value="شرائح">شرائح</option>
                                  <option value="بيانات">بيانات</option>
                                </select> 
                               </div>

                            <div class="form-group">
                                <label for="name" >{{__('tables.invoice_no')}}</label>
                                <input  type="text" name="invoice_no" id="invoice_no" required class="form-control" />
                            </div>
                            <div class="form-group">
                                <label for="name" >{{__('tables.amount')}}</label>
                                <input  type="text" name="amount" id="amount" required class="form-control" />
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
    
            var namef = $("input[name=nameinsert]").val();
            var url = '{{ url('job/store') }}';
    
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
    
    </script>


 --}}
@endsection
