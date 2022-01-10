@extends('layouts.app')

@section('content')
<main class="sm:container sm:mx-auto sm:mt-10">
    <div class="w-full sm:px-6">

        @if (session('status'))
            <div class="text-sm border border-t-8 rounded text-green-700 border-green-600 bg-green-100 px-3 py-4 mb-4" role="alert">
                {{ session('status') }}
            </div>
        @endif
    </div>
     {{-- card --}}
     <div class="card">
        <div class="card-header">
       <h3 class="title text-center"  >   {{__('header.employee')}}</h3>
         </div>
        <div class="card-body justify-content-center text-center">
            <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus" aria-hidden="true"></i> {{__('button.add')}}</button>
    
        <table class="table">
            <thead class="text-center">
            <thead>
                <tr>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">{{__('tables.name')}}</th>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">{{__('tables.phone')}}</th>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">{{__('tables.email')}}</th>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">{{__('tables.job')}}</th>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">{{__('tables.rank')}}</th>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">{{__('tables.gender')}}</th>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">{{__('tables.national_id')}}</th>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">{{__('tables.department')}}</th>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">{{__('button.edit')}}</th>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">{{__('button.reomve')}}</th>
               </tr>
            </thead>
            <tbody>
            @foreach ($employes as $employee)
                
            
                <tr class="bg-white lg:hover:bg-gray-100 flex lg:table-row flex-row lg:flex-row flex-wrap lg:flex-no-wrap mb-10 lg:mb-0">
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                        <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase"> </span>
                       {{$employee->name}}
                    </td>
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                        <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase"></span>
                        {{$employee->phone}}
                    </td>
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                        <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase"></span>
                        {{$employee->email}}
                    </td>
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                        <span class="rounded bg-green-400 py-1 px-3 text-xs font-bold">{{$employee->job->name}}</span>
                    </td>
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                         <span class="rounded bg-green-400 py-1 px-3 text-xs font-bold">{{$employee->rank->name}}</span>
                    </td>
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                        <span class="rounded bg-green-400 py-1 px-3 text-xs font-bold">{{$employee->gender}}</span>
                    </td>
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                        <span class="rounded bg-green-400 py-1 px-3 text-xs font-bold">{{$employee->national_id}}</span>
                    </td>
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                        <span class="rounded bg-green-400 py-1 px-3 text-xs font-bold">{{$employee->department->name}}</span>
                    </td>
               
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                        <button type="button" class="btn btn-outline-dark" data-toggle="modal" data-target="#modal{{$employee->id}}">
                            <i class="fa fa-pencil" aria-hidden="true"></i>  {{__('button.edit')}}
                          </button>
                        </td>
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                      <form action="{{route('users_destroy',$employee->id)}}" method="post">
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
@foreach ($employes as $employee)

