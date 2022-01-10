<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
  
    <title>{{__('ar.app_name')}}</title>

    {{-- JS --}}
    <script defer src="{{asset('js/app.js') }}"></script>

    {{-- css --}}
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/fontawesome.css') }}" rel="stylesheet">
    <link href="{{ asset('css/brands.css') }}" rel="stylesheet">
    <link href="{{ asset('css/solid.css') }}" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    
    
  
</head>
<body dir="rtl">

<nav>
     <!-- Brand -->
   <div class="navbar">
      <i class='bx bx-menu'></i>
      <div class="logo"><a href="{{route('home')}}">الإتصالات</a></div>
      <div class="nav-links">
        <div class="sidebar-logo">
          <span class="logo-name">{{__('ar.app_name')}}</span>
          <i class='bx bx-x' ></i>
        </div>
        
 
      <!-- Links -->
     <ul class="links">
          @if (auth()->user()->IsAdmin())
           <li><a href="{{route('home')}}">{{__('ar.home')}}</a></li>
           <li>
                <a href="#">{{__('ar.menus_employee')}}</a>
                <i class='bx bxs-chevron-down htmlcss-arrow arrow  '></i>
           <ul class="htmlCss-sub-menu sub-menu">
                <li><a href="{{route('rank_index')}}">{{__('ar.menus_rank')}}</a></li>
                <li><a href="{{route('job_index')}}">{{__('ar.menus_job_title')}}</a></li>
                <li><a href="{{route('employee_index')}}">{{__('ar.menus_employee')}}</a></li>
            </ul>
            </li>
          
            <li>
                <a href="#">{{__('ar.menus_management')}}</a>
                <i class='bx bxs-chevron-down js-arrow arrow '></i>
            <ul class="js-sub-menu sub-menu">
                <li><a href="{{route('regions_index')}}">{{__('ar.menus_regions')}}</a></li>
                <li><a href="{{route('cities_index')}}">{{__('ar.menus_cities')}}</a></li>
                <li><a href="{{route('branch_index')}}">{{__('ar.menus_branch')}}</a></li>
                <li><a href="{{route('department_index')}}">{{__('ar.menus_department')}}</a></li>
            </ul>
            </li>
          
            <li>
               <a href="#">{{__('ar.menus_wireless_manager')}}</a>
               <i class='bx bxs-chevron-down htmlcss-arrow arrow  '></i>
            <ul class="htmlCss-sub-menu sub-menu">
            <li class="more">
               <span><a href="#">{{__('ar.menus_wireless_devices')}}</a>
               <i class='bx bxs-chevron-right arrow more-arrow'></i>
               </span>
                <ul class="more-sub-menu sub-menu">
                <li><a href="{{route('category_index')}}">{{__('ar.menus_categores')}}</a></li>
                <li><a href="{{route('product_index')}}">{{__('ar.menus_wireless_devices')}}</a></li>
                <li><a href="{{route('model_index')}}">{{__('ar.menus_wireless_model')}}</a></li>
                <li><a href="{{route('type_index')}}">{{__('ar.menus_wireless_type')}}</a></li>
                <li><a href="{{route('serial_index')}}">{{__('ar.menus_wireless_serial')}}</a></li>
                <li><a href="{{route('accessory_index')}}">{{__('ar.menus_wireless_accessory')}}</a></li>
                </ul>
            </li>
                <li><a href="{{route('simcard_index')}}">{{__('ar.menus_simcard')}}</a></li>
            <li class="more">
                <span><a href="#">{{__('ar.menus_mobile')}}</a>
                <i class='bx bxs-chevron-right arrow more-arrow'></i>
                </span>
              <ul class="more-sub-menu sub-menu">
                  <li><a href="{{route('DevicePhone_index')}}">{{__('ar.menus_mobile_type')}}</a></li>
                  <li><a href="{{route('phone_index')}}">{{__('ar.menus_mobile')}}</a></li>
              </ul>
            </li>
            </ul>
            </li>
          
            <li>
                <a href="#">{{__('ar.menus_wired')}}</a>
                <i class='bx bxs-chevron-down js-arrow arrow '></i>
            <ul class="js-sub-menu sub-menu">
                <li><a href="{{route('provider_index')}}">{{__('ar.menus_provider')}}</a></li>
                <li><a href="{{route('landline_index')}}">{{__('ar.menus_landline')}}</a></li>
                <li><a href="{{route('DigitalCircuit_index')}}">{{__('ar.menus_circuit')}}</a></li>
                <li><a href="{{route('recording_index')}}">{{__('ar.menus_recorders')}}</a></li>
                <li><a href="{{route('citrate_index')}}">{{__('ar.menus_PABX')}}</a></li>
                <li><a href="{{route('fault_index')}}">{{__('ar.menus_damage')}}</a></li>
            </ul>
            </li>
        
        
            <li>
                <a href="#">{{__('ar.menus_covenant_manag')}}</a>
                <i class='bx bxs-chevron-down htmlcss-arrow arrow  '></i>
            <ul class="htmlCss-sub-menu sub-menu">
            <li class="more">
                <span><a href="#">{{__('ar.menus_wireless_covenant')}}</a>
                <i class='bx bxs-chevron-right arrow more-arrow'></i>
                </span>
                <ul class="more-sub-menu sub-menu">
                  <li><a href="{{route('LandlineCovenant_index')}}">{{__('ar.menus_landline_convenant')}}</a></li>
                  <li><a href="{{route('covenant_index')}}">{{__('ar.menus_wireless_covenant')}}</a></li>
                  <li><a href="{{route('phonecovenant_index')}}">{{__('ar.menus_mobile_covenant')}}</a></li>
                </ul>
            </li>
            <li class="more">
                <span><a href="#">{{__('ar.menus_wired_covenant')}}</a>
                <i class='bx bxs-chevron-right arrow more-arrow'></i>
                </span>
                <ul class="more-sub-menu sub-menu">
                  <li><a href="{{route('covenant_index')}}">{{__('ar.menus_wireless_covenant')}}</a></li>
                  <li><a href="{{route('DigitalCircuitcovenant_index')}}">{{__('ar.menus_digi_ci_covenant')}}</a></li>
                  <li><a href="{{route('return_index')}}">{{__('ar.menus_return_covenant')}}</a></li>
                </ul>
            </li>
            </ul>
            </li> 
          
            <li><a href="{{route('accounts_index')}}">{{__('ar.menus_accounts')}}</a></li>
          
            <li>
                <a href="#">{{__('ar.menus_report')}}</a>
                <i class='bx bxs-chevron-down js-arrow arrow '></i>
            <ul class="js-sub-menu sub-menu">
                <li><a href="{{route('report_convent')}}">{{__('ar.menus_report_wireless')}}</a></li>
                <li><a href="{{route('report_landline')}}">{{__('ar.menus_report_wired')}}</a></li>
                <li><a href="{{route('report_status')}}">{{__('ar.menus_report_general')}}</a></li>
                <li><a href="{{route('report_serial')}}">{{__('ar.menus_report_device')}}</a></li>
                <li><a href="{{route('report_employee')}}">{{__('ar.menus_report_employee')}}</a></li>
            </ul>
            </li>
        
            <li>
                <a href="#"><i class="fas fa-user-circle fa-sm"></i> {{ Auth::user()->name }}</a>
                <i class='bx bxs-chevron-down htmlcss-arrow arrow  '></i>
            <ul class="htmlCss-sub-menu sub-menu">
               <li><a href="{{route('users_index')}}">{{__('ar.menus_users')}}</a></li>
                  <li> <a href="{{ route('logout') }}"
                    class="no-underline hover:underline"
                    onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                 <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                     {{ csrf_field() }}
                 </form>
            </ul>
            </li> 
              
              
    </ul>
    </div>   
    
            <div class="search-box">
            <i class='bx bx-search'></i>
            <div class="input-box">
            <input type="text" placeholder="{{__('ar.search')}}">
            </div>
            </div>
    </div>     
</nav>    
  
 
      
       <div class="w-full sm:px-6">
          @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
          @endif
       </div>
       <br /><br /><br />
          @yield('content')
           
           <br />
           <hr style="width:50%">
           <p style="text-align: center;">{{__('ar.copy_rights')}}</p>
  
    <script defer src="{{asset('js/menu_script.js') }}"></script>
    @endif
</body>
</html>
