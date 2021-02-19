@extends('cms.layouts.master')
@section('content')



 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Country</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">Country</li>
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
                Country List
              </div>
            </div>

              <!-- /.card-header -->
              <div class="card-body">
              <table id="example1">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>
                      @can('update',new App\Models\Country())
                      Actions
                      @endcan
                    </th>   
                  </tr>
                </thead>
                <tbody>
                
                    @foreach ($countries as $country)
                    <tr>
                      <td>{{$country->name}}</td>
                      <td>
                      @can('update',$country)
                      <a href="{{route('editCountry',['country_code'=>$country->country_code])}}" class="fa fa-edit"></a>
                      &nbsp;&nbsp;&nbsp;
                      @endcan
                      @can('delete',$country)
                      <a href=""onclick="deleteItem('{{ route('deleteCountry',['country_code'=>$country->country_code])}}')" class="fa fa-trash" style="color: red"></a>
                      @endcan
                      </td>
                    </tr>
                    @endforeach
                  
                
                </tfoot>
              </table>
              @can('create',new App\Models\Country())
              <a id="add" href="{{route('createCountry')}}" class="btn btn-success" style="">Add new Record</a>
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
                        { "name": "Actions", "sorting":false, searching:false }
              ]                    
            });

        });
        
    </script>
@endsection