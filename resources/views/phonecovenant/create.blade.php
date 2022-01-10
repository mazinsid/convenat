@extends('layouts.app')


<meta name="csrf-token" content="{{ csrf_token() }}" />


@section('content')
<main class="sm:container sm:mx-auto sm:mt-10">
  <div class="container">
    <div class="card">

     <div class="card-header titel text-center"><h2>أضافة عهدة</h2></div>
     <div class="card-body">                
                      <form action="{{route('phonecovenant_store')}}" method="POST">
                          @csrf
                          <div class="col-xs-4 text-center">
                            <div class="form-group ">
                              <label for="name"  >{{__('tables.code')}}</label>
                              <input  type="text" value="{{$code}}" readonly name="code" id="acceptance"   required class="form-control" />
                          </div>
                              <div class="form-group">
                                      <div class="inline-block relative w-64">
                                        <label for="name"  >{{__('tables.regions')}}</label>
                                        <select name="regionsinsert" id="regions"
                                          class="form-control">
                                            <option>أختار {{__('tables.regions')}}</option>
                                            @foreach ($regions as $region )
                                            <option value="{{$region->id}}">{{$region->name}}</option>
                                            @endforeach
                                          </select>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                          <div class="inline-block relative w-64">
                                            <label for="name"  >{{__('tables.cities')}}</label>
                                                  <select name="citiesinsert" id="cities"
                                                  class="form-control">
                                                 

                                                  </select>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                          <div id="branchesload" class="block relative w-64">
                                            <label for="name"  >{{__('tables.branch')}}</label>
                                            <select name="branch_idinsert" id="Branches"
                                                  class="form-control">
                                                 

                                                  </select>
                                          </div>
                                      </div>
                                      <div class="form-group">
                                              <div class="inline-block relative w-64">
                                                <label for="name"  >{{__('header.employee')}}</label>
                                                <select name="employees_id" id="employees"
                                                  class="form-control">
                                              
                                                  
                                                  </select>
                                              </div>
                                          </div>
                            {{-- product --}}
                            <div class="form-group">
                                <div class="inline-block relative w-64">
                                  <label for="name"  >{{__('tables.product')}}</label>
                                              <select name="device_phone_id" id="phone"
                                    class="form-control">
                                      <option>أختار {{__('tables.product')}}</option>
                                      @foreach ($device_phones as $device_phone )
                                      <option value="{{$device_phone->id}}">{{$device_phone->phone_model}}</option>
                     
                                      @endforeach
                                    
                                    </select> 
                                
                                </div>
                                </div>
                                <div class="form-group">
                                    <div  class="inline-block relative w-64">
                                      <label for="name"  >{{__('tables.serial')}}</label>
                                      <select name="serial" id="PhoneSerial"
                                            class="form-control">
                                            </select>
                                    </div>
                                    
                                </div>
                               
                                        
                                    </div>
                    
                                    <div class="form-group">
                                        
                                        <label for="name"  >{{__('tables.note')}}</label>
                                        <textarea name="note" id="note"  class="form-control" ></textarea>
                                   
                                      </div>
                                    <div class="form-group">
                                        <label  for="name"  >{{__('tables.release_date')}}</label>
                                          <input   type="date" name="convenant_date" id="note"    class="form-control" />
                                    
                                    </div>
                                    
                            <div class="form-group">
                              <button type="submit" class="btn btn-outline-success"><i class="fa fa-floppy-o" aria-hidden="true"></i> {{__('button.save')}} </button>
                            </div>
                            <p class="text-base text-center text-gray-400" id="result">
                            </p>
                      </form>
                    </div>

           </div>
           
  </div>
</main>
{{-- <script type="text/javascript">

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

$( "#Branches" ).change(function() 
{
  select = '<option > اختار اسم المستخدم</option>'
$.getJSON("/covenant/public/employee/"+ $(this).val() +"/getEmployee", function(jsonData){
  $.each(jsonData, function(i,data)
  {

       select +='<option value="'+data.id+'">'+data.name+'</option>';
   });
select += '</select>';
$("#employees").html(select);
});
});
</script>

{{-- load select sirale product --}}
<script type="text/javascript">

  /* Load getModle into option <selec> */
// $( "#product" ).change(function() 
// {
// $.getJSON("/covenant/public/serial/"+ $(this).val() +"/getPhoneSerial", function(jsonData){
// select = '<option >أختار الرقم التسلسلي/option>';
//   $.each(jsonData, function(i,data)
//   {

//        select +='<option value="'+data.id+'">'+data.name+'</option>';
//    });
// select += '</select>';
// $("#pmodel").html(select);
// });
// });


</script> 

<script type="text/javascript">

    /* Load cities into postion <selec> */
  $( "#regions" ).change(function() 
  {
    select = '<option > اختار المدينة</option>'
  $.getJSON("/employee/"+ $(this).val() +"/getCities", function(jsonData){
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
  $.getJSON("/employee/"+ $(this).val() +"/getBranche", function(jsonData){
    $.each(jsonData, function(i,data)
    {
  
         select +='<option value="'+data.id+'">'+data.name+'</option>';
     });
  select += '</select>';
  $("#Branches").html(select);
  });
  });
  
  $( "#Branches" ).change(function() 
  {
    select = '<option > اختار اسم المستخدم</option>'
  $.getJSON("/employee/"+ $(this).val() +"/getEmployee", function(jsonData){
    $.each(jsonData, function(i,data)
    {
  
         select +='<option value="'+data.id+'">'+data.name+'</option>';
     });
  select += '</select>';
  $("#employees").html(select);
  });
  });
  </script>
  
  {{-- load select sirale product --}}
  <script type="text/javascript">
  
    /* Load getModle into option <selec> */
  $( "#phone" ).change(function() 
  {
  $.getJSON("/serial/"+ $(this).val() +"/getPhoneSerial", function(jsonData){
  select = '<option >أختار الرقم التسلسلي</option>';
    $.each(jsonData, function(i,data)
    {
        select +='<option value="'+data.id+'">'+data.serial+'</option>';
       });
  select += '</select>';
  $("#PhoneSerial").html(select);
  });
  });
  
  
  </script>
@endsection