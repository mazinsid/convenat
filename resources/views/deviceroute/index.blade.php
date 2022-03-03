@extends('layouts.app')
<meta name="csrf-token" content="{{ csrf_token() }}" />
@section('content')
    <main class="sm:container sm:mx-auto sm:mt-10">

        {{-- card --}}
        <div class="card">
            <div class="card-header">
                <h3 class="title text-center"  >   {{__('ar.routers')}}</h3>
            </div>
            <div class="card-body justify-content-center text-center">
                <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus" aria-hidden="true"></i> {{__('ar.add')}}</button>

                <table class="table">
                    <thead class="text-center">

                    <tr>
                        <th   >{{__('ar.router_type')}}</th>
                        <th   >{{__('ar.router_model')}}</th>
                        <th   >{{__('ar.router_version')}}</th>
                        <th   >{{__('ar.edit')}}</th>
                        <th   >{{__('ar.reomve')}}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($device_routes as $device_route)


                        <tr class="text-center">
                            <td  >
                                {{$device_route->type}}
                            </td>
                            <td>
                            {{$device_route->model}}
                            </td>
                            <td>{{$device_route->version}}
                            </td>
                            <td>
                                <button type="button" class="btn btn-outline-dark"
                                        data-toggle="modal"
                                        data-target="#modal{{$device_route->id}}">
                                    <i class="fa fa-pencil-alt" aria-hidden="true">
                                    </i>  {{__('ar.edit')}}
                                </button>
                            </td>
                            <td>
                                <form action="{{route('DeviceRoute_destroy',$device_route->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"  class="btn btn-outline-danger " onclick="return confirm('{{__('ar.reomve_confirm')}} {{__('ar.circuit')}}')"><i class="fa fa-trash"></i> {{__('ar.reomve')}}</button>
                                </form>
                            </td>
                        </tr>

                    @endforeach
                    </tbody>
                </table>
                <!-- component -->

                {{-- edit-modal --}}
                @foreach ($device_routes as $device_route)

                    <div class="modal fade" id="modal{{$device_route->id}}">
                        <div class="modal-dialog">
                            <div class="modal-content">

                                <!-- Modal Header -->
                                <div class="modal-header justify-content-center text-center">
                                    {{$device_route->type}}</div>

                                <!--Header End-->

                                <!-- Modal Content-->
                                <div class="modal-body justify-content-center text-center">

                                    <form action="{{route('DeviceRoute_update',$device_route->id)}}" method="POST">
                                        @csrf

                                        @method('PUT')
                                        <div class="form-group">
                                            <label for="monthly_cost">{{__('ar.router_type')}}</label>
                                            <input type="text"  value="{{$device_route->type}}" name="type" id="device_route" placeholder="+1 (555) 1234-567" required class="form-control" />
                                        </div>

                                        <div class="form-group" id="design_type" >
                                            <label for="location">{{__('ar.router_model')}}</label>
                                            <input type="text" value="{{$device_route->model}}" name="model" id="design_type" placeholder="" required class="form-control" />
                                        </div>
                                        <div class="form-group" id="name_circuit" >
                                            <label for="location" >{{__('ar.router_version')}}</label>
                                            <input type="text" value="{{$device_route->version}}" name="version" id="name_circuit" placeholder="" required class="form-control" />
                                        </div>
                                        <div class="modal-footer">

                                            <button type="submit" class="btn btn-outline-success"><i class="fa fa-save" aria-hidden="true"></i>  {{__('ar.save')}}</button>


                                            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> {{__('ar.close')}}</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
            </div>


            {{-- insert-modal --}}
            <div class="modal" id="myModal">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <!-- Modal Header -->
                        <div class="modal-header justify-content-center text-center">
                            <h4 class="modal-title">{{__('ar.circuit_add')}}</h4>

                        </div>

                        <!-- Modal Content-->
                        <div class="modal-body justify-content-center text-center">
                            <div class="m-7">
                                <form action="{{route('DeviceRoute_store')}}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="monthly_cost">{{__('ar.router_type')}}</label>
                                        <input type="text"  name="type" id="device_route"  required class="form-control" />
                                    </div>

                                    <div class="form-group" id="design_type" >
                                        <label for="location">{{__('ar.router_model')}}</label>
                                        <input type="text" name="model" id="design_type" placeholder="" required class="form-control" />
                                    </div>
                                    <div class="form-group" id="name_circuit" >
                                        <label for="location" >{{__('ar.router_version')}}</label>
                                        <input type="text" name="version" id="name_circuit" placeholder="" required class="form-control" />
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

            </div>
        </div>
    </main>
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
                    var device_route = $("input[name=device_routeinsert]").val();
                    var statusf = $("input[name=statusinsert]").val();
                    var provider_id = $("select[name=provider_idinsert]").val();
                    var url = '{{ url('simcard/store') }}';

                    $.ajax({
                       url:url,
                       method:'POST',
                       data:{
                        serial:serial,
                            device_route:device_route,
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
