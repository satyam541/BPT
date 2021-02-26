@extends('cms.layouts.master')
@section('content')



 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Manage Price</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">Manage Price</li>
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
        <div class="col-xs-12 col-sm-12 col-md-12">
          <div class="card card-primary card-outline">
              <div class="card-header">
                  <div class="card-title">
                    Manage Price List
                  </div>
              </div>
              <div class="card-body">
              <table id="example1">
                <thead>
                <tr>
                    <th>Course</th>
                    <th>Increment Type</th>
                    <th>Increment Amount</th>                      
                    <th>Location</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                
                    @foreach($courses as $item)
              
                    <tr>
                        {{Form::open(['route' => array('updateCustomPrice',$item->id)])}}
                        <td>{{ $item->name }}</td>                     
                        <td>
                            {{ Form::select('method',
                            [null => 'choose one','Increment'=>'Fixed Increment','Percentage'=>'Fixed %age','Price'=>'Fixed Price'],
                            $item->customSchedulePrice->method,
                            array('class'=>'form-control')
                            )}}
                        </td>
                        <td>
                             {{Form::text('amount', $item->customSchedulePrice->amount ,array('class' => 'form-control')) }}
                        </td>                          
                        <td>
                            <div class="btn-group">
                                <a href="{{ route('manageSchedulePrice',$item->id)}}" class="btn btn-warning">Locations</a>
                            </div>
                        </td>
                        <td>
                            <div class="btn-group">                                   
                                <button type="submit" class="btn btn-danger">Update</button>
                            </div>
                        </td>
                        {{ Form::close() }}

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
                        { "name": "course" },
                        { "name": "Increment Type", "sorting":false, searching:false },
                        { "name": "Increment Amount", "sorting":false, searching:false },
                        { "name": "Location", "sorting":false, searching:false },
                        { "name": "Action", "sorting":false, searching:false },
              ]                    
            });

    
        });
        
    </script>
@endsection