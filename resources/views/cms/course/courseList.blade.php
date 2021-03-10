@extends('cms.layouts.master')
@section('content')



 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Course</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">Course</li>
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
        <!-- left column -->
        <div class="col-md-12">
           
          <div class="card card-primary card-outline">
            <div class="card-header">
              <div class="card-title col-sm-12">
                Course List
                <div class="popular">
                  Popular
              </div>
              <form action="{{Route('courseList')}}" method="get">
                                        
                <div class="onoffswitch">
                <input type="checkbox" name="popular" @if($checked!=null) checked @endif class="onoffswitch-checkbox" id="myonoffswitch" tabindex="0">
                <label class="onoffswitch-label" for="myonoffswitch">
                    <span class="onoffswitch-inner"></span>
                    <span class="onoffswitch-switch"></span>
                
                </label>
                
            </div>
              <input type="submit" name="submit" id="submit" style="visibility: hidden">
            </form>
          </div>  
        </div>

              <!-- /.card-header -->
              <div class="card-body">
              <div class="table table-responsive">    
              <table id="example1">
                
                <thead>
                <tr>
                  <th>Name</th>
                  <th>Topic</th>
                  <th>Popular</th>
                  <th>
                    @can('update',new App\Models\Course())
                    Content
                    @endcan
                  </th>
                  <th>
                    @can('update',new App\Models\Course())
                    FAQ's
                    @endcan
                  </th>
                  <th>
                    @can('update',new App\Models\Course())
                    Bullet Points
                    @endcan
                  </th>
                  <th>
                    @can('update',new App\Models\Course())
                    Whats Included
                    @endcan
                  </th>
                  <th>
                    @can('update',new App\Models\Course())
                    Actions
                    @endcan
                  </th>
                </tr>
                </thead>
                <tbody>
                
                    @foreach ($courses as $course)
                    <tr>
                      <td>{{$course->name}}</td>
                      <td>{{$course->topic->name ?? null}}</td>
                      <td class=" text-center"><input type="checkbox" name="is_popular"></td>
                      <td class=" text-center">
                        @can('update',$course)
                        <a href="{{ route('courseContentList',['course'=>$course->id]) }}" class="fa fa-list"></a>
                        @endcan
                      </td>

                      <td class=" text-center">
                        @can('update',$course)
                        <a href="{{ route('faqList',['type'=>'course','id'=>$course->id]) }}" class="far fa-question-circle"></a>
                        @endcan
                      </td>
                      
                      <td class=" text-center"> 
                        @can('update',$course)
                        <a href="{{Route('courseBulletPointList',['module'=>$course->id])}}" class=" fa fa-bullseye"></a>
                        @endcan
                      </td>
                      
                      <td class=" text-center"> 
                        @can('update',$course)
                        <a href="{{route('courseWhatsIncludedList',['module'=>$course->id])}}" class=" fas fa-puzzle-piece"></a>
                        @endcan
                      </td>
                      
                      <td class=" text-center">
                        @can('update',$course)
                        <a href="{{Route('editCourse',['course'=>$course->id])}}" class="fa fa-edit"></a>
                        @endcan
                        @can('delete',$course)
                        <a href="" onclick="deleteItem('{{ route('deleteCourse',['course'=>$course->id])}}')" class="fa fa-trash" style="color: red"></a>
                        @endcan
                      </td>
                    </tr>
                    @endforeach
                </tbody>
              </table>
            </div>
              @can('create',new App\Models\Course())
              <a id="add" href="{{route('createCourse')}}" class="btn btn-success" style="">Add new Record</a>
              @endcan
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card --> 
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection
@section('footer')
    <script>
        $(document).ready(function(){
              
            $('#example1').DataTable({
              "columns": [
                        { "name": "Name" },
                        { "name": "Topic" },
                        { "name": "Popular", "sorting":false, searching:false },
                        { "name": "Content", "sorting":false, searching:false },
                        { "name": "Faq", "sorting":false, searching:false },
                        { "name": "Bulletpoints", "sorting":false, searching:false  },
                        { "name": "WhatsIncluded", "sorting":false, searching:false  },
                        { "name": "Actions", "sorting":false, searching:false  }
              ]                    
            });

            $('#add').hover(function(){
                $(this).removeClass('btn-success');
                $(this).addClass('btn-primary');
            },function(){
                $(this).removeClass('btn-primary');
                $(this).addClass('btn-success');
            });
        });
    </script>
@endsection