<div class="modal fade" id="modal{{$employee->id}}">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header justify-content-center text-center">  
            {{$employee->name}}
           </div>
          
           <!--Header End-->
        
           <!-- Modal Content-->
           <div class="modal-body justify-content-center text-center">
                        <form action="{{route('employee_update',$employee->id)}}" method="POST">
                            @csrf
                                @method('PUT')
                    
                            <div class="form-group">
                                <label for="name" class="block mb-2 text-sm text-gray-600 dark:text-gray-400">{{__('tables.name')}}</label>
                                <input value="{{$employee->name}}" type="text" name="name" id="name" placeholder="" required class="form-control" />
                            </div>
                         
                            <div class="form-group">
        
                                <label for="phone" class="text-sm text-gray-600 dark:text-gray-400">{{__('tables.phone')}}</label>
                                <input type="text"  value="{{$employee->phone}}" name="phone" id="phone"  required class="form-control" />
                            </div>
                            
                            <div class="form-group">
                                <label for="email" class="block mb-2 text-sm text-gray-600 dark:text-gray-400">{{__('tables.email')}}</label>
                                <input type="text"  value="{{$employee->email}}" name="email" id="location" placeholder="you@company.com" required class="form-control" />
                            </div>
                            <div class="form-group">
                                <label for="email" class="block mb-2 text-sm text-gray-600 dark:text-gray-400">{{__('tables.national_id')}}</label>
                                <input type="text"  value="{{$employee->national_id}}" name="national_id" id="location" placeholder="you@company.com" required class="form-control" />
                            </div>
                            <div class="form-group">
                                <div class="inline-block form-group">
                                    <label for="email" class="block mb-2 text-sm text-gray-600 dark:text-gray-400">{{__('tables.rank')}}</label>
                                 
                                    <select name="rank_id" 
                                    class="form-control">
                                      <option>أختار {{__('tables.rank')}}</option>
                                      @foreach ($ranks as $rank )
                                      <option value="{{$rank->id}}"  {{($rank->id == $employee->rank_id) ? 'selected' : ''  }}>
                                        {{$rank->name}}</option>
                     
                                      @endforeach
                                    
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="inline-block form-group">
                                    <label for="email" class="block mb-2 text-sm text-gray-600 dark:text-gray-400">{{__('tables.job')}}</label>
                                 
                                    <select name="job_id" 
                                    class="form-control">
                                      <option>أختار {{__('tables.job')}}</option>
                                      @foreach ($jobs as $job )
                                      <option value="{{$job->id}}"  {{($job->id == $employee->job_id) ? 'selected' : ''  }}>
                                        {{$job->name}}</option>
                     
                                      @endforeach
                                    
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="inline-block form-group">
                                    
                                    <label for="email" class="block mb-2 text-sm text-gray-600 dark:text-gray-400">{{__('tables.gender')}}</label>
                                 
                                    <select name="gender" 
                                    class="form-control">
                                     <option >أختار {{__('tables.gender')}}</option>
                                     <option value="زكر" {{($employee->gender == 'زكر') ? 'selected' : ''  }}>زكر</option>
                                     <option value="انثي" {{($employee->gender == 'انثي') ? 'selected' : ''  }}>انثي</option>
                                </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="inline-block form-group">
                                    <label for="email" class="block mb-2 text-sm text-gray-600 dark:text-gray-400">{{__('header.regions')}}</label>
                                 
                                    <select name="department_id" 
                                    class="form-control">
                                      <option>أختار {{__('tables.department')}}</option>
                                      @foreach ($regions as $region )
                                      <option value="{{$region->id}}" {{($region->id == $employee->department_id) ? 'selected' : ''  }}>{{$region->name}}</option>
                     
                                      @endforeach
                                    
                                    </select>
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
    
