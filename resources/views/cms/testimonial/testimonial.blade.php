@extends('cms.layouts.master')
@section('content')



 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">testimonial</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="#">testimonial</a></li>
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
           
          <div class="card">

            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1">
                <thead>
                <tr>
                  <th>S No</th>
                  <th>Author</th>
                  <th>Date</th>
                  <th>Location</th>
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                
                    @foreach ($testimonials as $testimonial)
                    <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$testimonial->author}}</td>
                    <td>{{$testimonial->post_date}}</td>
                    <td>{{$testimonial->location}}</td>
                    <td><a href="" class="fa fa-edit"></a>
                    <a href="" class="fa fa-trash" style="color: red"></a>
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
                { "name": "S No"},
                { "name": "Author"},
                { "name": "Date", "sorting":false, searching:false  },
                { "name": "Location"},
                { "name": "Actions", "sorting":false, searching:false  }
              ]
            });
        });
    </script>
@endsection