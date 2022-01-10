@extends('layouts.app')
<meta name="csrf-token" content="{{ csrf_token() }}" />
@section('content')
<main class="sm:container sm:mx-auto sm:mt-10">

             
    {{-- card --}}
    <div class="card">
      <div class="card-header">
     <h3 class="title text-center"  >   {{__('header.job')}}</h3>
       </div>
      <div class="card-body justify-content-center text-center">
          <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModaljob">
            <i class="fa fa-plus" aria-hidden="true"></i> {{__('button.add')}}</button>
  
      <table class="table">
          <thead class="text-center">
            <thead>
                <tr>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">{{__('tables.name')}}</th>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">{{__('button.edit')}}</th>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">{{__('button.reomve')}}</th>
              </tr>
            </thead>
            <tbody>
            @foreach ($jobs as $job)
                
            
                <tr class="bg-white lg:hover:bg-gray-100 flex lg:table-row flex-row lg:flex-row flex-wrap lg:flex-no-wrap mb-10 lg:mb-0">
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                       {{$job->name}}
                    </td>
              
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                      <button type="button" class="btn btn-outline-dark" data-toggle="modal" data-target="#modal{{$job->id}}">
                          <i class="fa fa-pencil" aria-hidden="true"></i>  {{__('button.edit')}}
                        </button>
                      </td>
                  <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                    <form action="{{route('users_destroy',$job->id)}}" method="post">
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
@foreach ($jobs as $job) 

<div class="modal fade" id="modal{{$job->id}}">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header justify-content-center text-center">  
            {{$job->name}}
           </div>
          
           <!--Header End-->
        
           <!-- Modal Content-->
           <div class="modal-body justify-content-center text-center">
                      <form action="{{route('job_update',$job->id)}}" method="POST">
                        @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="name" >{{__('tables.name')}}</label>
                                <input value="{{$job->name}}" type="text" name="name" id="name" required class="form-control" />
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
                           <form action="{{route('job_store')}}" method="POST">
                            @csrf
                
                            <div class="form-group">
                                <label for="name">{{__('tables.name')}}</label>
                                <input type="text" name="nameinsert" id="name" placeholder="{{__('tables.name')}}" required class="form-control" />
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
