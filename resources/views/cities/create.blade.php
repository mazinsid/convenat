@extends('layouts.app')
<meta name="csrf-token" content="{{ csrf_token() }}" />
@section('content')
<main class="sm:container sm:mx-auto sm:mt-10">
    <div class="w-full sm:px-6">

        @if (session('status'))
            <div class="text-sm border border-t-8 rounded text-green-700 border-green-600 bg-green-100 px-3 py-4 mb-4" role="alert">
                {{ session('status') }}
            </div>
        @endif

     <!-- component -->
<!-- 
    =======================================================================

    This is a working contact form. To receive email, 
    Replace YOUR_ACCESS_KEY_HERE with your actual Access Key.

    Create Access Key here 👉 https://web3forms.com/

    Surjith S M (@surjithctly)
    =======================================================================
 -->


<div class="flex items-center min-h-screen bg-gray-50 dark:bg-gray-900">
    <div class="container mx-auto">
        <div class="max-w-md mx-auto my-10 bg-white p-5 rounded-md shadow-sm">
            <div class="text-center">
                <h1 class="my-3 text-3xl font-semibold text-gray-700 dark:text-gray-200">Contact Us</h1>
                <p class="text-gray-400 dark:text-gray-400">Fill up the form below to send us a message.</p>
            </div>
            <div class="m-7">
             

                    <div class="mb-6">
                        <label for="name" class="block mb-2 text-sm text-gray-600 dark:text-gray-400">Full Name</label>
                        <input type="text" name="name" id="name" placeholder="John Doe" required class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300 dark:bg-gray-700 dark:text-white dark:placeholder-gray-500 dark:border-gray-600 dark:focus:ring-gray-900 dark:focus:border-gray-500" />
                    </div>
                 
                    <div class="mb-6">

                        <label for="phone" class="text-sm text-gray-600 dark:text-gray-400">Phone Number</label>
                        <input type="text" name="phone" id="phone" placeholder="+1 (555) 1234-567" required class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300 dark:bg-gray-700 dark:text-white dark:placeholder-gray-500 dark:border-gray-600 dark:focus:ring-gray-900 dark:focus:border-gray-500" />
                    </div>
                    
                    <div class="mb-6">
                        <label for="location" class="block mb-2 text-sm text-gray-600 dark:text-gray-400">Address</label>
                        <input type="text" name="location" id="location" placeholder="you@company.com" required class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300 dark:bg-gray-700 dark:text-white dark:placeholder-gray-500 dark:border-gray-600 dark:focus:ring-gray-900 dark:focus:border-gray-500" />
                    </div>
                    
                    <div class="mb-6">
                            <label for="regions_id" class="block mb-2 text-sm text-gray-600 dark:text-gray-400">regions_id</label>
                            <input type="text" name="regions_id" id="location" placeholder="you@company.com" required class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300 dark:bg-gray-700 dark:text-white dark:placeholder-gray-500 dark:border-gray-600 dark:focus:ring-gray-900 dark:focus:border-gray-500" />
                        </div>
                    <div class="mb-6">
                        <button type="submit" class=" btn-submit w-full px-3 py-4 text-white bg-indigo-500 rounded-md focus:bg-indigo-600 focus:outline-none">Send Message</button>
                    </div>
                    <p class="text-base text-center text-gray-400" id="result">
                    </p>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">

$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


    $(".btn-submit").click(function(e){

        e.preventDefault();

        var namef = $("input[name=name]").val();
        var phone = $("input[name=phone]").val();
        var location = $("input[name=location]").val();
        var regions_id = $("input[name=regions_id]").val();
        var url = '{{ url('/covenant/public/cities/store') }}';

        $.ajax({
           url:url,
           method:'POST',
           data:{
                 namen:namef, 
                phone:phone, 
                location:location, 
                regions_id:regions_id
                },
           success:function(response){
              if(response.success){
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

</script>
    </div>
</main>
@endsection
