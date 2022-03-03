          
 @extends('layouts.app')
<meta name="csrf-token" content="{{ csrf_token() }}" />

@section('content')
<main class="sm:container sm:mx-auto sm:mt-10">

       {{-- card --}}
       <div class="card">
        <div class="card-header">
       <h3 class="title text-center"  >   {{__('ar.recording')}}</h3>
         </div>
        <div class="card-body justify-content-center text-center">
            <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModalrecording"><i class="fa fa-plus" aria-hidden="true"></i> {{__('ar.add')}}</button>
    
        <table class="table">
            <thead class="text-center">
                
                             

                <tr>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">{{__('ar.recording_type')}}</th>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">{{__('ar.recording_branch')}}</th>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">{{__('ar.recording_size')}}</th>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">{{__('ar.edit')}}</th>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">{{__('ar.reomve')}}</th>
             </tr>
            </thead>
            <tbody>
            @foreach ($recordings as $recording)
                
            
                <tr class="bg-white lg:hover:bg-gray-100 flex lg:table-row flex-row lg:flex-row flex-wrap lg:flex-no-wrap mb-10 lg:mb-0">
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                        {{$recording->type}}
                    </td>
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                         {{$recording->branch->name}}  
                    </td>
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                        {{$recording->size}}
                    </td>
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                      <button type="button" class="btn btn-outline-dark" data-toggle="modal" data-target="#modal{{$recording->id}}">
                          <i class="fa fa-pencil-alt" aria-hidden="true"></i>  {{__('ar.edit')}}
                        </button>
                      </td>
                  <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                    <form action="{{route('recording_destroy',$recording->id)}}" method="post">
                              @csrf
                              @method('DELETE')
                              <button type="submit"  class="btn btn-outline-danger " onclick="return confirm('{{__('ar.reomve_confirm')}} {{__('ar.reomve')}}')"><i class="fa fa-trash"></i> {{__('ar.reomve')}}</button>
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
@foreach ($recordings as $recording)

<div class="modal fade" id="modal{{$recording->id}}">
  <div class="modal-dialog">
    <div class="modal-content">
    
      <!-- Modal Header -->
      
            <h4 class="modal-title modal-header justify-content-center text-center">{{$recording->type}}</h4>
        
        
         <!--Header End-->
      
         <!-- Modal Content-->
         <div class="modal-body justify-content-center text-center">
                      <form action="{{route('recording_update',$recording->id)}}" method="POST">
                        @csrf
                            @method('PUT')

                           <div class="form-group">
                                <label for="name" >{{__('ar.recording_type')}}</label>
                                <input value="{{$recording->type}}" type="text" name="type" id="name" required class="form-control"/>
                            </div>
                            
                            
                          <div class="form-group">
                                <div class="inline-block relative w-64">
                                    <label for="name" >{{__('ar.recording_branch')}}</label>
                           
                                      <select name="branch_id" 
                                      class="form-control" required>
                                        
                                        @foreach ($branchs as $branch )
                                        <option value="{{$branch->id}}" {{$branch->id == $recording->branch_id ? 'selected' : ''}} >{{$branch->name}}</option>
                       
                                        @endforeach
                                      
                                      </select> 
                                  
                                  </div>
                               </div> 
                               
                               
                            <div class="form-group">
                                <label for="name" >{{__('ar.recording_size')}}</label>
                                <input value="{{$recording->size}}" type="number" name="size" id="name" required class="form-control"/>
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
 <div class="modal " id="myModalrecording">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header justify-content-center text-center">
        <h4 class="modal-title">{{__('ar.recording_add')}}</h4>
       
      </div>
           <!-- Modal Content-->
           <div class="modal-body justify-content-center text-center">
             
                        <form class="form" action="{{route('recording_store')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="name" >{{__('ar.recording_type')}}</label>
                                <input type="text" name="type" id="name"  placeholder="{{__('ar.recording_type')}}" required class="form-control"/>
                            </div>

                           <div class="form-group">
                                <div class="inline-block relative w-64">
                                    <label for="name" >{{__('ar.recording_branch')}}</label>
                           
                                      <select name="branch_id" 
                                      class="form-control">
                                       
                                        @foreach ($branchs as $branch )
                                        <option value="{{$branch->id}}" >{{$branch->name}}</option>
                       
                                        @endforeach
                                      
                                      </select> 
                                  
                                  </div>
                               </div>  

                            <div class="form-group">
                                <label for="name" >{{__('ar.recording_size')}}</label>
                                <input type="number" name="size" id="name"  placeholder="{{__('ar.recording_size')}}" required class="form-control"/>
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
      
                 <!-- End of Modal Content-->
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
            var url = '{{ url('recording/store') }}';
    
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
    
    </script> --}}
@endsection
