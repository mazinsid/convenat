@extends('layouts.app')
<meta name="csrf-token" content="{{ csrf_token() }}" />

@section('content')
<main class="sm:container sm:mx-auto sm:mt-10">
  
   {{-- card --}}
   <div class="card">
    <div class="card-header">
   <h3 class="title text-center"  >   {{__('header.return')}}</h3>
    
    <div class="card-body justify-content-center text-center">
                            <form action="{{route('return_store')}}" method="POST">
                                @csrf      
                                   <div class="form-group">
                                        <label for="name"  >{{__('header.employee')}}</label>
                                        <input readonly type="text" value="{{$covenant->employee->name}}" class="form-control" />
                                    </div>
                                    <div class="form-group">
                                        <label for="name"  >{{__('header.type')}}</label>
                                        <input readonly type="text" value="{{$covenant->ptype->name}} : {{$covenant->ptype->pmodel->name}}" class="form-control" />
                                    </div>
                                    <div class="form-group">
                                        <label for="name"  >{{__('header.serial')}}</label>
                                        <input readonly type="text" value="{{$covenant->serial->serial}}"  class="form-control" />
                                    </div>
                                    <div class="form-group">
                                        <label for="name"  >{{__('tables.note')}}</label>
                                        <input readonly type="text" value="{{$covenant->note}}" name="note"  class="form-control" />
                                    </div>
                                    <div class="form-group">
                                        <label for="name"  >{{__('tables.acceptance')}}</label>
                                        <input readonly type="text" value="{{$covenant->acceptance}}"   class="form-control" />
                                    </div>
                                    <div class="form-group">
                                        <label for="name"  >{{__('tables.return')}}</label>
                                        <input  type="date" name="return_date" id="name"    required     class="form-control" />
                                    </div>
                                    <div class="modal-footer">
                                        <input hidden value="{{$covenant->id}}" name="covenans_id">
                                        <input hidden value="{{$covenant->code_number}}" name="code_number">
                                        <input hidden value="{{$covenant->employees_id}}" name="employees_id">
                                        <input hidden value="{{$covenant->serials_id}}" name="serials_id">
                                        <button type="submit" class="btn btn-outline-success"><i class="fa fa-floppy-o" aria-hidden="true"></i> {{__('button.save')}} </button>
                                            
                                        <p class="text-base text-center text-gray-400" id="result">
                                        </p>
                                    </form>  
                                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i>  {{__('button.close')}}</button>
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
