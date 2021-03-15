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
                                    <span class="info-box-text" style="color: white"><b>Course Content</b></span>
                                    <span class="info-box-number" style="color: white">{{ round($percentage['content']) . '%' }}</span>
                                    <div class="progress">
                                        <div class="progress-bar"
                                            style="width: {{ round($percentage['content']) . '%' }}">
                                        </div>
                                    </div>
                                    <span class="progress-description" style="white-space: normal;color:white">
                                        @if (round($percentage['content']) > 90) Course
                                            Content of this course is good
                                        @elseif (round($percentage['content'])>60 and round($percentage['content']) <
                                            90) Course Content of this course is average @else Course Content of this
                                                course needs improvement @endif
                                    </span>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-body">
                                    <a href="#" class="dropdown-item"> Overview <span
                                            class="badge float-right text-muted text-sm {{ $content['overview'] ? 'bg-aqua' : 'bg-red' }} ">{{ $content['overview'] ? 'Avaliable' : 'Not Avaliable' }}</span></a>
                                    <div class="dropdown-divider"></div>
                                    <a href="#" class="dropdown-item"> Outline <span
                                            class="badge float-right text-muted text-sm {{ $content['outline'] ? 'bg-aqua' : 'bg-red' }} ">{{ $content['outline'] ? 'Avaliable' : 'Not Avaliable' }}</span></a>
                                    <div class="dropdown-divider"></div>
                                    <a href="#" class="dropdown-item"> Bullet points <span
                                            class="badge float-right text-muted text-sm {{ $content['bullet_list'] ? 'bg-aqua' : 'bg-red' }} ">{{ $content['bullet_list'] ? 'Avaliable' : 'Not Avaliable' }}</span></a>
                                    <div class="dropdown-divider"></div>
                                    <a href="#" class="dropdown-item"> Whats Included <span
                                            class="badge float-right text-muted text-sm {{ $content['whats_included'] ? 'bg-aqua' : 'bg-red' }} ">{{ $content['whats_included'] ? 'Avaliable' : 'Not Avaliable' }}</span></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <!-- Widget: user widget style 1 -->
                        <div class="box box-widget widget-user-2">

                            <div id="w6" class="info-box bg-blue">
                                <span class="info-box-icon "><i class="@if (round($percentage['schedule'])> 90) far fa-thumbs-up
                                    @elseif(round($percentage['schedule']) < 90 &&
                                    round($percentage['schedule']) > 60) far fa-thumbs-up @else far
                                        fa-thumbs-down @endif"></i>
                                </span>
                                <div class="info-box-content">
                                    <span class="info-box-text"><b>Schedule</b></span>
                                    <span class="info-box-number">{{ round($percentage['schedule']) . '%' }}</span>
                                    <div class="progress">
                                        <div class="progress-bar"
                                            style="width: {{ round($percentage['schedule']) . '%' }}">
                                        </div>
                                    </div>
                                    <span class="progress-description" style="white-space: normal">
                                        @if (round($percentage['schedule']) > 90) Course
                                            Content of this course is good
                                        @elseif (round($percentage['schedule'])>60 and round($percentage['schedule']) <
                                            90) Course Content of this course is average @else Course Content of this
                                                course needs improvement @endif
                                    </span>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-body">
                                    <a href="#" class="dropdown-item"> Classroom Schedule <span
                                            class="badge float-right text-muted text-sm {{ $schedule['classroom'] ? 'bg-aqua' : 'bg-red' }}">{{ $schedule['classroom'] ? 'Avaliable' : 'Not Avaliable' }}</span></a>
                                    <div class="dropdown-divider"></div>
                                    <a href="#" class="dropdown-item"> Online Prize <span
                                            class="badge float-right text-muted text-sm {{ $schedule['online'] ? 'bg-aqua' : 'bg-red' }} ">{{ $schedule['online'] ? 'Avaliable' : 'Not Avaliable' }}</span></a>
                                    <div class="dropdown-divider"></div>
                                    <a href="#" class="dropdown-item"> Virtual Schedule <span
                                            class="badge float-right text-muted text-sm {{ $schedule['virtual'] ? 'bg-aqua' : 'bg-red' }} ">{{ $schedule['virtual'] ? 'Avaliable' : 'Not Avaliable' }}</span></a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item">&nbsp;</a>
                                </div>
                            </div>
                            <!-- /.widget-user -->
                        </div>
                    </div>

                    <div class="col-md-4">
                        <!-- Widget: user widget style 1 -->
                        <div class="box box-widget widget-user-2">
                            <div id="w6" class="info-box bg-green">
                                <span class="info-box-icon "><i class="@if (round($percentage['seo'])> 90) far fa-thumbs-up
                                    @elseif(round($percentage['seo']) < 90 &&
                                    round($percentage['seo']) > 60) far fa-thumbs-up @else far
                                        fa-thumbs-down @endif"></i>
                                </span>
                                <div class="info-box-content">
                                    <span class="info-box-text"><b>SEO Content</b></span>
                                    <span class="info-box-number">{{ round($percentage['seo']) . '%' }}</span>
                                    <div class="progress">
                                        <div class="progress-bar" style="width: {{ round($percentage['seo']) . '%' }}">
                                        </div>
                                    </div>
                                    <span class="progress-description"style="white-space: normal">
                                        @if (round($percentage['seo']) > 90) SEO Content of
                                            this course is good
                                        @elseif (round($percentage['seo'])>60 and round($percentage['seo']) < 90) SEO
                                            Content of this course is average @else SEO Content of this course needs
                                                improvement @endif
                                    </span>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-body">
                                    <a href="#" class="dropdown-item"> Meta title <span
                                            class="badge float-right text-muted text-sm {{ $seo['meta_title'] ? 'bg-aqua' : 'bg-red' }}">{{ $seo['meta_title'] ? 'Avaliable' : 'Not Avaliable' }}</span></a>
                                    <div class="dropdown-divider"></div>
                                    <a href="#" class="dropdown-item"> Meta Description <span
                                            class="badge float-right text-muted text-sm {{ $seo['meta_description'] ? 'bg-aqua' : 'bg-red' }} ">{{ $seo['meta_description'] ? 'Avaliable' : 'Not Avaliable' }}</span></a>
                                    <div class="dropdown-divider"></div>
                                    <a href="#" class="dropdown-item"> Meta Keyword <span
                                            class="badge float-right text-muted text-sm {{ $seo['meta_keyword'] ? 'bg-aqua' : 'bg-red' }} ">{{ $seo['meta_keyword'] ? 'Avaliable' : 'Not Avaliable' }}</span></a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item">&nbsp;</a>
                                </div>
                            </div>

                        </div>
                        <!-- /.widget-user -->
                    </div>
                </div>
                {{-- row --}}

                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h1 class="card-title">{{ $course->name }}</h1>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example1" class="table table-hover">
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
                                            
                                            @foreach ($dates as $key => $date)
                                                <tr>
                                                    <td>{{ $key }}</td>
                                                    <td>
                                                        @if (empty($date->first()->location['tier']))
                                                            3
                                                        @else
                                                            {{ $date->first()->location->tier }}
                                                        @endif
                                                    </td>

                                                    <td>{{ $date->count() }}&nbsp &nbsp &nbsp <button
                                                            dates="{{ $date->toJson() }}" loc="{{ $key }}"
                                                            onclick="displaydates(this);" data-target="#modal-info"><i
                                                                class="far fa-eye"></i></td>
                                                    <td>{{ optional($course->onlinePrice)->price }}</td>
                                                    <td> </td>


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
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">{{ $course->name }}&nbsp;:&nbsp;<span id="location"></span></h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">x</span></button>

                            </div>
                            <div class="modal-body">
                                <p>Schedule not avaliable...</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary pull-left" data-dismiss="modal">Close</button>

                            </div>
                        </div>
                        <!-- /.modal-content -->
                    </div>

                    <!-- /.modal-dialog -->
                </div>

            </div>
    </div>
    </section>
    </div>
