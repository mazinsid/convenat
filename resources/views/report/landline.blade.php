@extends('layouts.app')
<meta name="csrf-token" content="{{ csrf_token() }}" />
@section('content')
<main class="sm:container sm:mx-auto sm:mt-10">


    <section class="flex flex-col break-words bg-white sm:border-1 sm:rounded-md sm:shadow-sm sm:shadow-lg">

        <header class="font-semibold bg-gray-200 text-gray-700 py-5 px-6 sm:py-6 sm:px-8 sm:rounded-t-md">
                
            <div class="justify-content-center text-center">
                <h3>{{__('header.report') }} :{{__('header.landline convenant')}}</h3>
            </div>   
             <div class="bg-white shadow p-4 flex">

                   <div class="bg-white shadow p-4 flex">
                            من     <input type="date" name="start">
                            الي     <input type="date" name="end">
                            <button type="submit" id="btsearch" class="btn btn-info btn-lg">بحث</button>
                        </div>

                </header>
            

           
    {{-- opaen model --}}
    <span class="justify-content-center text-center">
        <i class="material-icons text-3xl">     
            <a id="btn" class="btn btn-info btn-lg">{{__('button.print')}}</a>
        </i>
    </span>
    <table class="table">
        <thead class="text-center">
                <tr>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">{{__('tables.branch')}}</th>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">{{__('header.landline')}}</th>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">{{__('tables.acceptance')}}</th>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">{{__('tables.note')}}</th>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">{{__('tables.code')}}</th>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">{{__('button.detelis')}}</th>
            </tr>
            </thead>
            <tbody id="tbody">
            @foreach ($landlineconvenants as $landlineconvenant)
                
            
                <tr class="bg-white lg:hover:bg-gray-100 flex lg:table-row flex-row lg:flex-row flex-wrap lg:flex-no-wrap mb-10 lg:mb-0">
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                        {{$landlineconvenant->branch->name}}
                 
                   </td>

                  <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                       {{$landlineconvenant->landline->serial}}
                        </td>
    
                        <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                           {{$landlineconvenant->acceptance_date}}
                            </td>
                     
                            <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                               {{$landlineconvenant->note}}
                                </td>

                        <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                           {{$landlineconvenant->code_number}}
                            </td>

                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                        <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Actions</span>
                        <a href="#" onclick="document.getElementById('myModal{{$landlineconvenant->id}}').showModal()" id="btn" class="py-3 px-10 bg-gray-800 text-white rounded text shadow-xl">{{__('button.detelis')}}</a>
                    </td>
           
                </tr>
               @endforeach
            </tbody>
        </table>
        <!-- component -->
    </div>
    </section>
</main>
{{-- edit-modal --}}
@foreach ($landlineconvenants as $landlineconvenant)
<dialog id="myModal{{$landlineconvenant->id}}" class="h-auto w-11/12 md:w-1/2 p-5  bg-white rounded-md ">
        
    <div class="flex flex-col w-full h-auto ">
         <!-- Header -->
         <div class="flex w-full h-auto justify-center items-center">
           <div class="flex w-10/12 h-auto py-3 justify-center items-center text-2xl font-bold">
     
           </div>
           <div onclick="document.getElementById('myModal{{$landlineconvenant->id}}').close();" class="flex w-1/12 h-auto justify-center cursor-pointer">
                 <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
           </div>
           <!--Header End-->
         </div>
           <!-- Modal Content-->
            <div class="flex w-full h-auto py-10 px-2 justify-center items-center bg-gray-200 rounded text-center text-gray-500">
                <table class="border-collapse w-full">
                    <thead>
                        <tr>
                            <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">{{__('tables.type')}}</th>
                            <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">{{__('tables.serial')}}</th>
                            <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">{{__('tables.cable number')}}</th>
                            <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">{{__('tables.circle number')}}</th>
                            <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">{{__('tables.circle type')}}</th>
                            <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">{{__('tables.circle speed')}}</th>
                            <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">{{__('header.provider')}}</th>
                            <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">{{__('tables.expiry')}}</th>
                      </tr>
                    </thead>
                    <tbody>
                   
                    
                        <tr class="bg-white lg:hover:bg-gray-100 flex lg:table-row flex-row lg:flex-row flex-wrap lg:flex-no-wrap mb-10 lg:mb-0">
                            <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                                {{$landlineconvenant->landline->land_type}}
                           </td>
                          <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                               {{$landlineconvenant->landline->serial}}
                         </td>
                          <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                           {{$landlineconvenant->landline->cab_number}}
                        </td>
                        <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                           {{$landlineconvenant->landline->circle_number}}
                                </td>
        
                                <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                                   {{$landlineconvenant->landline->circuit_type}}
                                    </td>
        
                                <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                                   {{$landlineconvenant->landline->circuit_speed}}
                                    </td>
                                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                                       {{$landlineconvenant->landline->provider->name}}
                                        </td>
                                        <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                                           {{$landlineconvenant->landline->landline_expiry_date}}
                                    </td>
 
                        </tr>
     
                    </tbody>
                </table>
           </div>
           <!-- End of Modal Content-->
           
           
           
         </div>
 </dialog>

 @endforeach

{{-- ajax  --}}
<script type="text/javascript">

    $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    
        $("#btsearch").click(function(e){
    
            e.preventDefault();

            var start = $("input[name=start]").val();
            var end = $("input[name=end]").val();
            var url = '{{ url('/covenant/public/report/SearchLandlineDate') }}';
    
            $.ajax({
               url:url,
               method:'POST',
               datatype: false,
               data:{
                start:start, 
                end:end, 
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
@endsection
