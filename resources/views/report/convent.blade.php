@extends('layouts.app')
<meta name="csrf-token" content="{{ csrf_token() }}" />
@section('content')
<main class="sm:container sm:mx-auto sm:mt-10">

    <section class="flex flex-col break-words bg-white sm:border-1 sm:rounded-md sm:shadow-sm sm:shadow-lg" >

            <header class="font-semibold bg-gray-200 text-gray-700 py-5 px-6 sm:py-6 sm:px-8 sm:rounded-t-md" style=" direction: rtl;">
                    
                <div class="justify-content-center text-center">
                    <h3>{{__('ar.report') }}</h3>
                </div>
                <div class="bg-white shadow p-4 flex" style=" direction: rtl;">
                        {{__('ar.from') }}     <input type="date" name="start">
                        {{__('ar.to') }}     <input type="date" name="end">
                        <button type="submit" id="btsearch" class="btn btn-lg">{{__('ar.search') }}</button>
                    </div>

                </header>

    {{-- opaen model --}}
    <span class="justify-content-center text-center">
        <i class="material-icons text-3xl">     
            <a id="btn" class="btn btn-info btn-lg">{{__('ar.print')}}</a>
        </i>
    </span>
    
    <div>
      <p><font size="3" color="red"> 
    
    
    <table class="table">
        <thead class="text-center">
            <thead>
                <tr>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">{{__('ar.officer')}}</th>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">{{__('ar.menus_rank')}}</th>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">{{__('ar.type')}}</th>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">{{__('ar.serial')}}</th>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">{{__('ar.acceptance')}}</th>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">{{__('ar.report_code')}}</th>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">{{__('ar.note')}}</th>
         </tr>
            </thead>
            <tbody id="tbody">

                
            @foreach ($covenants as $covenant)
                
            
                <tr class="bg-white lg:hover:bg-gray-100 flex lg:table-row flex-row lg:flex-row flex-wrap lg:flex-no-wrap mb-10 lg:mb-0">
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                       {{$covenant->employee->name}}
                    </td>
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                        <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase"> </span>
                       {{$covenant->employee->rank->name}}
                    </td>
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                    {{$covenant->ptype->name}}
                    </td>
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                     {{--  {{$covenant->serial->serial}} --}}
                    </td>
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                       {{$covenant->acceptance}}
                    </td>
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                       {{$covenant->code_number}}
                    </td>
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                           {{$covenant->note}}
                    </td>
                   
                </tr>
               @endforeach
              
            </tbody>
          </font>  </p>
    </div>
        </table>
        <!-- component -->
    </div>
    
    </section>





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
            var url = '{{ url('/covenant/public/report/SearchConventDate') }}';
    
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
  

var doc = new jsPDF();          
var elementHandler = {
  '#ignorePDF': function (element, renderer) {
    return true;
  }
};
var source = window.document.getElementsByTagName("body")[0];
doc.fromHTML(
    source,
    15,
    15,
    {
      'width': 180,'elementHandlers': elementHandler
    });

doc.output("dataurlnewwindow");

    </script>

    </main>
    @endsection 
