@extends('layouts.app')
<meta name="csrf-token" content="{{ csrf_token() }}" />
@section('content')
<main class="sm:container sm:mx-auto sm:mt-10">

      {{-- card --}}
    <div class="card">
      <div class="card-header">
     <h3 class="title text-center"  >   {{__('tables.digital circuit')}}</h3>
       </div>
      <div class="card-body justify-content-center text-center">
          <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus" aria-hidden="true"></i> {{__('button.add')}}</button>
  
      <table class="table">
          <thead class="text-center">
            <thead>
                <tr>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">{{__('tables.code')}}</th>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">{{__('tables.branch')}}</th>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">{{__('header.employee')}}</th>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">{{__('tables.digital circuit')}}</th>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">{{__('tables.note')}}</th>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">{{__('tables.convenant_date')}}</th>
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
                        {{$covenant->branch_id}}
                    </td>
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                        <span class="rounded bg-green-400 py-1 px-3 text-xs font-bold">{{$covenant->employees_id}}</span>
                    </td>
                
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                        <span class="rounded bg-green-400 py-1 px-3 text-xs font-bold">{{$covenant->DigitalCircuit_id}}</span>
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
                  <form action="{{route('DigitalCircuitcovenant_destroy',$covenant->id)}}" method="post">
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
                        <form action="{{route('DigitalCircuitcovenant_update',$covenant->id)}}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
        
                                <label for="monthly_cost" class="text-sm text-gray-600 dark:text-gray-400">{{__('tables.code')}}</label>
                                <input type="text"  value="{{$covenant->code}}" name="cdoe" id="covenant" required class="form-control" />
                            </div>
                          
                             
                                <div class="form-group">
                                    <div class="inline-block relative w-64">
                                        <label for="monthly_cost" >{{__('header.branch')}}</label>    
                                        <select name="branch_id"   class="form-control">
                                          <option>أختار {{__('header.branch')}}</option>
                                          @foreach ($branchs as $branch )
                                           <option value="{{$covenant->branch_id}}" {{($covenant->branch_id == $branch->id) ? 'selected' : ''  }}>{{$branch->name}}</option>
                                           @endforeach
                                        </select>
                                    </div>
                                </div>
       
                                <div class="form-group">
                                    <div class="inline-block relative w-64">
                                        <label for="monthly_cost" >{{__('header.employee')}}</label> 
                                           <select name="employees_id" class="form-control">
                                          <option>أختار {{__('header.employee')}}</option>
                                          @foreach ($employees as $employee )
                                           <option value="{{$covenant->employees_id}}" {{($covenant->employees_id == $employee->id) ? 'selected' : ''  }}>{{$employee->name}}</option>
                                           @endforeach
                                        </select>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <div class="inline-block relative w-64">
                                        <label for="monthly_cost" >{{__('tables.digital circuit')}}</label>    
                                        <select name="DigitalCircuit_id" class="form-control">
                                          <option>أختار {{__('tables.digital circuit')}}</option>
                                          @foreach ($digitalcircuits as $digitalcircuit )
                                           <option value="{{$covenant->DigitalCircuit_id}}" {{($covenant->DigitalCircuit_id == $digitalcircuit->id) ? 'selected' : ''  }}>{{$digitalcircuit->name_circuit}}</option>
                                           @endforeach
                                        </select>
                                    </div>
                                </div>
                            
                             <div class="form-group" id="design_type" >
                                <label for="location" class="block mb-2 text-sm text-gray-600 dark:text-gray-400">{{__('tables.note')}}</label>
                                <textarea   name="note"  required class="form-control" >{{$covenant->design_type}}</textarea>
                            </div>
                            <div class="form-group" id="name_circuit" >
                                <label for="location" class="block mb-2 text-sm text-gray-600 dark:text-gray-400">{{__('tables.convenant_date')}}</label>
                                <input type="text" value="{{$covenant->name_circuit}}" name="convenant_date" id="name_circuit" placeholder="" required class="form-control" />
                            </div>

                            <div class="modal-footer">
                      
                                <button type="submit" class="btn btn-outline-success"><i class="fa fa-floppy-o" aria-hidden="true"></i>  {{__('button.save')}}</button>
     
                     
                            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i> {{__('button.close')}}</button>
                          </div>
                        </form>
                        </div>
      </div>
</div>
 @endforeach

      </div>
</main>
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
                                <form action="{{route('DigitalCircuitcovenant_store')}}" method="POST">
                                        @csrf        
                                    
                                        <div class="form-group">
        
                                            <label for="monthly_cost" class="text-sm text-gray-600 dark:text-gray-400">{{__('tables.code')}}</label>
                                            <input type="text"  name="code" id="covenant" required class="form-control" />
                                        </div>
                                      
                                         
                                            <div class="form-group">
                                                <div class="inline-block relative w-64">
                                                    <label for="monthly_cost" >{{__('header.branch')}}</label>    
                                                    <select name="branch_id"   class="form-control">
                                                      <option>أختار {{__('header.branch')}}</option>
                                                      @foreach ($branchs as $branch )
                                                       <option value="{{$branch->id}}">{{$branch->name}}</option>
                                                       @endforeach
                                                    </select>
                                                </div>
                                            </div>
                   
                                            <div class="form-group">
                                                <div class="inline-block relative w-64">
                                                    <label for="monthly_cost" >{{__('header.employee')}}</label> 
                                                       <select name="employees_id" class="form-control">
                                                      <option>أختار {{__('header.employee')}}</option>
                                                      @foreach ($employees as $employee )
                                                       <option value="{{$employee->id}}">{{$employee->name}}</option>
                                                       @endforeach
                                                    </select>
                                                </div>
                                            </div>
            
            
                                            <div class="form-group">
                                                <div class="inline-block relative w-64">
                                                    <label for="monthly_cost" >{{__('tables.digital circuit')}}</label>    
                                                    <select name="DigitalCircuit_id" class="form-control">
                                                      <option>أختار {{__('tables.digital circuit')}}</option>
                                                      @foreach ($digitalcircuits as $digitalcircuit )
                                                       <option value="{{$digitalcircuit->id}}" >{{$digitalcircuit->name_circuit}}</option>
                                                       @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        
                                         <div class="form-group" id="design_type" >
                                            <label for="location" class="block mb-2 text-sm text-gray-600 dark:text-gray-400">{{__('tables.note')}}</label>
                                            <textarea   name="note"  required class="form-control" ></textarea>
                                        </div>
                                        <div class="form-group" id="name_circuit" >
                                            <label for="location" class="block mb-2 text-sm text-gray-600 dark:text-gray-400">{{__('tables.convenant_date')}}</label>
                                            <input type="date" name="convenant_date" id="name_circuit" placeholder="" required class="form-control" />
                                        </div>
            
                                        <div class="modal-footer">
                                  
                                            <button type="submit" class="btn btn-outline-success"><i class="fa fa-floppy-o" aria-hidden="true"></i>  {{__('button.save')}}</button>
                 
                                 
                                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i> {{__('button.close')}}</button>
                                      </div>
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
                var DigitalCircuit = $("input[name=DigitalCircuitinsert]").val();
                var statusf = $("input[name=statusinsert]").val();
                var provider_id = $("select[name=provider_idinsert]").val();
                var url = '{{ url('simcard/store') }}';
        
                $.ajax({
                   url:url,
                   method:'POST',
                   data:{
                    serial:serial, 
                        DigitalCircuit:DigitalCircuit, 
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

@endsection
