@extends('cms.layouts.master')
@section('content')



 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Bullet Points</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{route($type.'List')}}">{{ucfirst($type)}}</a></li>
            <li class="breadcrumb-item active">Bullet Points</li>
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
                {{$module->name}}
              </div>
            </div>

              <!-- /.card-header -->
              <div class="card-body">
              <table id="example1">
                <thead>
                <tr>
                  <th>BulletPoint</th>
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($module->BulletPoint as $bulletpoint)
                    <tr>
                    <td>{{$bulletpoint->bullet_point_text}}</td>
                    <td><a href="{{route($editbulletpointroute,['id'=>$bulletpoint->id])}}" class="fa fa-edit"></a>
                        &nbsp;&nbsp;
                        <a href="#" onclick="deleteItem('{{ route($deletebulletpointroute,['courseDetail'=>$bulletpoint->id] )}}')"><i class="fa fa-trash text-red"></i></a>
                    </td>
                </tr>
                    @endforeach
                  
                
                </tfoot>
              </table>
              <a id="add" href="{{route($insertbulletpointroute,['module'=>$module->id])}}" class="btn btn-success" style="">Add new Record</a>
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
                        { "name": "BulletPoint" },
                        { "name": "Actions", "sorting":false, searching:false },
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