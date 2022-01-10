@extends('layouts.app')
<meta name="csrf-token" content="{{ csrf_token() }}" />
@section('content')
<main class="sm:container sm:mx-auto sm:mt-10">

  
    <section class="flex flex-col break-words bg-white sm:border-1 sm:rounded-md sm:shadow-sm sm:shadow-lg">

               
        <div class="justify-content-center text-center">
            <h3>{{__('header.report') }} :{{__('header.report employee')}}</h3>
         
        
        <div class="bg-white shadow p-4 flex">

                        <div class=" w-64">
                            <select name="regionsinsert" id="regions"
                            class="block appearance-none w-full bg-white border border-gray-400
                             hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none 
                             focus:shadow-outline">
                              <option>أختار {{__('tables.regions')}}</option>
                              @foreach ($regions as $region )
                              <option value="{{$region->id}}">{{$region->name}}</option>
                              @endforeach
                            </select>
                        </div>
                            <div class=" w-64">
                                    <select name="citiesinsert" id="cities"
                                    class="block appearance-none w-full bg-white border border-gray-400
                                     hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none 
                                     focus:shadow-outline">
                                   

                                    </select>
                        </div>
                            <div id="branchesload" class="w-64">
                                    <select name="branch_id" id="Branches"
                                    class="block appearance-none w-full bg-white border border-gray-400
                                     hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none 
                                     focus:shadow-outline">
                                   

                                    </select>
                            </div>
                            <div id="employeeload" class="w-64">
                                <select name="employees" id="employees"
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
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">{{__('tables.type')}}</th>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">{{__('كود الاستلام ')}}</th>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">{{__('تاريخ الاستلام')}}</th>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">{{__('ملاحظة')}}</th>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">{{__('تاريخ الارجاع')}}</th>  </tr>
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

            var employees = $("select[name=employees]").val();
        
            var url = '{{ url('/covenant/public/report/SearchEmployees') }}';
    
            $.ajax({
               url:url,
               method:'POST',
               datatype: false,
               data:{
                employees:employees, 
             
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
  
    @endsection 
