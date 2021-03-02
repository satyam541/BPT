@extends('cms.layouts.master')
@section('content')

 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">{{$type}}</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">{{$type}}</li>
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
        <div class="col-md-12">
        <!-- left column -->
        <div class="card card-primary card-outline">
          <div class="card-header">
            <div class="card-title col-sm-12">
              {{$type}} List
              <div class="popular">
              Polpular
              
            </div>
                <form action="{{Route($submitRoute)}}" method="get">
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
              
              <table id="example1">
                <thead>
                <tr>
                  <th>Name</th>
                  <th>Date</th>
                  <th>
                    @can('update',new App\Models\Article())
                    Actions
                    @endcan
                </th>
                </tr>
                </thead>
                <tbody>
                
                    @foreach ($data as $item)
                    <tr>
                    <td>{{$item->title}}</td>
                    <td>{{$item->post_date}}</td>
                    <td>
                    @can('update',$item)
                    <a href="{{ route('editArticle',['article'=>$item->id]) }}" class="fa fa-edit"></a>
                    @endcan
                    @can('delete',$item)
                    <a href="#" onclick="deleteItem('{{ route('deleteArticle',['article'=>$item->id])}}')" class="fa fa-trash" style="color: red"></a>
                    @endcan  
                  </td>
                </tr>
                    @endforeach
                  
                
                </tfoot>
              </table>
              @can('create',new App\Models\Article())
              <a id="add" href="{{route('createNews')}}" class="btn btn-success" style="">Add new Record</a>
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
          $('#popular').change(function(){
              $('#submit').click();
                });
            $('#example1').DataTable({
              "columns": [
                        { "name": "Name" },
                        { "name": "Date", searching:false },
                        { "name": "Actions", "sorting":false, searching:false }
              ]                    
            });
        });
    </script>
@endsection