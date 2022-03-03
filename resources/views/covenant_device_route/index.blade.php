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
                <a href="{{route('CovenantDeviceRoute_create')}}" type="button" class="btn btn-info btn-lg"><i class="fa fa-plus" aria-hidden="true"></i> {{__('button.add')}}</a>

                <table class="table">
                    <thead class="text-center">
                    <tr>
                        <th class="">{{__('ar.routers')}}</th>
                        <th class="">{{__('ar.department')}}</th>
                        <th class="">{{__('ar.note')}}</th>
                        <th class="">{{__('ar.acceptance')}}</th>
                        <th class="">{{__('ar.code_number')}}</th>
                        <th class="">{{__('ar.edit')}}</th>
                        <th class="">{{__('ar.reomve')}}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($CovenantDeviceRoutes as $CovenantDeviceRoutes)


                        <tr >
                            <td>
                                {{$CovenantDeviceRoute->device_route_id}}
                            </td>
                            <td >
                                {{$CovenantDeviceRoute->department->name}}
                            </td>
                            <td >
                                {{$CovenantDeviceRoute->note}}
                            </td>
                            <td>
                                {{$CovenantDeviceRoute->acceptance}}
                            </td>
                            <td>
                                {{$CovenantDeviceRoute->code_number}}
                            </td>

                            <td>
                                <button type="button" class="btn btn-outline-dark" data-toggle="modal" data-target="#modal{{$CovenantDeviceRoute->id}}">
                                    <i class="fa fa-pencil" aria-hidden="true"></i>  {{__('button.edit')}}
                                </button>
                            </td>
                            <td >
                                <form action="{{route('CovenantDeviceRoute_destroy',$CovenantDeviceRoute->id)}}" method="post">
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
            @foreach ($CovenantDeviceRoutes as $CovenantDeviceRoute)
                <div class="modal fade" id="modal{{$CovenantDeviceRoute->id}}">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <!-- Modal Header -->
                            <div class="modal-header justify-content-center text-center">
                                {{__('button.edit')}}
                            </div>
                            <!--Header End-->
                            <!-- Modal Content-->
                            <div class="modal-body justify-content-center text-center">
                                <form action="{{route('phoneCovenantDeviceRoute_update',$CovenantDeviceRoute->id)}}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <label>{{__('ar.simcard')}}</label>
                                        <input value="{{$CovenantDeviceRoute->simcards_id}}" type="text" name="simcards_id" required class="form-control" />
                                    </div>

{{-- 
                                    <div class="form-group">
                                        <div class="inline-block relative w-64">
                                            <label for="location"  >{{__('header.device_privete')}}</label>
                                            <select name="type"
                                                    class="form-control">
                                                <option>أختار {{__('header.type')}}</option>
                                                <option value="{{$CovenantDeviceRoute->type}}" {{($CovenantDeviceRoute->type == __('tables.CovenantDeviceRoute_public')) ? 'selected' : ''  }}>{{$CovenantDeviceRoute->type}}</option>
                                                <option value="{{$CovenantDeviceRoute->type}}" {{($CovenantDeviceRoute->type == __('tables.CovenantDeviceRoute_praived')) ? 'selected' : ''  }}>{{$CovenantDeviceRoute->type}}</option>

                                            </select>
                                        </div>
                                    </div> --}}
                                    <div class="form-group">

                                        <label class="text-sm">{{__('ar.menus_employee')}}</label>
                                        <input type="text" readonly  value="{{$CovenantDeviceRoute->employees_id}}" name="employees_id" required class="form-control" />
                                    </div>
                                  
                                    <div class="form-group">

                                        <label class="text-sm">{{__('ar.codes')}}</label>
                                        <input type="text" readonly  value="{{$CovenantDeviceRoute->code_number}}" name="code_number" required class="form-control" />
                                    </div>

                                    <div class="form-group" id="route_typeu" >
                                        <label  >{{__('tables.Mobile_features')}}</label>
                                        <input type="date"  value="{{$CovenantDeviceRoute->acceptance_date}}" name="acceptance_date"  required class="form-control" />
                                    </div>

                                    <div class="form-group" id="route_typeu" >
                                        <label  >{{__('tables.Mobile_features')}}</label>
                                        <textarea name="note"  required class="form-control">{{$CovenantDeviceRoute->acceptance_date}}</textarea>
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
                    var CovenantDeviceRoute = $("input[name=CovenantDeviceRouteinsert]").val();
                    var statusf = $("input[name=statusinsert]").val();
                    var provider_id = $("select[name=provider_idinsert]").val();
                    var url = '{{ url('simcard/store') }}';

                    $.ajax({
                       url:url,
                       method:'POST',
                       data:{
                        serial:serial,
                            CovenantDeviceRoute:CovenantDeviceRoute,
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

{{--    <script type="text/javascript">--}}
{{--        $( "#typeCovenantDeviceRoute" ).change(function()--}}
{{--        {--}}
{{--            var nationality = $('select[id="typeCovenantDeviceRoute"]').val();--}}

{{--            if ( nationality == 'جوال رسمي') {--}}
{{--                $('#CovenantDeviceRoute_detiels').show();--}}
{{--            }else{--}}
{{--                $('#CovenantDeviceRoute_detiels').hide();--}}
{{--            }--}}
{{--        });--}}
{{--    </script>--}}
@endsection
