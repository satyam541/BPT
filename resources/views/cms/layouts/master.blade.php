<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="token" content="{{ csrf_token() }}">
  <title>CMS | Best Practice Training</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/css/bootstrap-select.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
  <link rel="stylesheet" href="{{url('adminlte/plugins/fontawesome-free/css/all.min.css')}}">
  <link rel="stylesheet" href="{{url('adminlte/cms/tabs/tab.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="{{url('adminlte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{url('adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{url('adminlte/plugins/jqvmap/jqvmap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{url('adminlte/dist/css/adminlte.min.css')}}">
  <link rel="stylesheet" href="{{url('adminlte/dist/css/select2.min.css')}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{url('adminlte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <!-- Date Picker -->
  <link rel="stylesheet" href="{{ url('adminlte/bootstrap-datepicker.min.css')}}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{url('adminlte/plugins/daterangepicker/daterangepicker.css')}}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{url('adminlte/plugins/summernote/summernote-bs4.min.css')}}">
  {{-- Toastr css  --}}
  <link rel="stylesheet" href="{{url('adminlte/plugins/toastr/toastr.min.css')}}">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="{{url('adminlte/plugins/sweetalert2/sweetalert2.min.css')}}">
  <link href="{{url('adminlte/bootstrap-toggle-master/css/bootstrap-toggle.min.css')}}" rel="stylesheet">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="{{url('adminlte/DataTables/datatables.min.css')}}"/>
   <link rel="stylesheet" href="{{ url('adminlte/plugins/select2/css/select2.min.css')}}"/>

   @yield('headerLinks')
</head>
<style>
  .select2-container--default .select2-selection--single .select2-selection__rendered{
  line-height: 19px;
}
</style>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
     <!-- Left navbar links -->
     <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
    <!-- Left navbar links -->

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <div class="image">
            <img src="{{url('adminlte/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2 mr-1" alt="User Image" width="30">
            {{Auth()->User()->name}}
          </div>
         
          
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">{{Auth()->User()->email}}</span>
          <div class="dropdown-divider"></div>
          <a href="{{route('changePassword')}}" class="dropdown-item">
            <i class="fas fa-key mr-2"></i> Change Password
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-user mr-2"></i> Update Profile
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="fas fa-sign-out-alt mr-2"></i> Logout
          </a>

          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
          </form>
        
            
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer"></a>
        </div>
      </li>

    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{url('adminlte/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Best Practice Training</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-header">CMS By Country</li>
          <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
              {{-- <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search"> --}}

              {{ Form::select('country_id', allCountries(), country()->country_code, ['tabindex' => '-1', 'class' => 'form-control selectJS' ,'id'=>'country', 'placeholder' => 'Choose one']) }}
              
            </div>
          </div>
          
          <li class="nav-header">Admin Resources</li>
          <li class="nav-item has-treeview menu-open">
            <a href="{{Route('dashboard')}}" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          @if (Auth::user()->can('view', new App\User()) || Auth::user()->can('view', new App\Models\Role()) || Auth::user()->can('view', new App\Models\Permission()))

          <li @if(in_array(Route::currentRouteName(),['userList','roleList','permissionList']))
          class="nav-item has-treeview menu-open"
          @else
          class="nav-item has-treeview"
          @endif>
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                User Management
                <i class="fas fa-angle-left right"></i>
                {{-- <span class="badge badge-info right">6</span> --}}
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
              @can('view',new App\User())
                <a href="{{Route('userList')}}" @if(Route::currentRouteName()=='userList')class="nav-link active" @else class="nav-link" @endif>
                  <i class="far fa-circle nav-icon text-danger"></i>
                  <p>User</p>
                </a>
              @endcan
              </li>
              <li class="nav-item">
              @can('view',new App\Models\Role())
                <a href="{{Route('roleList')}}" @if(Route::currentRouteName()=='roleList')class="nav-link active" @else class="nav-link" @endif>
                  <i class="far fa-circle nav-icon text-warning"></i>
                  <p>Role</p>
                </a>
                @endcan
              </li>
              <li class="nav-item">
              @can('view',new App\Models\Permission())
                <a href="{{Route('permissionList')}}" @if(Route::currentRouteName()=='permissionList')class="nav-link active" @else class="nav-link" @endif>
                  <i class="far fa-circle nav-icon text-success"></i>
                  <p>Permission</p>
                </a>
              @endcan
              </li>
            </ul>
          </li>
          @endif
         
          <li class="nav-header">General Resources</li>
          @if (Auth::user()->can('view', new App\Models\Country())|| Auth::user()->can('view', new App\Models\Course()) 
          || Auth::user()->can('view', new App\Models\Location()) || Auth::user()->can('view', new App\Models\Topic()))      
          <li @if(in_array(Route::currentRouteName(),['unlinkTopic','unlinkCourse']))
          class="nav-item has-treeview menu-open"
          @else
          class="nav-item has-treeview"
          @endif>
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-unlink"></i>
              <p>
                Unlinked Data
                <i class="fas fa-angle-left right"></i>
                @if (unlinkedTopic()>0 || unlinkedCourse() > 0)
                <span class="right badge badge-danger">New</span>
                @endif
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
              @can('view',new App\Models\Topic())
                <a href="{{Route('unlinkTopic')}}"@if(Route::currentRouteName()=='unlinkTopic')class="nav-link active" @else class="nav-link" @endif >
                  <i class="far fa-circle nav-icon "></i>
                  <p>Topics
                    @if (unlinkedTopic()>0)
                    <span class="right badge" style="background-color:rgb(212, 11, 11) !important">{{unlinkedTopic()}}</span>
                    @endif
                  </p>
                </a>
                @endcan
              </li>
              <li class="nav-item">
              @can('view',new App\Models\Course())
                <a href="{{Route('unlinkCourse')}}"@if(Route::currentRouteName()=='unlinkCourse')class="nav-link active" @else class="nav-link" @endif>
                  <i class="far fa-circle nav-icon "></i>
                  <p>Courses
                    @if (unlinkedCourse()>0)
                    <span class="right badge badge-danger" style="background-color: rgb(212, 11, 11) !important">{{unlinkedCourse()}}</span>
                    @endif
                  </p>
                </a>
                @endcan
              </li>
            </ul>
          </li>
          @endif
        @if (Auth::user()->can('view', new App\Models\Course())  || Auth::user()->can('view', new App\Models\Category()) || Auth::user()->can('view', new App\Models\Topic())  || Auth::user()->can('view', new App\Models\Topic())  || Auth::user()->can('view', new App\Models\Accreditation()))
          <li @if(in_array(Route::currentRouteName(),['AddonList','categoryList','topicList','courseList','onlinecourseList','whatsincludedListRoute','accreditationList']))
          class="nav-item has-treeview menu-open"
          @else
          class="nav-item has-treeview"
          @endif>
           
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Courses
                <i class="fas fa-angle-left right"></i>
                {{-- <span class="badge badge-info right">6</span> --}}
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                @can('view',new App\Models\Category())
                <a href="{{Route('categoryList')}}" @if(Route::currentRouteName()=='categoryList')class="nav-link active" @else class="nav-link" @endif>
                  <i class="far fa-circle nav-icon text-danger"></i>
                  <p>Category</p>
                </a>
                @endcan
              </li>
              <li class="nav-item">
                @can('view',new App\Models\Topic())
                <a href="{{Route('topicList')}}" @if(Route::currentRouteName()=='topicList')class="nav-link active" @else class="nav-link" @endif">
                  <i class="far fa-circle nav-icon text-warning"></i>
                  <p>Topic</p>
                </a>
                @endcan
              </li>
              <li class="nav-item">
                @can('view',new App\Models\Course())
                <a href="{{Route('courseList')}}" @if(Route::currentRouteName()=='courseList')class="nav-link active" @else class="nav-link" @endif>
                  <i class="far fa-circle nav-icon text-success"></i>
                  <p>Course</p>
                </a>
                @endcan
              </li>
              <li class="nav-item">
                @can('view', new App\Models\course())
                <a href="{{Route('onlinecourseList')}}" @if(Route::currentRouteName()=='onlinecourseList')class="nav-link active" @else class="nav-link" @endif>
                  <i class="far fa-circle nav-icon text-primary"></i>
                  <p>Online Course</p>
                </a>
                @endcan
              </li>
              <li class="nav-item">
                <a href="{{Route('whatsincludedListRoute')}}" @if(Route::currentRouteName()=='whatsincludedListRoute')class="nav-link active" @else class="nav-link" @endif>
                  <i class="far fa-circle nav-icon"></i>
                  <p>Whats Included</p>
                </a>
              </li>
              <li class="nav-item">
                @can('view',new App\Models\course())
                <a href="{{Route('AddonList')}}" @if(Route::currentRouteName()=='AddonList')class="nav-link active" @else class="nav-link" @endif>
                  <i class="far fa-circle nav-icon"></i>
                  <p>Course Addon</p>
                </a>
                @endcan
              </li>
              <li class="nav-item">
                @can('view',new App\Models\Accreditation())
                <a href="{{Route('accreditationList')}}" @if(Route::currentRouteName()=='accreditationList')class="nav-link active" @else class="nav-link" @endif>
                  <i class="far fa-circle nav-icon"></i>
                  <p>Accreditation</p>
                </a>
                @endcan
              </li>
            </ul>
          </li>
          @endif
           @if (Auth::user()->can('view', new App\Models\Country()) || Auth::user()->can('view', new App\Models\Category()))
          <li @if(in_array(Route::currentRouteName(),['certificationList','certificationCourseList']))
          class="nav-item has-treeview menu-open"
          @else
          class="nav-item has-treeview"
          @endif>
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-certificate"></i>
              <p>
                Certifications
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                @can('view',new App\Models\Category())
                <a href="{{Route('certificationList')}}"@if(Route::currentRouteName()=='certificationList')class="nav-link active" @else class="nav-link" @endif >
                  <i class="far fa-circle nav-icon "></i>
                  <p>
                    Category    
                  </p>
                </a>
                @endcan
              </li>
              <li class="nav-item">
                @can('view',new App\Models\Course())
                <a href="{{Route('certificationCourseList')}}"@if(Route::currentRouteName()=='certificationCourseList')class="nav-link active" @else class="nav-link" @endif>
                  <i class="far fa-circle nav-icon "></i>
                  <p>
                    Courses
                  </p>
                </a>
                @endcan
              </li>
            </ul>
          </li>
          @endif
           @if (Auth::user()->can('view', new App\Models\Country()) || Auth::user()->can('view', new App\Models\Location()) || Auth::user()->can('view', new App\Models\Venue()))      
          <li
           @if(in_array(Route::currentRouteName(),['countryList','locationList','venueList']))
          class="nav-item has-treeview menu-open"
          @else
          class="nav-item has-treeview"
          @endif
          >
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-map-marker-alt"></i>
              <p>
                Venues
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              @can('view',new App\Models\country())
              <li class="nav-item">
                <a href="{{Route('countryList')}}" @if(Route::currentRouteName()=='countryList')class="nav-link active" @else class="nav-link" @endif>
                  <i class="nav-icon far fa-circle text-danger"></i>
                  <p>Country</p>
                </a>
              </li>
              @endcan
              <li class="nav-item">
                @can('view',new App\Models\location())
                <a href="{{Route('locationList')}}" @if(Route::currentRouteName()=='locationList')class="nav-link active" @else class="nav-link" @endif>
                  <i class="nav-icon far fa-circle text-warning"></i>
                  <p>Location</p>
                </a>
                @endcan
              </li>
            </ul>
          </li>
          @endif
         @if(Auth::user()->can('view', new App\Models\Schedule()))     
          <li @if(in_array(Route::currentRouteName(),['scheduleList','getSchedule','manualScheduleList','manageCoursePrice','onlinePriceList']))
          class="nav-item has-treeview menu-open"
          @else
          class="nav-item has-treeview"
          @endif>
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-calendar-alt"></i>
              <p>
                Schedule
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                @can('view',new App\Models\schedule())
                <a href="{{Route('scheduleList')}}" @if(Route::currentRouteName()=='scheduleList')class="nav-link active" @else class="nav-link" @endif>
                  <i class="nav-icon far fa-circle text-danger"></i>
                  <p>Schedule List</p>
                </a>
                @endcan
              </li>
              <li class="nav-item">
                @can('view',new App\Models\Schedule())
                <a href="{{Route('getSchedule')}}" @if(Route::currentRouteName()=='getSchedule')class="nav-link active" @else class="nav-link" @endif>
                  <i class="nav-icon far fa-circle text-warning"></i>
                  <p>Fetch Schedule</p>
                </a>
                @endcan
              </li>
              <li class="nav-item">
                @can('create',new App\Models\Schedule())
                <a href="{{Route('createSchedule')}}" class="nav-link">
                  <i class="nav-icon far fa-circle text-success"></i>
                  <p>Add Schedule</p>
                </a>
                @endcan
              </li>
              <li class="nav-item">
                @can('view',new App\Models\Schedule())
                <a href="{{Route('manualScheduleList')}}" @if(Route::currentRouteName()=='manualScheduleList')class="nav-link active" @else class="nav-link" @endif>
                  <i class="nav-icon far fa-circle text-primary"></i>
                  <p>Manual Schedule List</p>
                </a>
                @endcan
              </li>
              <li class="nav-item">
                @can('view',new App\Models\Schedule())
                <a href="{{Route('manageCoursePrice')}}" @if(Route::currentRouteName()=='manageCoursePrice')class="nav-link active" @else class="nav-link" @endif>
                  <i class="nav-icon far fa-circle text-success"></i>
                  <p>Manage Price</p>
                </a>
                @endcan
              </li>
              <li class="nav-item">
                @can('view',new App\Models\schedule())
                <a href="{{Route('onlinePriceList')}}" @if(Route::currentRouteName()=='onlinePriceList')class="nav-link active" @else class="nav-link" @endif>
                  <i class="nav-icon far fa-circle text-"></i>
                  <p>Online Prices</p>
                </a>
                @endcan
              </li>
            </ul>
          </li>
          @endif
          @if (Auth::user()->can('view', new App\Models\Course()) || Auth::user()->can('view', new App\Models\Category()) ||  Auth::user()->can('view', new App\Models\Topic()) || Auth::user()->can('view', new App\Models\Location()))
          <li @if(in_array(Route::currentRouteName(),['popularItems']))
          class="nav-item has-treeview menu-open"
          @else
          class="nav-item has-treeview"
          @endif>
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-fire"></i>
              <p>
                Popular
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{Route('popularItems')}}" @if(Route::currentRouteName()=='popularItems')class="nav-link active" @else class="nav-link" @endif>
                  <i class="nav-icon far fa-circle text-danger"></i>
                  <p>List All</p>
                </a>
              </li>
            </ul>
          </li>
          @endcan
          @if(Auth::user()->can('view', App\Models\Article::firstOrNew(['type'=>'news'])) || Auth::user()->can('view', App\Models\Article::firstOrNew(['type'=>'blog'])) || Auth::user()->can('view', new App\Models\Testimonial()))
          <li @if(in_array(Route::currentRouteName(),['newsList','blogList','tagList','testimonialList']))
          class="nav-item has-treeview menu-open"
          @else
          class="nav-item has-treeview"
          @endif>
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-newspaper"></i>
              <p>
                Article
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              {{-- <li class="nav-item">
              @can('view', new App\Models\Article())
                <a href="{{Route('newsList')}}" @if(Route::currentRouteName()=='newsList')class="nav-link active" @else class="nav-link" @endif>
                  <i class="nav-icon far fa-circle text-danger"></i>
                  <p>News List</p>
                </a>
                @endcan
              </li> --}}
              <li class="nav-item">
              @can('view', new App\Models\Article())
                <a href="{{Route('blogList')}}" @if(Route::currentRouteName()=='blogList')class="nav-link active" @else class="nav-link" @endif>
                  <i class="nav-icon far fa-circle text-warning"></i>
                  <p>Blog List</p>
                </a>
                @endcan
              </li>
              <li class="nav-item">
              @can('view', new App\Models\Testimonial())
                <a href="{{Route('testimonialList')}}" @if(Route::currentRouteName()=='testimonialList')class="nav-link active" @else class="nav-link" @endif>
                  <i class="nav-icon far fa-circle text-primary"></i>
                  <p>Testimonials</p>
                </a>
                @endcan
              </li>
            </ul>
          </li>
          @endif
          @if(Auth::user()->can('view', new App\Models\WebsiteDetail())  || Auth::user()->can('view', new App\Models\SocialMedia()) || Auth::user()->can('view', new App\Models\UrlRedirect()) )
          <li @if(in_array(Route::currentRouteName(),['websiteDashboard','websiteDetailList','urlRedirectList','socialmediaList']))
          class="nav-item has-treeview menu-open"
          @else
          class="nav-item has-treeview"
          @endif>
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-globe"></i>
              <p>
                Website
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
              @can('view', new App\Models\WebsiteDetail())
                <a href="{{Route('websiteDashboard')}}" @if(Route::currentRouteName()=='websiteDashboard')class="nav-link active" @else class="nav-link" @endif>
                  <i class="nav-icon far fa-circle text-danger"></i>
                  <p>Webiste Dashboard</p>
                </a>
                @endcan
              </li>
              <li class="nav-item">
              @can('view', new App\Models\WebsiteDetail())
                <a href="{{Route('websiteDetailList')}}" @if(Route::currentRouteName()=='websiteDetailList')class="nav-link active" @else class="nav-link" @endif>
                  <i class="nav-icon far fa-circle text-warning"></i>
                  <p>Website Detail List</p>
                </a>
                @endcan
              </li>
              <li class="nav-item">
              @can('view', new App\Models\UrlRedirect())
                <a href="{{Route('urlRedirectList')}}" @if(Route::currentRouteName()=='urlRedirectList')class="nav-link active" @else class="nav-link" @endif>
                  <i class="nav-icon far fa-circle text-success"></i>
                  <p>URL Redirect</p>
                </a>
                @endcan
              </li>
              <li class="nav-item">
              @can('view', new App\Models\SocialMedia())
                <a href="{{Route('socialmediaList')}}" @if(Route::currentRouteName()=='socialmediaList')class="nav-link active" @else class="nav-link" @endif>
                  <i class="nav-icon far fa-circle text-primary"></i>
                  <p>Social Media List</p>
                </a>
                @endcan
              </li>
            </ul>
          </li>
          @endif
          @if(Auth::user()->can('restore', new App\Models\Course()) || Auth::user()->can('restore', new App\Models\Resource()) || Auth::user()->can('restore', new App\Models\Country()) || Auth::user()->can('restore', new App\Models\Location()) || Auth::user()->can('restore', new App\Models\Category()) || Auth::user()->can('restore', new App\Models\Topic()) || Auth::user()->can('restore', new App\Models\Article()) || Auth::user()->can('restore', new App\Models\Testimonial()) || Auth::user()->can('restore', new App\Models\Accreditation()) || Auth::user()->can('restore', new App\Models\WebsiteDetail()))
          <li @if(in_array(Route::currentRouteName(),['websiteDetailTrashList','certificationTrashList','WhatsIncludedTrashList','accreditationTrashList','testimonialTrashList','articleTrashList','tagTrashList','resourceTrash','countryTrashList','venueTrashList','locationTrashList','categoryTrashList','topicTrashList','courseTrashList','onlineCourseTrash']))
          class="nav-item has-treeview menu-open"
          @else
          class="nav-item has-treeview"
          @endif>
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-trash" style="color: red"></i>
              <p>
                Trash
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
              @can('view', new App\Models\Country())
                <a href="{{Route('countryTrashList')}}" @if(Route::currentRouteName()=='countryTrashList')class="nav-link active" @else class="nav-link" @endif>
                  <i class="nav-icon far fa-circle "></i>
                  <p>Country List</p>
                </a>
                @endcan
              </li>
              {{-- <li class="nav-item">
              @can('view', new App\Models\Venue())
                <a href="{{Route('venueTrashList')}}" @if(Route::currentRouteName()=='venueTrashList')class="nav-link active" @else class="nav-link" @endif>
                  <i class="nav-icon far fa-circle "></i>
                  <p>Venue List</p>
                </a>
                @endcan
              </li> --}}
              <li class="nav-item">
              @can('view', new App\Models\Location())
                <a href="{{Route('locationTrashList')}}" @if(Route::currentRouteName()=='locationTrashList')class="nav-link active" @else class="nav-link" @endif>
                  <i class="nav-icon far fa-circle "></i>
                  <p>Location List</p>
                </a>
                @endcan
              </li>
              <li class="nav-item">
                <a href="{{Route('certificationTrashList')}}" @if(Route::currentRouteName()=='certificationTrashList')class="nav-link active" @else class="nav-link" @endif>
                  <i class="nav-icon far fa-circle "></i>
                  <p>Certification List</p>
                </a>
              </li>
              <li class="nav-item">
              @can('view', new App\Models\Category())
                <a href="{{Route('categoryTrashList')}}" @if(Route::currentRouteName()=='categoryTrashList')class="nav-link active" @else class="nav-link" @endif>
                  <i class="nav-icon far fa-circle "></i>
                  <p>Category List</p>
                </a>
                @endcan
              </li>
              <li class="nav-item">
              @can('view', new App\Models\Topic())
                <a href="{{Route('topicTrashList')}}" @if(Route::currentRouteName()=='topicTrashList')class="nav-link active" @else class="nav-link" @endif>
                  <i class="nav-icon far fa-circle "></i>
                  <p>Topic List</p>
                </a>
                @endcan
              </li>
              <li class="nav-item">
              @can('view', new App\Models\Course())
                <a href="{{Route('courseTrashList')}}" @if(Route::currentRouteName()=='courseTrashList')class="nav-link active" @else class="nav-link" @endif>
                  <i class="nav-icon far fa-circle "></i>
                  <p>Course List</p>
                </a>
                @endcan
              </li>
              <li class="nav-item">
               @can('view', new App\Models\Resource())
                <a href="{{Route('resourceTrash')}}" @if(Route::currentRouteName()=='resourceTrash')class="nav-link active" @else class="nav-link" @endif>
                  <i class="nav-icon far fa-circle "></i>
                  <p>Resource List</p>
                </a>
                @endcan
              </li>
              {{-- <li class="nav-item">
                <a href="{{Route('tagTrashList')}}" @if(Route::currentRouteName()=='tagTrashList')class="nav-link active" @else class="nav-link" @endif>
                  <i class="nav-icon far fa-circle "></i>
                  <p>Tag List</p>
                </a>
              </li> --}}
              <li class="nav-item">
              @can('view', new App\Models\Article())
                <a href="{{Route('articleTrashList')}}" @if(Route::currentRouteName()=='articleTrashList')class="nav-link active" @else class="nav-link" @endif>
                  <i class="nav-icon far fa-circle "></i>
                  <p>Article List</p>
                </a>
                @endcan
              </li>
              <li class="nav-item">
              @can('view', new App\Models\Testimonial())
                <a href="{{Route('testimonialTrashList')}}" @if(Route::currentRouteName()=='testimonialTrashList')class="nav-link active" @else class="nav-link" @endif>
                  <i class="nav-icon far fa-circle "></i>
                  <p>Testimonial List</p>
                </a>
                @endcan
              </li>
              <li class="nav-item">
                <a href="{{Route('WhatsIncludedTrashList')}}" @if(Route::currentRouteName()=='WhatsIncludedTrashList')class="nav-link active" @else class="nav-link" @endif>
                  <i class="nav-icon far fa-circle "></i>
                  <p>Whats Included List</p>
                </a>
              </li>
              <li class="nav-item">
                @can('view', new App\Models\Accreditation())
                <a href="{{Route('accreditationTrashList')}}" @if(Route::currentRouteName()=='accreditationTrashList')class="nav-link active" @else class="nav-link" @endif>
                  <i class="nav-icon far fa-circle "></i>
                  <p>Accreditation List</p>
                </a>
                @endcan
              </li>
              <li class="nav-item">
              @can('view', new App\Models\WebsiteDetail())
                <a href="{{Route('websiteDetailTrashList')}}" @if(Route::currentRouteName()=='websiteDetailTrashList')class="nav-link active" @else class="nav-link" @endif>
                  <i class="nav-icon far fa-circle "></i>
                  <p>Website Detail List</p>
                </a>
                @endcan
              </li>

            </ul>
          </li>
          @endif
          <li class="nav-header">Extra Resource</li>
          <li class="nav-item">
           @can('view', new App\Models\PageDetail())
            <a href="{{Route('pageDetailList')}}" @if(Route::currentRouteName()=='pageDetailList')class="nav-link active" @else class="nav-link" @endif>
              <i class="nav-icon far fa-circle text-danger"></i>
              <p class="text">Page Content</p>
            </a>
            @endcan
          </li>
          <li class="nav-item">
            @can('view', new App\Models\Enquiry())
              <a href="{{Route('enquiryList')}}" @if(Route::currentRouteName()=='enquiryList')class="nav-link active" @else class="nav-link" @endif>
              <i class="nav-icon far fa-circle text-warning"></i>
              <p class="text">Enquiries</p>
            </a>
            @endcan
          </li>
          <li class="nav-item">
           @can('view', new App\Models\Order())
            <a href="{{Route('orderList')}}" @if(Route::currentRouteName()=='orderList')class="nav-link active" @else class="nav-link" @endif>
              <i class="nav-icon far fa-circle text-success"></i>
              <p class="text">Order List</p>
            </a>
            @endcan
          </li>
          <li class="nav-item">
          @can('manualpurchase', new App\Models\Order())
            <a href="{{Route('createPurchase')}}" @if(Route::currentRouteName()=='createPurchase')class="nav-link active" @else class="nav-link" @endif>
              <i class="nav-icon far fa-circle text-primary"></i>
              <p class="text">Manual Purchase</p>
            </a>
            @endcan
          </li>
          <li class="nav-item">
            @can('view',new App\Models\resource())
            <a href="{{Route('resourcesList')}}" @if(Route::currentRouteName()=='resourcesList')class="nav-link active" @else class="nav-link" @endif>
              <i class="nav-icon far fa-circle"></i>
              <p class="text">Resources</p>
            </a>
            @endcan
          </li>


        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
  @if ($errors->any())
  <div id="toastsContainerTopRight" class="toasts-top-right fixed p-2">
    @foreach ($errors->all() as $key => $error)
    <div class="toast bg-yellow  fade show" role="alert" aria-live="assertive" aria-atomic="true">
      <div class="toast-header">
        @php
         
         if(Str::contains($error, ['has'])){
          $data = explode('The', $error );
          $data = explode('has', $data[1]);
         }
         elseif(Str::contains($error, ['may'])){
          $data = explode('The', $error );
          $data = explode('may', $data[1]);
         }
         else{
          $data = explode('The ', $error);
          $data = explode('field ', $data[1]);
         }
        
        @endphp
        <strong class="mr-auto text-white">{{ ucfirst($data[0]) }}</strong>
        <button type="button" class="close px-2" data-dismiss="toast" aria-label="Close">
          <span aria-hidden="true">x</span></button>
      </div>
      <div class="toast-body text-white">{{$error}}</div>
  
     
    </div>
    @endforeach
  </div>
@endif
    
@yield('content')

<footer class="main-footer">
  <strong>Copyright &copy; 2014-2019 <a href="#">Best Practice Training</a>.</strong>
  All rights reserved.
  <div class="float-right d-none d-sm-inline-block">
    <b>Version</b> 3.0.5
  </div>
</footer>

</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{url('adminlte/plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{url('adminlte/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
$.widget.bridge('uibutton', $.ui.button)
</script>
<script src="{{ url('adminlte/plugins/select2/js/select2.full.min.js')}}"></script>

<!-- Bootstrap 4 -->
<script src="{{url('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- datepicker -->
<script src="{{ url('adminlte/bootstrap-datepicker.min.js')}}"></script>
<script src="{{ url('adminlte/cms/common.js')}}"></script>
<!-- Summernote -->
<script src="{{ url('adminlte/plugins/summernote/summernote-bs4.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{url('adminlte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{url('adminlte/dist/js/adminlte.js')}}"></script>
<script src="{{url('adminlte/bootstrap-toggle-master/js/bootstrap-toggle.min.js')}}"></script>
<!-- AdminLTE select 2 -->
<script type="text/javascript" src="{{url('adminlte/dist/js/select2.min.js')}}"></script>
<script src="{{url('adminlte/cms/summernote-cleaner.js')}}"></script>
{{-- Data Tables --}}
<script type="text/javascript" src="{{url('adminlte/DataTables/datatables.min.js')}}"></script>
{{-- Toastr js --}}
<script src="{{Url('adminlte/plugins/toastr/toastr.min.js')}}"></script>
<!-- SweetAlert2 -->
<script src="{{Url('adminlte/plugins/sweetalert2/sweetalert2.min.js')}}"></script>
@yield('footer')
<script>
  var selectedcountry = '{{ route("selectedcountry") }}';
  $(".toast").toast();
  $(function () {
      @if($message = Session::get('success'))
      toastr.success('{{$message}}');
      @endif
      
  });

  function summernoteload(elm){
    $(elm).summernote({
      toolbar:[
        ['cleaner',['cleaner']], // The Button
        ['style',['style']],
        ['font',['bold','italic','underline','clear']],
        ['fontname',['fontname']],
        ['color',['color']],
        ['para',['ul','ol','paragraph']],
        ['height',['height']],
        ['table',['table']],
        ['insert',['media','link','hr']],
        ['view',['fullscreen','codeview']],
        ['help',['help']],
        ['picture']
    ],
    cleaner:{
          action: 'button', // both|button|paste 'button' only cleans via toolbar button, 'paste' only clean when pasting content, both does both options.
          newline: '<br>', // Summernote's default is to use '<p><br></p>'
          notStyle: 'position:absolute;top:0;left:0;right:0', // Position of Notification
          icon: '<i class="note-icon">clean</i>',
          keepHtml: true, // Remove all Html formats
          keepOnlyTags: ['<p>', '<ul>', '<li>', '<a>','<h3>','<h4>','<h5>','<img>','<ol>','<span>'], // If keepHtml is true, remove all tags except these
          keepClasses: true, // Remove Classes
          badTags: ['style', 'script', 'applet', 'embed', 'noframes', 'noscript', 'html'], // Remove full tags with contents
          badAttributes: ['style', 'start','color','bgcolor'], // Remove attributes from remaining tags
          limitChars: false, // 0/false|# 0/false disables option
          limitDisplay: 'both', // text|html|both
          limitStop: false // true/false
    },
      height: 200,
      callbacks: {
          onImageUpload: function(image) {
            var data = new FormData();
            data.append("image", image[0]);
            $.ajax({
                url:"{{route('ImageUpload')}}",
                headers: {
                      'X-CSRF-TOKEN': $('meta[name="token"]').attr('content')
                  },
                cache: false,
                contentType: false,
                processData: false,
                data: data,
                type: "post",
                success: function(url) {
                  var imagetag = $('<img>').attr('src', url);
                  $('.summernote').summernote("insertNode", imagetag[0]);
                },
                error: function(data) {
                    console.log(data);
                }
            });
          }
      }
    });
  }

  $(document).ready(function() {
    
    $(document).on('click', function (event) {
           $target = $(event.target);

    });
    $('#country').on('input',function(){
     var country=$('#country').val();
     
      $.ajax({
        url:selectedcountry,
        data:{country_id: country},
        type:'post',
        global:false,
        headers: {
                      'X-CSRF-TOKEN': $('meta[name="token"]').attr('content')
                  },
        success:function(response){
          if(response=='done'){
          location.reload(); 
          }
          else{
          alert('country code not available');
          }
        }
      });
      
    });
        $(".selectJS").select2({
            width:'100%',
            
        });

    
      summernoteload('.summernote');


    });

    </script>
</body>
</html>