@endsection
@section('footer')
    <script>
        $(document).ready(function(){
            $('#example1').DataTable({
              "columns": [
                        { "name": "Location" },
                        { "name": "Tier" },
                        { "name": "Classroom", "sorting":false, searching:false },
                        { "name": "Online price" },
                        { "name": "Landing Page"},
              ]                    
            });
        });
        function displaydates(elm) {
            body = $("#modal-info .modal-body");
            table =
                "<table class='table table-bordered' id='schedule'><thead><tr><td>Schedule</td><td>Price</td></tr></thead><tbody>";
            loc = $(elm).attr('loc');
            $('#location').html(loc);
            dates = JSON.parse($(elm).attr('dates'));
            $.each(dates, function(idx, obj) {
                modified_date = obj.response_date.toString().split(",")[0];
                format = new Date(modified_date);
                var day = format.toUTCString();
                const regex = /\d{2}:\d{2}:\d{2} GMT/i;
                day = day.replace(regex, '');
                // var date = format.getDate();
                // var month = format.getMonth();
                // var year = format.getFullYear();
                // finalDate = day+", "+date+" "+month+" "+year;
                price = obj.response_price.split(".");
                table += "<tr><td>" + day + "</td><td>" + price[0] + "</td></tr>";
            });
            table += "</tbody></table>";
            body.html(table);
            $("#modal-info").modal();

            $('#schedule').DataTable({
                paging: true,
                scrollY: 450,
                sorting: false
            });
        }

    </script>
@endsection
