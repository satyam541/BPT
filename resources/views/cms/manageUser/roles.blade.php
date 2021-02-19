@extends('cms.layouts.master')
@section('content')



 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Roles</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">Roles</li>
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
                Roles
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1">
                <thead>
                <tr>
                  <th>Name</th>
                  <th>Description</th>
                  @can('update',new App\Models\Role())
                  <th>Actions</th>
                  @endcan
                </tr>
                </thead>
                <tbody>
                
                    @foreach ($roles as $role)
                    <tr>
                    <td>{{$role->name}}</td>
                    <td>{{$role->description}}</td>
                    <td>
                      @can('update',$role)
                      <a href="{{ route('editRole',['role'=>$role->id]) }}" class="fa fa-edit"></a>
                      @endcan
                      @can('delete',$role)
                      <a href="#"  onclick="deleteItem('{{route('deleteRole',[$role->id]) }}')" ><i class="fa fa-trash text-red"></i></a>
                      @endcan
                    </td>
                    </tr>
                    @endforeach
                  
                
                </tfoot>
              </table>
              @can('create',Auth::user(),App\Models\Role::class)
              <a id="add" href="{{route('createRole')}}" class="btn btn-success" style="">Add new record</a>
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
                        { "name": "Description" },
                        { "name": "Actions", "sorting":false, searching:false }
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