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
              <span class="message" id="success_type"></span>
              <div class="card-title col-sm-12">
                Course List
                <div class="popular">
                  Popular
                </div>
                           <br>             
                  <div class="onoffswitch">
                  <input type="checkbox" name="active"  class="onoffswitch-checkbox" id="myonoffswitch" tabindex="0">
                  <label class="onoffswitch-label" for="myonoffswitch">
                      <span class="onoffswitch-inner"></span>
                      <span class="onoffswitch-switch"></span>
                  
                  </label>
                  
              </div>
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
                      <td class=" text-center">@if ($course->popular->exists)&nbsp; @endif<input type="checkbox" value="{{$course->id}}" @if ($course->popular->exists) checked @endif class="popularCourse" name="is_popular"></td>
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
          success = $('#success_type');
            var table=$('#example1').DataTable({
              
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
            
            $('tbody').on('click','.popularCourse',function(){
              var id=$(this).val();
              var checked=$(this).attr('checked');
              var that = this;
              $.ajax({
                url:'{{route('coursePopular')}}',
                data:{courseId:id,checked:checked},
                type:'post',
                headers: {
                'X-CSRF-TOKEN': $("meta[name='token']").attr('content')
            },
            success: function(data) {
              if(data=='removed'){
                $(that).attr('checked',false);
              }
              else{
                $(that).attr("checked", true);
              }
                    success.fadeIn('slow', function(){

                        toastr.success('successfully '+data);
                        success.delay(3000).fadeOut(); 
                        location.reload();
                    });
                }
            
              });
            });
            $('#myonoffswitch').on('change',function(){
         
      
         if($(this).is(':checked')){
             $.fn.dataTable.ext.search.push(
                 function(settings, data, dataIndex) {  

  return data[2] 
     }
         )
              }
              else {
$.fn.dataTable.ext.search.pop()
}
table.draw()
     });
        });
    </script>
@endsection