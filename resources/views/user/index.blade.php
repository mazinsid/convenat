@extends('layouts.app')
<meta name="csrf-token" content="{{ csrf_token() }}" />

@section('content')
<main class="sm:container sm:mx-auto sm:mt-10">
  


           
    {{-- card --}}
    <div class="card">
        <div class="card-header">
       <h3 class="title text-center"  >   {{__('ar.users')}}</h3>
         </div>
        <div class="card-body justify-content-center text-center">
            <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus" aria-hidden="true"></i> {{__('ar.add')}}</button>
    
        <table class="table">
            <thead class="text-center">
                <tr>
                   <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">{{__('ar.user_name')}}</th>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">{{__('ar.email')}}</th>             
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">{{__('ar.user_role')}}</th>             
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">{{__('ar.edit')}}</th>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">{{__('ar.reomve')}}</th>
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
                            <i class="fa fa-pencil-alt" aria-hidden="true"></i>  {{__('ar.edit')}}
                          </button>
                        </td>
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                      <form action="{{route('users_destroy',$user->id)}}" method="post">
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
@foreach ($users as $user)
     
<div class="modal fade" id="modal{{$user->id}}">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
       
           <h4 class="modal-title modal-header justify-content-center text-center">{{$user->name}}</h4>
          
           <!--Header End-->
        
           <!-- Modal Content-->
           <div class="modal-body justify-content-center text-center">
                            <form class="form" action="{{route('users_update',$user->id)}}"  method="POST">
                            @csrf
                                @method('PUT')
    

                                <div class="form-group">
                                    <label for="uname">{{__('ar.user_name')}}</label>
                                <input value="{{$user->name}}" type="text" name="name" id="name" placeholder="{{__('ar.user_name')}}" required  class="form-control" />
                            </div>
                            <div class="form-group">
                                <label for="name">{{__('ar.email')}}</label>
                                <input value="{{$user->email}}" type="text" name="email" id="name" placeholder="{{__('ar.email')}}" required  class="form-control" />
                            </div> 
                            <div class="form-group">
                                <label for="name"  >{{__('ar.password')}}</label>
                                <input  type="text" name="password" id="name" placeholder="{{__('ar.password')}}"  class="form-control" />
                            </div>
                            
                            <div class="form-group">
                                 <label for="name"  >{{__('ar.user_role')}}</label>
                                <div class="inline-block relative w-64">
                                    <select name="role" 
                                    class="form-control">
                                        
                                         
                                     
                                      <option value="admin"  {{($user->role == __('ar.users_admin')) ? 'selected' : ''  }} >{{__('ar.users_admin')}}</option>
                                      <option value="user" {{($user->role == __('ar.users_user')) ? 'selected' : ''  }} >{{__('ar.users_user')}}</option>
                                   
                                           </select> 
                                
                                </div>
                                </div>
                            
                          
                    </div>
                    <div class="modal-footer">
                        <div class="form-group">
                            <button type="submit" class="btn btn-outline-success"><i class="fa fa-save" aria-hidden="true"></i>  {{__('ar.save')}}</button>
                        </div>
                    </form>
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> {{__('ar.close')}}</button>
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
       <h4 class="modal-title modal-header justify-content-center text-center">{{__('ar.users_add')}}</h4> 
           <!-- Modal Content-->
           <div class="modal-body justify-content-center text-center">
                         <div class="form-group">
                            <form action="{{route('users_store')}}" method="POST">
                                    @csrf
                            <div class="form-group">
                                <label for="name"  >{{__('ar.user_name')}}</label>
                                <input  type="text" name="name" id="name" placeholder="{{__('ar.user_name')}}" required  class="form-control" />
                            </div>
                            <div class="form-group">
                                <label for="name"  >{{__('ar.email')}}</label>
                                <input  type="text" name="email" id="name" placeholder="{{__('ar.email')}}" required  class="form-control" />
                            </div> 
                            <div class="form-group">
                                <label for="name"  >{{__('ar.password')}}</label>
                                <input  type="text" name="password" id="name" placeholder="{{__('ar.password')}}" required  class="form-control" />
                            </div>
                            <div class="form-group">
                                <label for="name"  >{{__('ar.user_role')}}</label>
                            
                                <div class="inline-block relative w-64">
                                    <select name="role" 
                                    class="form-control">
                                      <option value="admin" > {{__('ar.users_admin')}}</option>
                                      <option value="user"  >{{__('ar.users_user')}}</option>
                                           </select> 
                                
                                </div>
                                </div>
                            
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

@endsection
