@extends('layouts.app')
<meta name="csrf-token" content="{{ csrf_token() }}" />

@section('content')
<main class="sm:container sm:mx-auto sm:mt-10">
  


           
    {{-- card --}}
    <div class="card">
        <div class="card-header">
       <h3 class="title text-center"  >   {{__('header.users')}}</h3>
         </div>
        <div class="card-body justify-content-center text-center">
            <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus" aria-hidden="true"></i> {{__('button.add')}}</button>
    
        <table class="table">
            <thead class="text-center">
                <tr>
                   <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">{{__('tables.name')}}</th>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">{{__('tables.email')}}</th>             
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">{{__('tables.role')}}</th>             
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">{{__('button.edit')}}</th>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">{{__('button.reomve')}}</th>
              </tr>
            </thead>
            <tbody>
            @foreach ($users as $user)
                
            
                <tr class="bg-white lg:hover:bg-gray-100 flex lg:table-row flex-row lg:flex-row flex-wrap lg:flex-no-wrap mb-10 lg:mb-0">
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                       {{$user->name}}
                    </td>
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                       {{$user->email}}
                    </td>
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                       {{$user->role}}
                    </td>
                    
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                        <button type="button" class="btn btn-outline-dark" data-toggle="modal" data-target="#modal{{$user->id}}">
                            <i class="fa fa-pencil" aria-hidden="true"></i>  {{__('button.edit')}}
                          </button>
                        </td>
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                      <form action="{{route('users_destroy',$user->id)}}" method="post">
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
    </div>
    
</main>
{{-- edit-modal --}}
@foreach ($users as $user)
     
<div class="modal fade" id="modal{{$user->id}}">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header justify-content-center text-center">  
            {{$user->name}}
           </div>
          
           <!--Header End-->
        
           <!-- Modal Content-->
           <div class="modal-body justify-content-center text-center">
                            <form class="form" action="{{route('users_update',$user->id)}}"  method="POST">
                            @csrf
                                @method('PUT')
    

                                <div class="form-group">
                                    <label for="uname">{{__('tables.name')}}</label>
                                <input value="{{$user->name}}" type="text" name="name" id="name" placeholder="{{__('tables.name')}}" required  class="form-control" />
                            </div>
                            <div class="form-group">
                                <label for="name">{{__('tables.email')}}</label>
                                <input value="{{$user->email}}" type="text" name="email" id="name" placeholder="{{__('tables.email')}}" required  class="form-control" />
                            </div> 
                            <div class="form-group">
                                <label for="name"  >{{__('tables.password')}}</label>
                                <input  type="text" name="password" id="name" placeholder="{{__('tables.password')}}"  class="form-control" />
                            </div>
                            <div class="form-group">
                                <div class="inline-block relative w-64">
                                    <select name="role" 
                                    class="form-control">
                                      <option value="admin"  {{($user->role == 'admin') ? 'selected' : ''  }} > مدير</option>
                                      <option value="user" {{($user->role == 'user') ? 'selected' : ''  }} >مستخدم</option>
                                           </select> 
                                
                                </div>
                                </div>
                            
                          
                    </div>
                    <div class="modal-footer">
                        <div class="form-group">
                            <button type="submit" class="btn btn-outline-success"><i class="fa fa-floppy-o" aria-hidden="true"></i>  {{__('button.save')}}</button>
                        </div>
                    </form>
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i> {{__('button.close')}}</button>
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
        <h4 class="modal-title">{{__('button.add')}}</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
           <!-- Modal Content-->
           <div class="modal-body justify-content-center text-center">
                         <div class="form-group">
                            <form action="{{route('users_store')}}" method="POST">
                                    @csrf
                            <div class="form-group">
                                <label for="name"  >{{__('tables.name')}}</label>
                                <input  type="text" name="name" id="name" placeholder="{{__('tables.name')}}" required  class="form-control" />
                            </div>
                            <div class="form-group">
                                <label for="name"  >{{__('tables.email')}}</label>
                                <input  type="text" name="email" id="name" placeholder="{{__('tables.email')}}" required  class="form-control" />
                            </div> 
                            <div class="form-group">
                                <label for="name"  >{{__('tables.password')}}</label>
                                <input  type="text" name="password" id="name" placeholder="{{__('tables.password')}}" required  class="form-control" />
                            </div>
                            <div class="form-group">
                                <label for="name"  >{{__('tables.email')}}</label>
                            
                                <div class="inline-block relative w-64">
                                    <select name="role" 
                                    class="form-control">
                                      <option value="admin" > مدير</option>
                                      <option value="user"  >مستخدم</option>
                                           </select> 
                                
                                </div>
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
 
           <!-- End of Modal Content-->

@endsection
