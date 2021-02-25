@extends('cms.layouts.master')
@section('content')



 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Addon List</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">Addon</li>
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
                Course Addon List
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>Type</th>
                    <th>
                      {{-- @can('update',new App\Models\CourseElearning()) --}}
                      Actions
                      {{-- @endcan --}}
                    </th>
                  </tr>
                  </thead>
                <tbody>
                
                    @foreach ($courseAddons as $courseAddon)
                    <tr>
                      <td>{{$courseAddon->name}}</td>
                      <td>{{$courseAddon->addon_type}}</td>
                      
                      
                      <td>
                        {{-- @can('update',$courseAddon) --}}
                        <a href="{{Route('AddonEdit',['id'=>$courseAddon->id])}}" class="fa fa-edit"></a>
                        {{-- @endcan --}}
                        {{-- @can('delete',$courseAddon) --}}
                        <a href="#" onclick="deleteItem('{{ route('AddonDelete',[$courseAddon->id])}}')"><i class="fa fa-trash" style="color: red"></i></a>
                        {{-- @endcan --}}
                      </td>
                    </tr>
                    @endforeach
                  
                
                </tfoot>
              </table>
              {{-- @can('create',new App\Models\CourseElearning()) --}}
              <a id="add" href="{{ route('AddonCreate')}}" class="btn btn-success" style="">Add new Record</a>
              {{-- @endcan --}}
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
                        { "name": "Type" },
                        { "name": "Actions", "sorting":false, searching:false }
              ]                    
            });
        });
    </script>
@endsection