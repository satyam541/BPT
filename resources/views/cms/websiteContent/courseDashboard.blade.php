@extends('cms.layouts.master')
@section('content')


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
  
          <div class="col-md-4">
            <!-- Widget: user widget style 1 -->
            <div class="box box-widget widget-user-2">
              <div id="w6" class="info-box bg-yellow">
                <span class="info-box-icon "><i class="far fa-thumbs-up"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text"><b>Course Content</b></span>
                    <span class="info-box-number">{{round($percentage['content'])."%"}}</span>
                    <div class="progress">
                      <div class="progress-bar" style="width: {{round($percentage['content']).'%'}}">
                      </div>
                    </div>
                    <span class="progress-description">@if(round($percentage['content'])>90) Course Content of this course is good
                    @elseif (round($percentage['content'])>60 and round($percentage['content']) < 90) 
                    Course Content of this course is average
                    @else
                        Course Content of this course needs improvement
                        @endif
                    </span>
                  </div>
              </div>

              <div class="card">
                <div class="card-body">
                  <a href="#" class="dropdown-item"> Overview <span class="pull-right badge {{$content['overview'] ? "bg-aqua" : "bg-red"}} ">{{$content['overview'] ? "Avaliable" : "Not Avaliable"}}</span></a>
                  
                  <div class="dropdown-divider"></div>
                  
                  
                  {{-- <ul class="nav nav-stacked">
                    <li><a href="#">Overview <span class="pull-right badge {{$content['overview'] ? "bg-aqua" : "bg-red"}} ">{{$content['overview'] ? "Avaliable" : "Not Avaliable"}}</span></a></li>
                    <li><a href="#">Outline <span class="pull-right badge {{$content['outline'] ? "bg-aqua" : "bg-red"}} ">{{$content['outline'] ? "Avaliable" : "Not Avaliable"}}</span></a></li>
                    <li><a href="#">Bullet points <span class="pull-right badge {{$content['bullet_list'] ? "bg-aqua" : "bg-red"}} ">{{$content['bullet_list'] ? "Avaliable" : "Not Avaliable"}}</span></a></li>
                    <li><a href="#">Whats Included <span class="pull-right badge {{$content['whats_included'] ? "bg-aqua" : "bg-red"}} ">{{$content['whats_included'] ? "Avaliable" : "Not Avaliable"}}</span></a></li>
                  </ul> --}}
                </div>
              </div>
            </div>
            <!-- /.widget-user -->
          </div>
          <div class="col-md-4">
            <!-- Widget: user widget style 1 -->
            <div class="box box-widget widget-user-2">
                
                <div id="w6" class="info-box bg-blue">
                  <span class="info-box-icon "><i class="@if(round($percentage['schedule'])>90)  far fa-thumbs-up 
                  @elseif(round($percentage['schedule']) < 90 && round($percentage['schedule']) > 60) far fa-thumbs-up @else  far fa-thumbs-down
                  @endif"></i>
                  </span>
                  <div class="info-box-content">
                    <span class="info-box-text"><b>Schedule</b></span>
                    <span class="info-box-number">{{round($percentage['schedule'])."%"}}</span>
                    <div class="progress">
                      <div class="progress-bar" style="width: {{round($percentage['schedule']).'%'}}">
                      </div>
                    </div>
                    <span class="progress-description">@if(round($percentage['schedule'])>90) Course Content of this course is good
                    @elseif (round($percentage['schedule'])>60 and round($percentage['schedule']) < 90) 
                    Course Content of this course is average
                    @else
                        Course Content of this course needs improvement
                        @endif
                    </span>
                  </div>
                </div>
              <div class="box-footer no-padding">
                <ul class="nav nav-stacked">
                    
                  <li><a href="#">Classroom Schedule <span class="pull-right badge {{$schedule['classroom'] ? "bg-aqua" : "bg-red"}}">{{$schedule['classroom'] ? "Avaliable" : "Not Avaliable"}}</span></a></li>
                  <li><a href="#">Online Prize <span class="pull-right badge {{$schedule['online'] ? "bg-aqua" : "bg-red"}} ">{{$schedule['online'] ? "Avaliable" : "Not Avaliable"}}</span></a></li>
                  <li><a href="#">Virtual Schedule <span class="pull-right badge {{$schedule['virtual'] ? "bg-aqua" : "bg-red"}} ">{{$schedule['virtual'] ? "Avaliable" : "Not Avaliable"}}</span></a></li>

                </ul>
              </div>
            </div>
            <!-- /.widget-user -->
          </div>
          <div class="col-md-4">
            <!-- Widget: user widget style 1 -->
            <div class="box box-widget widget-user-2">
              <div id="w6" class="info-box bg-green">
                <span class="info-box-icon "><i class="far fa-thumbs-up"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text"><b>SEO Content</b></span>
                  <span class="info-box-number">{{round($percentage['seo'])."%"}}</span>
                  <div class="progress">
                    <div class="progress-bar" style="width: {{round($percentage['seo']).'%'}}">
                    </div>
                  </div>
                  <span class="progress-description">@if(round($percentage['seo'])>90) SEO Content of this course is good
                  @elseif (round($percentage['seo'])>60 and round($percentage['seo']) < 90) 
                      SEO Content of this course is average
                  @else
                      SEO Content of this course needs improvement
                      @endif
                  </span>
                </div>
              </div>
              <div class="box-footer no-padding">
                <ul class="nav nav-stacked">
                    
                  <li><a href="#">Meta title <span class="pull-right badge {{$seo['meta_title'] ? "bg-aqua" : 'bg-red'}}">{{$seo['meta_title'] ? "Avaliable" : "Not Avaliable"}}</span></a></li>
                  <li><a href="#">Meta Description <span class="pull-right badge {{$seo['meta_description'] ? 'bg-aqua' : 'bg-red'}} ">{{$seo['meta_description'] ? "Avaliable" : "Not Avaliable"}}</span></a></li>
                  <li><a href="#">Meta Keyword <span class="pull-right badge {{$seo['meta_keyword'] ?  'bg-aqua' : 'bg-red'}} ">{{ $seo['meta_keyword'] ? "Avaliable" : "Not Avaliable"}}</span></a></li> 
                </ul>
              </div>
            </div>
            <!-- /.widget-user -->
          </div>
        </div>


        <div class="row">
          <div class="col-xs-12">
              <div class="box box-solid">
                  <div class="box-header">
                      <h2>{{$course->name}}</h2>
                  </div>
                  <div class="box-body no-padding">
                      
                      <div class="table-responsive ">
                          <table class="table table-hover">
                              <thead>
                                  <tr>
                                      <th>Location</th>
                                      <th>Tier</th>
                                      <th>Classroom</th>
                                      <th>Online price</th>
                                  <th> Landing Page </th>
                                  </tr>        
                              </thead>
                              <tbody>
                                  @foreach($dates as $key=>$date)
                                  <tr>
                                      
                                      <td>{{$key}}</td>

                                      <td>
                                          @if(0 == $date->first()->location['tier'])
                                              3
                                          @else
                                              {{ $date->first()->location->tier }}
                                          @endif
                                      </td>
                                    
                                      <td>{{$date->count()}}&nbsp &nbsp &nbsp <button dates ="{{ $date->toJson() }}" onclick="displaydates(this);" data-target="#modal-info"><i class="far fa-eye"></i></td>
                                        <td>{{$course->onlinePrice}}</td>
                                    
              
                                  @endforeach
                                  
                              </tbody>
                          </table>
                      </div> 
                  </div>
              </div>
          </div>
        </div>
          <!-- Modal -->
          <div class="modal modal-info fade" id="modal-info">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                  <h4 class="modal-title">Info Modal</h4>
                </div>
                <div class="modal-body">
                  <p>One fine body…</p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                  
                </div>
              </div>
              <!-- /.modal-content -->
            </div>
           
            <!-- /.modal-dialog -->
          </div>
          <script type="text/javascript">
            function displaydates(a)
               {
                body = $("#modal-info .modal-body");
                table = "<table class='table table-bordered'>";
                
               dates = JSON.parse($(a).attr('dates'));
                   $.each(dates, function(idx, obj) {
                       modified_date= obj.response_date.toString().split(" ");
                       format = new Date( modified_date[0]).toString().split("04:00:00 ");
                       price = obj.response_price.split(".");
                     table +=  "<tr><td>"+obj.response_location+"</td><td>"+format[0]+"</td><td>"+price[0]+"</td></tr>";
       });
       table += "</table>";
       body.html(table);
                    $("#modal-info").modal();
       console.log(table);
       
                   var body = $("#modal-info .modal-body");
                  body.html(table);
                           $("#modal-info").modal();
               
               }
                
       
                   </script>
  @endsection
  @section('footerScripts')
  
  @endsection
  