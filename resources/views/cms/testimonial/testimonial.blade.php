@extends('cms.layouts.master')
@section('content')



 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Testimonial</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">Testimonial</li>
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
              <div class="card-title">
                Testimonial List
              </div>
            </div>

              <!-- /.card-header -->
              <div class="card-body">      
                <table id="example1">
                <thead>
                <tr>
                  <th>S No</th>
                  <th>Author</th>
                  <th>Location</th>
                  <th>Date</th>

                  <th>
                    @can('restore',new App\Models\Testimonial())
                    Actions
                    @endcan
                </th>
                </tr>
                </thead>
                <tbody>
                
                    @foreach ($testimonials as $testimonial)
                    <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$testimonial->author}}</td>
                    <td>{{$testimonial->location}}</td>
                    <td>{{$testimonial->post_date}}</td>
                    @can('update',$testimonial)
                    <td><a href="{{ route('editTestimonial',$testimonial->id) }}" class="fa fa-edit"></a>
                      @endcan
                      @can('delete',$testimonial)
                    <a href="#" onclick="deleteItem('{{ route('deleteTestimonial',$testimonial->id)}}')" class="fa fa-trash" style="color: red"></a>
                  @endcan  
                  </td>
                </tr>
                    @endforeach
                  
                
                </tfoot>
              </table>
              @can('create',new App\Models\Testimonial())
              <a id="add" href="{{route('createTestimonial')}}" class="btn btn-success" style="">Add new Record</a>
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
                { "name": "S No"},
                { "name": "Author"},
                { "name": "Location"},
                { "name": "Date", "sorting":false, searching:false  },
                { "name": "Actions", "sorting":false, searching:false  }
              ]
            });
        });
    </script>
@endsection