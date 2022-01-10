@extends('layouts.app')
<meta name="csrf-token" content="{{ csrf_token() }}" />

@section('content')
<main class="sm:container sm:mx-auto sm:mt-10">
  
   {{-- card --}}
   <div class="card">
    <div class="card-header">
   <h3 class="title text-center"  >   {{__('header.return')}}</h3>
    
    <div class="card-body justify-content-center text-center">
    <form action="{{route('return_create')}}" method="POST">
      @csrf
      <div class="form-group">
        <label for="name"  >{{__('tables.code')}}</label>   
        <input type="text" id="code" name="code_number" placeholder="أدخل كود العهدة" class="form-control">
        <button type="submit" class="btn btn-info btn-lg" ><i class="fa fa-plus" aria-hidden="true"></i> {{__('button.add')}}</button>
      </div>
    </form>
    </div>
    </div>
    <table class="table">
        <thead class="text-center">
                <tr>
                   <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">{{__('tables.code')}}</th>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">{{__('tables.serial')}}</th>       
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">{{__('header.employee')}}</th>       
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">{{__('tables.return')}}</th>       
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">{{__('button.edit')}}</th>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">{{__('button.reomve')}}</th>
             </tr>
            </thead>
            <tbody>
            @foreach ($returncovenants as $returncovenant)
                
            
                <tr class="bg-white lg:hover:bg-gray-100 flex lg:table-row flex-row lg:flex-row flex-wrap lg:flex-no-wrap mb-10 lg:mb-0">
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                      {{$returncovenant->code_number}}
                    </td>
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                      {{$returncovenant->serials->serial}}
                    </td>
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                       {{$returncovenant->employee->name}}
                    </td> 
                     <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                       {{$returncovenant->return_date}}
                    </td>
                  
                    
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                        <button type="button" class="btn btn-outline-dark" data-toggle="modal" data-target="#modal{{$returncovenant->id}}">
                            <i class="fa fa-pencil" aria-hidden="true"></i>  {{__('button.edit')}}
                          </button>
                        </td>
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                      <form action="{{route('users_destroy',$returncovenant->id)}}" method="post">
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
@foreach ($returncovenants as $returncovenant)
   
<div class="modal fade" id="modal{{$returncovenant->id}}">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header justify-content-center text-center">  
        </div>
          
           <!--Header End-->
        
           <!-- Modal Content-->
           <div class="modal-body justify-content-center text-center">
                   <form action="{{route('return_update',$returncovenant->id)}}" method="POST">
                            @csrf
                                @method('PUT')

                                <div class="form-group">
                                <label for="name"  >{{__('tables.covenant')}}</label>
                                <input value="{{$returncovenant->covenans_id}}" type="text" name="covenans_id" id="name"    required     class="form-control" />
                            </div>
                                <div class="form-group">
                                <div class="inline-block relative w-64">
                                    <select name="employees_id" id="employees_id"
                                    class="block appearance-none w-full bg-white border border-gray-400
                                     hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none 
                                     focus:shadow-outline">
                                      <option>أختار {{__('header.employee')}}</option>
                                      @foreach ($employees as $employee )
                                      <option value="{{$employee->id}}">{{$employee->name}}</option>
                     
                                      @endforeach
                                    
                                    </select> 
                                
                                </div>
                                </div>
                                    <div class="form-group">
                                    <label for="name"  >{{__('tables.serial')}}</label>
                                    <input value="{{$returncovenant->serials->serial}}" type="text" name="serials_id" id="name"    required     class="form-control" />
                                </div>
                                    <div class="form-group">
                                    <label for="name"  >{{__('tables.return')}}</label>
                                    <input value="{{$returncovenant->return_date}}" type="date" name="return_date" id="name"    required     class="form-control" />
                                </div>
                                <div class="modal-footer">
                      
                                    <button type="submit" class="btn btn-outline-success"><i class="fa fa-floppy-o" aria-hidden="true"></i>  {{__('button.save')}}</button>
         
                            </form>
                                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i> {{__('button.close')}}</button>
                              </div>
                    </div>
           </div>
</div>
           <!-- End of Modal Content-->
    @endforeach
    </div>
   </div>
</main>
  {{-- insert-modal --}}
  <div class="modal fade" id="myModal" >
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
                            <form action="{{route('return_store')}}" method="POST">
                                @csrf
                            
                                    <div class="form-group">
                                    
                                    <div class="inline-block relative w-64">
                                    {{__('header.employee')}}
                                        <select name="employees_id" id="employees_id"
                                        class="form-control">
                                          <option>أختار {{__('header.employee')}}</option>
                                          @foreach ($employees as $employee )
                                          <option value="{{$employee->id}}">{{$employee->name}}</option>
                         
                                          @endforeach
                                        
                                        </select> 
                                    
                                    </div>
                                    </div>
                                        <div class="form-group">
                                        <div class="inline-block relative w-64">
                                            {{__('header.serial')}}
                                            <select name="serials_id" id="serials_id"
                                            class="form-control">
                                             
                                            
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                      <div class="inline-block relative w-64">
                                          {{__('tables.code')}}
                                          <select name="covenans_id" id="covenans_id"
                                          class="form-control">
                                           
                                          
                                          </select>
                                      </div>
                                  </div>
                                        <div class="form-group">
                                        <label for="name"  >{{__('tables.return')}}</label>
                                        <input  type="date" name="return_date" id="name"    required     class="form-control" />
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
  
{{-- ajax insert --}}
{{-- <script type="text/javascript">

    $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    
    
        $(".btn-insert").click(function(e){
    
            e.preventDefault();
    
      
            var serial = $("input[name=serialinsert]").val();
            var ptype_id = $("select[name=ptype_id]").val();
            var url = '{{ url('serial/store') }}';
    
            $.ajax({
               url:url,
               method:'POST',
               data:{
                serial:serial, 
                ptype_id:ptype_id, 
            
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
    <script type="text/javascript">
    $( "#employees_id" ).change(function() 
{
$.getJSON("/covenant/public/return/"+ $(this).val()+"/getSerial", function(jsonData){
select = '<option  >أختار الرقم الجهاز</option>';
  $.each(jsonData, function(i,data)
  {
       select +='<option value="'+data.id+'">'+data.serial+'</option>';
   });
select += '</select>';
$("#serials_id").html(select);
});
});

$( "#serials_id" ).change(function() 
{
$.getJSON("/covenant/public/return/"+ $(this).val()+"/getCovenan", function(jsonData){
select = '<option  >أختار كود العهدة</option>';
  $.each(jsonData, function(i,data)
  {
       select +='<option value="'+data.id+'">'+data.code_number+'</option>';
   });
select += '</select>';
$("#covenans_id").html(select);
});
});
</script>
@endsection
