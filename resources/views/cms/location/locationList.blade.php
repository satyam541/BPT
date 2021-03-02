@extends('cms.layouts.master')
@section('content')



 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Location</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">Location</li>
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
                Location List
                <div class="popular">
                  Polpular
              </div>
              <form action="{{Route('locationList')}}" method="get">
                                        
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
                  <th>Country</th>
                  <th>
                    @can('update',new App\Models\Location())
                    Actions
                    @endcan
                  </th>
                </tr>
                </thead>
                <tbody>
                
                    @foreach ($locations as $location)
                    <tr>
                      <td>{{$location->name}}</td>
                      <td>{{$location->country->name ?? ''}}</td>
                      <td>
                        @can('update',$location)
                        <a href="{{route('editLocation',['location'=>$location->id])}}" class="fa fa-edit"></a>
                        &nbsp;&nbsp;&nbsp;
                        @endcan
                        @can('delete',$location)
                        <a href=""onclick="deleteItem('{{ route('deleteLocation',['location'=>$location->id])}}')" class="fa fa-trash" style="color: red"></a>
                        @endcan
                      </td>
                    </tr>
                    @endforeach
                  
                
                </tfoot>
              </table>
              @can('create',new App\Models\Location())
              <a id="add" href="{{route('createLocation')}}" class="btn btn-success" style="">Add new Record</a>
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
                        { "name": "Country" },
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