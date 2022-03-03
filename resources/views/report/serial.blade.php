@extends('layouts.app')
<meta name="csrf-token" content="{{ csrf_token() }}" />
@section('content')
<main class="sm:container sm:mx-auto sm:mt-10">

    <section class="flex flex-col break-words bg-white sm:border-1 sm:rounded-md sm:shadow-sm sm:shadow-lg">

               
        <div class="justify-content-center text-center">
            <h3>{{__('header.report') }} :{{__('header.report sirale')}}</h3>
         
        
        <div class="bg-white shadow p-4 flex">
                     
                        <div class=" w-64">
                            <select name="product_id" id="product"
                            class="block appearance-none w-full bg-white border border-gray-400
                             hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none 
                             focus:shadow-outline">
                              <option>أختار {{__('tables.product')}}</option>
                              @foreach ($products as $product )
                              <option value="{{$product->id}}">{{$product->name}}</option>
             
                              @endforeach
                            
                            </select> 
                        
                        </div>
                        <div  class="w-64">
                            <select name="pmodels" id="pmodel"
                            class="block appearance-none w-full bg-white border border-gray-400
                             hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none 
                             focus:shadow-outline">
                             
                            </select>
                    </div>
                    <div  class=" w-64">
                        <select name="ptypes_id" id="ptype"
                        class="block appearance-none w-full bg-white border border-gray-400
                         hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none 
                         focus:shadow-outline">
                        </select>
                </div>
                <div class=" w-64">
                    <select name="serials" id="serials"
                    class="block appearance-none w-full bg-white border border-gray-400
                     hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none 
                     focus:shadow-outline">
                     
                    
                    </select>
                </div>
                        <button type="submit" id="btsearch" class="btn btn-info btn-lg">بحث</button>
                    </div>
                </div> 
    </section>
    

    {{-- opaen model --}}
    <div class="w-full p-6">
        <span class="justify-content-center text-center">
            <i class="material-icons text-3xl">     
                <a id="btn" class="btn btn-info btn-lg">{{__('button.print')}}</a>
            </i>
        </span>
        <table class="table">
            <thead class="text-center">
                <tr>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">{{__('header.serial')}}</th>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">{{__('header.employee')}}</th>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">{{__('tables.rank')}}</th>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">{{__('كود الاستلام ')}}</th>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">{{__('تاريخ الاستلام')}}</th>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">{{__('ملاحظة')}}</th>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">{{__('تاريخ الارجاع')}}</th>
         </tr>
            </thead>
            <tbody id="tbody">

                
            </tbody>
        </table>
        <!-- component -->
    </div>
    
    </section>
</main>




{{-- ajax  --}}

<script type="text/javascript">

    $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    
        $("#btsearch").click(function(e){
    
            e.preventDefault();

            var serials = $("select[name=serials]").val();
        
            var url = '{{ url('/covenant/public/report/SearchSerials') }}';
    
            $.ajax({
               url:url,
               method:'POST',
               datatype: false,
               data:{
                serials:serials, 
             
                    },
               success:function(response){
              
                $('#tbody').html(response);
                  
               },
               error:function(error){
                  console.log(error)
               }
            });
        });
  

    </script>

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
  $.getJSON("/covenant/public/report/"+ $(this).val()+"/getSerial", function(jsonData){
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
  
  
  </script>
    @endsection 
