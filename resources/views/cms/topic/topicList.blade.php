@extends('cms.layouts.master')
@section('content')



 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Topics</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">Topic</li>
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
                Topic List
                <div class="popular">
                  Popular
                </div>
              <form action="{{Route('topicList')}}" method="get">
                                        
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
                <span class="message" id="success_type"></span>
                <div class="table table-responsive">
                
              <table id="example1">
                <thead>
                <tr>
                  <th>Name</th>
                  <th>Category</th>
                  <th>Popular</th>
                  <th>Content</th>
                  <th>FAQ's</th>
                  <th>Bullet Points</th>
                  <th>Whats Included</th>
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                
                    @foreach ($topics as $topic)
                    <tr>
                      <td>{{$topic->name}}</td>
                      <td>{{$topic->category->name ?? ''}}</td>
                      <td class=" text-center"><input type="checkbox" value="{{$topic->id}}" @if ($topic->popular->exists) checked @endif class="popularTopic" name="is_popular"></td>
                      <td class=" text-center">
                        @can('update',$topic)
                        <a href="{{ route('topicContentList',['topic'=>$topic->id]) }}" class="fa fa-list"></a>
                        @endcan
                      </td>
                      <td class=" text-center">
                        @can('update',$topic)
                        <a href="{{ route('faqList',['type'=>'topic','id'=>$topic->id]) }}" class="far fa-question-circle"></a>
                        @endcan
                      </td>
                      
                      <td class=" text-center"> 
                        @can('update',$topic)
                        <a href="{{route('topicBulletPointList',['module'=>$topic->id])}}" class=" fa fa-bullseye"></a>
                        @endcan
                      </td>
                      <td class=" text-center"> 
                        @can('update',$topic)
                        <a href="{{route('topicWhatsIncludedList',['module'=>$topic->id])}}" class=" fas fa-puzzle-piece"></a>
                        @endcan
                      </td>
                      <td class=" text-center">
                        @can('update',$topic)
                        <a href="{{ route('editTopic',['topic'=>$topic->id]) }}" class="fa fa-edit"></a>
                        @endcan
                        @can('delete',$topic)
                        <a href="#" onclick="deleteItem('{{ route('deleteTopic',['topic'=>$topic->id])}}')" class="fa fa-trash" style="color: red"></a>
                        @endcan
                      </td>
                    </tr>
                    @endforeach
                  
                
                </tbody>
              </table>
              </div>
              @can('create',new App\Models\Topic())
              <a id="add" href="{{route('createTopic')}}" class="btn btn-success" style="">Add new Record</a>
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
      success = $('#success_type');
        $(document).ready(function(){
            $('#example1').DataTable({
              "columns": [
                        { "name": "Name" },
                        { "name": "Category" },
                        { "name": "Popular", "sorting":false, searching:false },
                        { "name": "Content", "sorting":false, searching:false },
                        { "name": "Faq", "sorting":false, searching:false },
                        { "name": "Bulletpoints", "sorting":false, searching:false  },
                        { "name": "Whatsincluded", "sorting":false, searching:false  },
                        { "name": "Actions", "sorting":false, searching:false  }
              ]                    
            });
            $('tbody').on('click','.popularTopic',function(){
              var id=$(this).val();
              var checked=$(this).attr('checked');
              var that = this;
              $.ajax({
                url:'{{route('topicPopular')}}',
                data:{topicId:id,checked:checked},
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
                    });
                }
            
              });
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