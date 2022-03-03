@extends('layouts.app')
<meta name="csrf-token" content="{{ csrf_token() }}" />

@section('content')
<main class="sm:container sm:mx-auto sm:mt-10">

    <section class="flex flex-col break-words bg-white sm:border-1 sm:rounded-md sm:shadow-sm sm:shadow-lg">
        <header class="font-semibold bg-gray-200 text-gray-700 py-5 px-6 sm:py-6 sm:px-8 sm:rounded-t-md">
                
            <div class="justify-content-center text-center">
                <h3>{{__('header.report') }} :{{__('header.report status')}}</h3>
            </div>
                <div  class="inline-block relative w-64">
                    <select name="selectstaute" id="selectstaute"
                    class="block appearance-none w-full bg-white border border-gray-400
                     hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none 
                     focus:shadow-outline">
                     <option> بحث </option>
                     <option value="1"> المتاح</option>
                     <option value="0"> غير المتاح</option>
                    </select>
            </div>
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
                   <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">{{__('tables.serial')}}</th>
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">{{__('tables.product')}}</th>       
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">{{__('tables.model')}}</th>       
                    <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">{{__('tables.type')}}</th>
             </tr>
            </thead>
            <tbody id="tbody">
            @foreach ($serials as $serial)
                
            
                <tr class="bg-white lg:hover:bg-gray-100 flex lg:table-row flex-row lg:flex-row flex-wrap lg:flex-no-wrap mb-10 lg:mb-0">
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                       {{$serial->serial}}
                    </td>
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                       {{$serial->ptype->pmodel->product->name}}
                    </td>
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                       {{$serial->ptype->pmodel->name}}
                    </td>
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                        {{$serial->ptype->name}}
                    </td>
                </tr>
               @endforeach
            </tbody>
        </table>
        <!-- component -->
    </div>
    </section>
</main>


<script type="text/javascript">
    $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    
        $("#selectstaute").click(function(e){
    
            e.preventDefault();

            var status = $("select[name=selectstaute]").val();

            var url = '{{ url('/report/SearchStaute') }}';
    
            $.ajax({
               url:url,
               method:'POST',
               datatype: false,
               data:{
                status:status, 
         
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
