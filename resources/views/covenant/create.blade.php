@extends('layouts.app')


<meta name="csrf-token" content="{{ csrf_token() }}" />


@section('content')
<main class="sm:container sm:mx-auto sm:mt-10">
  <div class="container">
    <div class="card">

     <div class="card-header titel text-center"><h2>أضافة عهدة</h2></div>
     <div class="card-body">                
                      <form action="{{route('covenant_store')}}" method="POST">
                          @csrf
                          <div class="col-xs-4 text-center">
                            <div class="form-group ">
                              <label for="name"  >{{__('tables.code')}}</label>
                              <input  type="text" value="{{$code}}" readonly name="code_number" id="acceptance"   required class="form-control" />
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
                                              <select name="product_id" id="product"
                                    class="form-control">
                                      <option>أختار {{__('tables.product')}}</option>
                                      @foreach ($products as $product )
                                      <option value="{{$product->id}}">{{$product->name}}</option>
                     
                                      @endforeach
                                    
                                    </select> 
                                
                                </div>
                                </div>
                                <div class="form-group">
                                    <div  class="inline-block relative w-64">
                                      <label for="name"  >{{__('tables.model')}}</label>
                                      <select name="pmodels" id="pmodel"
                                            class="form-control">
                                            </select>
                                    </div>
                                    
                                </div>
                                <div class="form-group">
                                        <div  class="inline-block relative w-64">
                                          <label for="name"  >{{__('header.type')}}</label>
                                          <select name="ptypes_id" id="ptype"
                                                class="form-control">
                                                </select>
                                        </div>
                                        
                                    </div>
                                    <div  id="car" style="display: none" >
                                    <div class="form-group">
                                        <label for="name"  >{{__('tables.plate_number')}}</label>
                                        <input   type="text" name="plate_number" id="acceptance"    class="form-control" />
                                    </div>
                                    <div class="form-group">
                                        <label  for="name"  >{{__('tables.vehicle_type')}}</label>
                                        <input   type="text" name="vehicle_type" id="acceptance"    class="form-control" />
                                    </div>
                                        
                                    </div>
                      <div class="form-group">
                        <div class="inline-block relative w-64">
                            <select name="serials_id" id="serials"
                            class="form-control">
                             
                            
                            </select>
                        </div>
                    </div>
                            <div class="form-group">
                                <label for="name"  >{{__('tables.acceptance')}}</label>
                                <input  type="date" name="acceptance" id="name"   required class="form-control" />
                            </div>
                         

                          <div class="form-group">
                            <label for="name"  >{{__('tables.call_number')}}</label>
                            <input  type="text" name="call_number" id="call_number"   required class="form-control" />
                        </div>
                        <div class="form-group">
                          <label for="name"  >{{__('tables.call_code')}}</label>
                          <input  type="text" name="call_code" id="call_code"   required class="form-control" />
                      </div> 

                            <div class="form-group">
                                <label for="name"  >{{__('tables.note')}}</label>
                                <textarea  type="text" name="note" id="name"   required class="form-control" >
                              
                                </textarea>
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
$( "#product" ).change(function() 
{
$.getJSON("/covenant/public/serial/"+ $(this).val() +"/getModle", function(jsonData){
select = '<option >أختار موديلات الأجهزة</option>';
  $.each(jsonData, function(i,data)
  {

       select +='<option value="'+data.id+'">'+data.name+'</option>';
   });
select += '</select>';
$("#pmodel").html(select);
});
});

    /* Load ptype into option <selec> */
$( "#pmodel" ).change(function() 
{
$.getJSON("/covenant/public/serial/"+ $(this).val()+"/getType", function(jsonData){
select = '<option  >أختار النوع</option>';
  $.each(jsonData, function(i,data)
  {
       select +='<option value="'+data.id+'">'+data.name+'</option>';
   });
select += '</select>';
$("#ptype").html(select);
});
});

$( "#ptype" ).change(function() 
{
$.getJSON("/covenant/public/serial/"+ $(this).val()+"/getSerial", function(jsonData){
select = '<option  >أختار الرقم الجهاز</option>';
  $.each(jsonData, function(i,data)
  {
       select +='<option value="'+data.id+'">'+data.serial+'</option>';
   });
select += '</select>';
$("#serials").html(select);
});
});
   /* Load ptype into option <selec> */
  $( "#ptype" ).change(function() 
{
if ( $("#ptype").val() == 1) {
  document.getElementById('car').style.display= "inline" ;
}else{
  document.getElementById('car').style.display= "none" ;
}
});

</script>
@endsection