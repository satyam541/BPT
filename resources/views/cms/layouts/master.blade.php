<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <title>CMS | Best Practice Training</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{url('adminlte/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
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
  <link rel="stylesheet" href="{{ url('adminLTE/bootstrap-datepicker.min.css')}}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{url('adminlte/plugins/daterangepicker/daterangepicker.css')}}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{url('adminlte/plugins/summernote/summernote-bs4.css')}}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="{{url('adminlte/DataTables/datatables.min.css')}}"/>
</head>
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
          <a href="#" class="dropdown-item">
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
          <li class="nav-header">Admin Resources</li>
          <li class="nav-item has-treeview menu-open">
            <a href="{{Route('dashboard')}}" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>

          <li class="nav-item has-treeview">
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
                <a href="{{Route('userList')}}" class="nav-link">
                  <i class="far fa-circle nav-icon text-danger"></i>
                  <p>User</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{Route('roleList')}}" class="nav-link">
                  <i class="far fa-circle nav-icon text-warning"></i>
                  <p>Role</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{Route('permissionList')}}" class="nav-link">
                  <i class="far fa-circle nav-icon text-success"></i>
                  <p>Permission</p>
                </a>
            </ul>
          </li>
         
          <li class="nav-header">Resources</li>
          <li class="nav-item has-treeview">
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
                <a href="{{Route('categoryList')}}" class="nav-link">
                  <i class="far fa-circle nav-icon text-danger"></i>
                  <p>Category</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{Route('topicList')}}" class="nav-link">
                  <i class="far fa-circle nav-icon text-warning"></i>
                  <p>Topic</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{Route('courseList')}}" class="nav-link">
                  <i class="far fa-circle nav-icon text-success"></i>
                  <p>Course</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{Route('onlinecourseList')}}" class="nav-link">
                  <i class="far fa-circle nav-icon text-primary"></i>
                  <p>Online Course</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{Route('whatsIncludedList')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Whats Included</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{Route('accreditationList')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Accreditation</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-map-marker-alt"></i>
              <p>
                Venues
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{Route('countryList')}}" class="nav-link">
                  <i class="nav-icon far fa-circle text-danger"></i>
                  <p>Country</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{Route('locationList')}}" class="nav-link">
                  <i class="nav-icon far fa-circle text-warning"></i>
                  <p>Location</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{Route('venueList')}}" class="nav-link">
                  <i class="nav-icon far fa-circle text-success"></i>
                  <p>Venue</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-calendar-alt"></i>
              <p>
                Schedule
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{Route('scheduleList')}}" class="nav-link">
                  <i class="nav-icon far fa-circle text-danger"></i>
                  <p>Schedule List</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{Route('getSchedule')}}" class="nav-link">
                  <i class="nav-icon far fa-circle text-warning"></i>
                  <p>Fetch Schedule</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{Route('createSchedule')}}" class="nav-link">
                  <i class="nav-icon far fa-circle text-success"></i>
                  <p>Add Schedule</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{Route('manualScheduleList')}}" class="nav-link">
                  <i class="nav-icon far fa-circle text-primary"></i>
                  <p>Manual Schedule List</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{Route('manageCoursePrice')}}" class="nav-link">
                  <i class="nav-icon far fa-circle text-success"></i>
                  <p>Manage Price</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{Route('onlinePriceList')}}" class="nav-link">
                  <i class="nav-icon far fa-circle text-"></i>
                  <p>Online Prices</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-fire"></i>
              <p>
                Popular
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{Route('popularItems')}}" class="nav-link">
                  <i class="nav-icon far fa-circle text-danger"></i>
                  <p>List All</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-newspaper"></i>
              <p>
                Article
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{Route('newsList')}}" class="nav-link">
                  <i class="nav-icon far fa-circle text-danger"></i>
                  <p>News List</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{Route('blogList')}}" class="nav-link">
                  <i class="nav-icon far fa-circle text-warning"></i>
                  <p>Blog List</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{Route('tagList')}}" class="nav-link">
                  <i class="nav-icon far fa-circle text-success"></i>
                  <p>Tag List</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{Route('testimonialList')}}" class="nav-link">
                  <i class="nav-icon far fa-circle text-primary"></i>
                  <p>Testimonials</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-globe"></i>
              <p>
                Website
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{Route('websiteDashboard')}}" class="nav-link">
                  <i class="nav-icon far fa-circle text-danger"></i>
                  <p>Webiste Dashboard</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{Route('websiteDetailList')}}" class="nav-link">
                  <i class="nav-icon far fa-circle text-warning"></i>
                  <p>Website Detail List</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{Route('urlRedirectList')}}" class="nav-link">
                  <i class="nav-icon far fa-circle text-success"></i>
                  <p>URL Redirect</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{Route('socialmediaList')}}" class="nav-link">
                  <i class="nav-icon far fa-circle text-primary"></i>
                  <p>Social Media List</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-header">Extra Resource</li>
          <li class="nav-item">
            <a href="{{Route('pageDetailList')}}" class="nav-link">
              <i class="nav-icon far fa-circle text-danger"></i>
              <p class="text">Page Content</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{Route('pageDetailList')}}" class="nav-link">
              <i class="nav-icon far fa-circle text-warning"></i>
              <p class="text">Enquiries</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{Route('pageDetailList')}}" class="nav-link">
              <i class="nav-icon far fa-circle text-success"></i>
              <p class="text">Order List</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{Route('pageDetailList')}}" class="nav-link">
              <i class="nav-icon far fa-circle text-primary"></i>
              <p class="text">Manual Purchase</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{Route('pageDetailList')}}" class="nav-link">
              <i class="nav-icon far fa-circle"></i>
              <p class="text">Resources</p>
            </a>
          </li>


        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

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
<!-- Bootstrap 4 -->
<script src="{{url('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{url('adminlte/plugins/chart.js/Chart.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{url('adminlte/plugins/sparklines/sparkline.js')}}"></script>
<!-- JQVMap -->
<script src="{{url('adminlte/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{url('adminlte/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{url('adminlte/plugins/jquery-knob/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{url('adminlte/plugins/moment/moment.min.js')}}"></script>
<script src="{{url('adminlte/plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{url('adminlte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- datepicker -->
<script src="{{ url('adminLTE/bootstrap-datepicker.min.js')}}"></script>
<script src="{{ url('cms/common.js?2')}}"></script>
<!-- Summernote -->
<script src="{{url('adminlte/plugins/summernote/summernote-bs4.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{url('adminlte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{url('adminlte/dist/js/adminlte.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{url('adminlte/dist/js/pages/dashboard.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{url('adminlte/dist/js/demo.js')}}"></script>
<script type="text/javascript" src="{{url('adminlte/dist/js/select2.min.js')}}"></script>
<script type="text/javascript" src="{{url('adminlte/DataTables/datatables.min.js')}}"></script>
@yield('footer')
<script>
  $(document).ready(function() {
    $(document).on('click', function (event) {
           $target = $(event.target);

          });
      $('.summernote').summernote({
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

                    var imagetag = $('<img>').attr('src',url);
                    $($target).summernote("insertNode", imagetag[0]);
                  },
                  error: function(data) {
                      console.log(data);
                  }
              });
            }
        }
      });

    });
    </script>
</body>
</html>
