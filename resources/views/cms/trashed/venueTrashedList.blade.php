@extends('cms.layouts.master')
@section('content')



 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Venue</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">venue</li>
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
                Venue Trash
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1">
                <thead>
                <tr>
                  <th>Venue Name</th>
                  <th>Date</th>
                  <th>
                    @can('restore',new App\Models\Venue())
                    Actions
                    @endcan
                  </th>
                </tr>
                </thead>
                <tbody>
                
                    @foreach ($trashedVenues as $trashedVenue)
                    <tr>
                    <td>{{$trashedVenue->name}}</td>
                    <td>{{$trashedVenue->created_at}}</td>
                    <td>
                      @can('restore',$trashedVenue)
                      <a href="{{ route('restoreVenue',['id'=>$trashedVenue->id]) }}" class="fa fa-refresh fa-spin"></a>
                      @endcan
                      &nbsp;&nbsp;&nbsp;&nbsp;
                      @can('forceDelete',$trashedVenue)
                      <a href="{{ route('forceDeleteVenue',['id'=>$trashedVenue->id]) }}" class="fa fa-trash" style="color: red"></a>
                      @endcan
                  </td>
                </tr>
                    @endforeach
                  
                
                </tfoot>
              </table>
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
                        { "name": "Venue Name" },
                        { "name": "Date",  searching:false },
                        { "name": "Actions", "sorting":false, searching:false  }
              ]                    
            });
        });
    </script>
@endsection