</main>
 @endforeach
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
                                <form action="{{route('employee_store')}}" method="POST">
                                        @csrf
                            
                                <div class="mb-7">
                                        <div class="inline-block form-group">
                                            <label for="email" class="block mb-2 text-sm text-gray-600 dark:text-gray-400">{{__('header.regions')}}</label>
                                 
                                            <select name="regionsinsert" id="regions"
                                            class="form-control">
                                              <option>أختار {{__('tables.regions')}}</option>
                                              @foreach ($regions as $region )
                                              <option value="{{$region->id}}">{{$region->name}}</option>
                                              @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mb-7">
                                            <div class="inline-block form-group">
                                                <label for="email" class="block mb-2 text-sm text-gray-600 dark:text-gray-400">{{__('header.cities')}}</label>
                                 
                                                    <select name="citiesinsert" id="cities"
                                                    class="form-control">
                                                   

                                                    </select>
                                        </div>
                                    </div>
                                    <div class="mb-7">
                                            <div id="branchesload" class="block form-group">
                                                <label for="email" class="block mb-2 text-sm text-gray-600 dark:text-gray-400">{{__('tables.branch')}}</label>
                                 
                                                    <select name="branch_id" id="Branches"
                                                    class="form-control">
                                                   

                                                    </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                                <div class="inline-block form-group">
                                                    <label for="email" class="block mb-2 text-sm text-gray-600 dark:text-gray-400">{{__('tables.department')}}</label>
                                
                                                    <select name="department_id" 
                                                    class="form-control">
                                                      <option>أختار {{__('tables.department')}}</option>
                                                      @foreach ($departments as $department )
                                                      <option value="{{$department->id}}">{{$department->name}}</option>
                                     
                                                      @endforeach
                                                    
                                                    </select>
                                                </div>
                                            </div>
                                <div class="form-group">
                                    <label for="name" class="block mb-2 text-sm text-gray-600 dark:text-gray-400">{{__('tables.name')}}</label>
                                    <input type="text" name="name" id="name" placeholder="John Doe" required class="form-control" />
                                </div>
                             
                                <div class="form-group">
            
                                    <label for="phone" class="text-sm text-gray-600 dark:text-gray-400">{{__('tables.phone')}}</label>
                                    <input type="phone" name="phone" id="phone" placeholder="+1 (555) 1234-567" required class="form-control" />
                                </div>
                                
                                <div class="form-group">
                                    <label for="email" class="block mb-2 text-sm text-gray-600 dark:text-gray-400">{{__('tables.email')}}</label>
                                    <input type="email" name="email" id="location" placeholder="you@company.com" required class="form-control" />
                                </div>
                                <div class="form-group">
                                    <label for="name" class="block mb-2 text-sm text-gray-600 dark:text-gray-400">{{__('tables.national_id')}}</label>
                                    <input type="text" name="national_id" id="name" placeholder="" required class="form-control" />
                                </div>
                    
                                    <div class="form-group">
                                        <label for="email" class="block mb-2 text-sm text-gray-600 dark:text-gray-400">{{__('tables.rank')}}</label>
                                 
                                        <select name="rank_id" 
                                        class="form-control">
                                          <option>أختار {{__('tables.rank')}}</option>
                                          @foreach ($ranks as $rank )
                                          <option value="{{$rank->id}}">{{$rank->name}}</option>
                         
                                          @endforeach
                                        
                                        </select>
                                    </div>
                                </div>
                              
                                    <div class="form-group">
                                        <label for="email" class="block mb-2 text-sm text-gray-600 dark:text-gray-400">{{__('tables.job')}}</label>
                                 
                                        <select name="job_id" 
                                        class="form-control">
                                          <option>أختار {{__('tables.job')}}</option>
                                          @foreach ($jobs as $job )
                                          <option value="{{$job->id}}">{{$job->name}}</option>
                         
                                          @endforeach
                                        
                                        </select>
                                    </div>
                              
                        
                                    <div class="form-group">
                                        <label for="email" class="block mb-2 text-sm text-gray-600 dark:text-gray-400">{{__('tables.gender')}}</label>
                                 
                                        <select name="gender" 
                                        class="form-control">
                                         <option >أختار {{__('tables.gender')}}</option>
                                         <option value="زكر">زكر</option>
                                         <option value="انثي">انثي</option>
                                        </select>
                                    </div>
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
        
                var namef = $("input[name=nameinsert]").val();
                var phone = $("input[name=phoneinsert]").val();
                var email = $("input[name=emailinsert]").val();
                var national_id = $("input[name=national_idinsert]").val();
                var rank_id = $("select[name=rank_idinsert]").val();
                var job_id = $("select[name=job_idinsert]").val();
                var gender = $("select[name=genderinsert]").val();
                var department_id = $("select[name=department_idinsert]").val();
                var branch_id = $("select[name=branch_idinsert]").val();
                var url = '{{ url('employee/store') }}';
                
                $.ajax({
                   url:url,
                   method:'POST',
                   data:{
                         namen:namef, 
                        phone:phone, 
                        email:email, 
                        national_id:national_id,
                        rank_id:rank_id,
                        job_id:job_id,
                        gender:gender,
                        department_id:department_id,
                        branch_id : branch_id
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
<script type="text/javascript">


    /* Load cities into postion <selec> */
$( "#regions" ).change(function() 
{
 
    select = '<option > اختار المدينة</option>'
$.getJSON("/covenant/public/employee/"+ $(this).val() +"/getCities", function(jsonData){
    $.each(jsonData, function(i,data)
    {

         select +='<option value="'+data.id+'">'+data.name+'</option>';
     });
  select += '</select>';
  $("#cities").html(select);
});
});

      /* Load branches into postion <selec> */
 $( "#cities" ).change(function() 
{
    select = '<option > اختار الفروع</option>'
$.getJSON("/covenant/public/employee/"+ $(this).val() +"/getBranche", function(jsonData){
    $.each(jsonData, function(i,data)
    {

         select +='<option value="'+data.id+'">'+data.name+'</option>';
     });
  select += '</select>';
  $("#Branches").html(select);
});
});
</script>
@endsection
