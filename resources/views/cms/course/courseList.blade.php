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
              <div class="card-title">
                Course List
              </div>
            </div>

              <!-- /.card-header -->
              <div class="card-body">
              <table id="example1">
                <thead>
                <tr>
                  <th>Name</th>
                  <th>Topic</th>
                  <th>Content</th>
                  <th>Bulletpoints</th>
                  <th>WhatsIncluded</th>
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                
                    @foreach ($courses as $course)
                    <tr>
                    <td>{{$course->name}}</td>
                    <td>{{$course->topic->name}}</td>
                    <td><a href="{{ route('courseContentList',['course'=>$course->id]) }}" class="fa fa-list"></a></td>
                    <td> <a href="{{Route('bulletPointList',['module_id'=>$course->id])}}" class=" fa fa-bullseye"></a></td>
                    <td> <a href="{{route('whatsIncludedList',['module_id'=>$course->id])}}" class=" fa fa-list"></a></td>
                    <td><a href="{{Route('editCourse',['course'=>$course->id])}}" class="fa fa-edit"></a>
                    <a href="" onclick="deleteItem('{{ route('deleteCourse',['course'=>$course->id])}}')" class="fa fa-trash" style="color: red"></a>
                    </td>
                </tr>
                    @endforeach
                  
                
                </tfoot>
              </table>
              <a id="add" href="{{route('createCourse')}}" class="btn btn-success" style="">Add new Record</a>
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
                        { "name": "Content", "sorting":false, searching:false },
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