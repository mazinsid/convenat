@extends('layouts.app')
<meta name="csrf-token" content="{{ csrf_token() }}" />

@section('content')
<main class="sm:container sm:mx-auto sm:mt-10">

    {{-- card --}}
    <div class="card">
        <div class="card-header">
       <h3 class="title text-center"  >   {{__('header.phonecovenant')}}</h3>
         </div>
        <div class="card-body justify-content-center text-center">
            <a href="{{route('phonecovenant_create')}}" type="button" class="btn btn-info btn-lg"><i class="fa fa-plus" aria-hidden="true"></i> {{__('button.add')}}</a>
    
        <table class="table">
            <thead class="text-center">
                <tr>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">{{__('tables.code')}}</th>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">{{__('header.employee')}}</th>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">{{__('tables.serial')}}</th>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">{{__('tables.phone_model')}}</th>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">{{__('tables.note')}}</th>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">{{__('tables.release_date')}}</th>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">{{__('button.edit')}}</th>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">{{__('button.reomve')}}</th>
           </tr>
            </thead>
            <tbody>
            @foreach ($covenants as $covenant)
                
            
                <tr class="bg-white lg:hover:bg-gray-100 flex lg:table-row flex-row lg:flex-row flex-wrap lg:flex-no-wrap mb-10 lg:mb-0">
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                       {{$covenant->code}}
                    </td>
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                         <span class="rounded bg-green-400 py-1 px-3 text-xs font-bold">
                             {{$covenant->employee->name}}
                            </span>
                    </td>
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                        <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase"></span>
                        {{$covenant->phones->serial}}
                    </td>
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                         <span class="rounded bg-green-400 py-1 px-3 text-xs font-bold">{{$covenant->device_phone->phone_model}}</span>
                    </td>
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                        <span class="rounded bg-green-400 py-1 px-3 text-xs font-bold">{{$covenant->note}}</span>
                    </td>
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                         <span class="rounded bg-green-400 py-1 px-3 text-xs font-bold">{{$covenant->convenant_date}}</span>
                    </td>

                </td>

                <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                    <button type="button" class="btn btn-outline-dark" data-toggle="modal" data-target="#modal{{$covenant->id}}">
                        <i class="fa fa-pencil" aria-hidden="true"></i>  {{__('button.edit')}}
                      </button>
                    </td>
                <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                  <form action="{{route('phonecovenant_destroy',$covenant->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit"  class="btn btn-outline-danger " onclick="return confirm('هل انت متاكد من الحذف')"><i class="fa fa-trash"></i> {{__('button.reomve')}}</button>
                        </form>
                </td>
            </tr>
           @endforeach
        </tbody>
    </table>
        </div>
    <!-- component -->

{{-- edit-modal --}}
@foreach ($covenants as $covenant)
<div class="modal fade" id="modal{{$covenant->id}}">
    <div class="modal-dialog">
        <div class="modal-content">     
          <!-- Modal Header -->
          <div class="modal-header justify-content-center text-center">  
              {{__('button.edit')}}
             </div>
             <!--Header End-->      
             <!-- Modal Content-->
             <div class="modal-body justify-content-center text-center">
                        <form action="{{route('phonecovenant_update',$covenant->id)}}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="name" >{{__('tables.serial')}}</label>
                                <input value="{{$covenant->serial}}" type="text" name="serial" id="name"  required class="form-control" />
                            </div>

                               
                                <div class="form-group">
                                    <div class="inline-block relative w-64">
                                        <label for="location"  >{{__('header.device_privete')}}</label>
                                        <select name="type" 
                                        class="form-control">
                                          <option>أختار {{__('header.type')}}</option>
                                          <option value="{{$covenant->type}}" {{($covenant->type == __('tables.covenant_public')) ? 'selected' : ''  }}>{{$covenant->type}}</option>
                                          <option value="{{$covenant->type}}" {{($covenant->type == __('tables.covenant_praived')) ? 'selected' : ''  }}>{{$covenant->type}}</option>
                         
                                        </select>
                                    </div>
                                </div>
       
                            <div class="form-group">
        
                                <label for="covenant" class="text-sm text-gray-600 dark:text-gray-400">{{__('tables.mobile_number')}}</label>
                                <input type="text"  value="{{$covenant->mobile_number}}" name="mobile_number" id="covenant" placeholder="+1 (555) 1234-567" required class="form-control" />
                            </div>
                            
                             <div class="mb-6" id="route_typeu" >
                                <label for="location" >{{__('tables.Mobile_features')}}</label>
                                <input type="text" value="{{$covenant->mobile_features}}" name="mobile_features" id="location" placeholder="" required class="form-control" />
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
    </div>
    
    
 @endforeach
</div>
    </div>
    
</main>
 {{-- insert-modal --}}

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
                var covenant = $("input[name=covenantinsert]").val();
                var statusf = $("input[name=statusinsert]").val();
                var provider_id = $("select[name=provider_idinsert]").val();
                var url = '{{ url('simcard/store') }}';
        
                $.ajax({
                   url:url,
                   method:'POST',
                   data:{
                    serial:serial, 
                        covenant:covenant, 
                        status:statusf, 
                        provider_id:provider_id
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
  $( "#typecovenant" ).change(function() 
{
    var nationality = $('select[id="typecovenant"]').val();

if ( nationality == 'جوال رسمي') {
    $('#covenant_detiels').show();  
}else{
    $('#covenant_detiels').hide();  
}
});
            </script>
@endsection
