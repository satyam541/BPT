@extends('cms.layouts.master')
@section('headerLinks')
    <style>
         {
  padding: 0;
  margin: 0;
  cursor: default;
  color:#333;
  font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
}
.container {
  margin: 0 auto;
  padding: 0 20px;
  max-width: 900px;
  min-width: 300px;
}
.row {
  width:100%;
  overflow: none;
}
.column {
  float:left;
  width: 50%;
}
.connected-sortable {
  margin: 0 auto;
  list-style: none;
  width: 90%;
}

li.draggable-item {
  width: inherit;
  padding: 15px 20px;
  background-color: #f5f5f5;
  -webkit-transition: transform .25s ease-in-out;
  -moz-transition: transform .25s ease-in-out;
  -o-transition: transform .25s ease-in-out;
  transition: transform .25s ease-in-out;
  
  -webkit-transition: box-shadow .25s ease-in-out;
  -moz-transition: box-shadow .25s ease-in-out;
  -o-transition: box-shadow .25s ease-in-out;
  transition: box-shadow .25s ease-in-out;
  &:hover {
    cursor: pointer;
    background-color: #eaeaea;
  }
}
/* styles during drag */
li.draggable-item.ui-sortable-helper {
  background-color: #e5e5e5;
  -webkit-box-shadow: 0 0 8px rgba(53,41,41, .8);
  -moz-box-shadow: 0 0 8px rgba(53,41,41, .8);
  box-shadow: 0 0 8px rgba(53,41,41, .8);
  transform: scale(1.015);
  z-index: 100;
}
li.draggable-item.ui-sortable-placeholder {
  background-color: #ddd;
  -moz-box-shadow:    inset 0 0 10px #000000;
   -webkit-box-shadow: inset 0 0 10px #000000;
   box-shadow:         inset 0 0 10px #000000;
}
    </style>
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
              {{-- <div class="col-sm-16 text-right">
                <form action="{{Route('locationList')}}" method="get">
                  <label class="">
                    <input id="popular" name="popular"@if($checked!=null) checked @endif type="checkbox" data-toggle="toggle"> Only Popular
                  </label>
                  <input type="submit" name="submit" id="submit" style="visibility: hidden">
                </form>
              </div> --}}
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
          $('#popular').change(function(){
              $('#submit').click();
                });
            $('#example1').DataTable({
              "columns": [
                        { "name": "Name" },
                        { "name": "Country" },
                        { "name": "Actions", "sorting":false, searching:false }
              ]                    
            });


        });
        
    </script>
@endsection