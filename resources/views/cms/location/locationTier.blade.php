@extends('cms.layouts.master')
@section('headerLinks')
@endsection
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
              <div class="card-title">
                Location List
              </div>
             
            </div>

              <!-- /.card-header -->
              <div class="card-body">
                    
                    <div class="row">  
                        @foreach ($data as $tier=>$locations)
                        
                        <div class="column col-sm-4">
                            <span class="card-title"><b>Tier: {{$tier}}</b></span>
                            @foreach ($locations as $location)
                            <ul class="connected-sortable droppable-area{{$tier}}">
                              <li class="draggable-item">{{$location->name}}</li>
                            </ul>
                            @endforeach
                        <br>
                        </div>
                          
                        @endforeach                          
                    </div>


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
            $( init );

function init() {
  $( ".droppable-area1, .droppable-area2, .droppable-area3" ).sortable({
      connectWith: ".connected-sortable",
      stack: '.connected-sortable ul'
    }).disableSelection();
}
            

        });
        
    </script>
@endsection