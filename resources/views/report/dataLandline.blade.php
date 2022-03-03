
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
