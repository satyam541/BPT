@extends('cms.layouts.master')
@section('content')



 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Dashboard</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">Website Detail</li>
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
                    website detail List
                    </div>
                </div>
                <div class="card-body">
              <table id="example1">
                <thead>
                <tr>
                  <th>Country</th>
                  <th>Name</th>
                  <th>Contact_Number</th>
                  <th>Contact_Email</th>
                  <th>Address</th>
                  <th>
                    @can('restore',new App\Models\Websitedetail())
                    Actions
                    @endcan
                </th>
                </tr>
                </thead>
                <tbody>
                
                    @foreach ($websitedetails as $websitedetail)
                    <tr>
                        <td>{{$websitedetail->country->name}}</td>
                        <td>{{$websitedetail->name}}</td>
                        <td>{{$websitedetail->contact_number}}</td>
                         
                        <td>{{$websitedetail->contact_email}}</td>
                        <td>{{$websitedetail->address}}</td>
                    <td>
                      @can('update',$websitedetail)
                      <a href="{{ route('editWebsiteDetail',['websitedetail'=>$websitedetail->id]) }}" class="fa fa-edit"></a>
                      @endcan
                      @can('delete',$websitedetail)
                      <a href="" onclick="deleteItem('{{ route('deleteWebsiteDetail',['websitedetail'=>$websitedetail->id])}}')" class="fa fa-trash" style="color: red"></a>
                      @endcan
                    </td>
                </tr>
                    @endforeach
                  
                
                </tfoot>
              </table>
              @can('create',new App\Models\Websitedetail())
              <a id="add" href="{{route('createwebsiteDetail')}}" class="btn btn-success" style="">Add new Record</a>
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
            $('#example1').DataTable();
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