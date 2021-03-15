@extends('cms.layouts.master')
@section('content')



 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">URL Redirect</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{route('urlRedirectList')}}">URL Redirect</a></li>
            <li class="breadcrumb-item active">Trash</li>
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
                URL Redirect Trash
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1">
                <thead>
                <tr>
                  <th>Source URL</th>
                  <th>Destination URL</th>
                  <th>Date</th>
                  <th>
                  {{-- @can('restore',new App\Models\URL Redirect()) --}}
                  Actions
                  {{-- @endcan --}}
                  </th>
                </tr>
                </thead>
                <tbody>
                
                    @foreach ($trashedUrls as $trashedUrl)
                    <tr>
                    <td>{{$trashedUrl->source_url}}</td>
                    <td>{{$trashedUrl->target_url}}</td>
                    <td>{{$trashedUrl->created_at}}</td>
                    <td>
                      {{-- @can('restore',$trashedUrl) --}}
                      <a href="{{ route('restoreUrlRedirect',['id'=>$trashedUrl->id]) }}" class="fa fa-sync fa-spin"></a>
                      {{-- @endcan --}}
                      &nbsp;&nbsp;&nbsp;&nbsp;
                      {{-- @can('forceDelete',$trashedUrl) --}}
                      <a href="{{ route('forceDeleteUrlRedirect',['id'=>$trashedUrl->id]) }}" class="fa fa-trash" style="color: red"></a>
                      {{-- @endcan --}}
                    </td>
                </tr>
                    @endforeach
                  
                
                </tbody>
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
                        { "name": "Source URL" },
                        { "name": "Destination URL" },
                        { "name": "Date",  searching:false },
                        { "name": "Actions", "sorting":false, searching:false  }
              ]                    
            });
        });
    </script>
@endsection