@foreach ($covenants as $covenant)
                
            
<tr class="bg-white lg:hover:bg-gray-100 flex lg:table-row flex-row lg:flex-row flex-wrap lg:flex-no-wrap mb-10 lg:mb-0">
    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
        <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase"> name</span>
       {{$covenant->employee->name}}
    </td>
    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
        <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase"> name</span>
       {{$covenant->employee->rank->name}}
    </td>
    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
        <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase"> name</span>
       {{$covenant->ptype->name}}
    </td>
    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
        <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase"> name</span>
       {{$covenant->serial->serial}}
    </td>
    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
        <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase"> name</span>
       {{$covenant->acceptance}}
    </td>
    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
        <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase"> name</span>
       {{$covenant->code_number}}
    </td>
    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
            <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase"> name</span>
           {{$covenant->note}}
        </td>
        <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Actions</span>
                <a  href="{{route('CovenantAccessory' ,$covenant->id)}} " id="btn" class="py-3 px-10 bg-gray-800 text-white rounded text shadow-xl">{{__('button.accessory')}}</a>
            </td>
    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
        <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Actions</span>
        <a  onclick="document.getElementById('myModal{{$covenant->id}}').showModal()" id="btn" class="py-3 px-10 bg-gray-800 text-white rounded text shadow-xl">{{__('button.edit')}}</a>
    </td>
    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
  
            <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Actions</span>
 
        <form action="{{route('covenant_destroy',$covenant->id)}}" method="post">
                @csrf
                @method('DELETE')
                <button  class="py-3 px-10 bg-red-800 text-white rounded text shadow-xl" onclick="return confirm('هل انت متاكد من الحذف')">حذف نهاي</button>
            </form>
    </td>
</tr>
@endforeach