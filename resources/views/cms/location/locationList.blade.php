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
              <span class="message" id="success_type"></span>
              <div class="card-title col-sm-12">
                Location List
                <div class="popular">
                  Popular
              </div>
              <br>
                                        
                <div class="onoffswitch">
                <input type="checkbox" name="popular" class="onoffswitch-checkbox" id="myonoffswitch" tabindex="0">
                <label class="onoffswitch-label" for="myonoffswitch">
                    <span class="onoffswitch-inner"></span>
                    <span class="onoffswitch-switch"></span>
                
                </label>
                
            </div>
              
          </div>  
        </div>
              <!-- /.card-header -->
              <div class="card-body">
                
              <table id="example1">
                <thead>
                <tr>
                  <th>Name</th>
                  <th>Country</th>
                  <th>Popular</th>
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
                      <td>@if ($location->popular->exists)<span style="display: none">.</span> @endif<input type="checkbox" value="{{$location->id}}" @if ($location->popular->exists) checked @endif class="popularLocation"  name="is_popular"></td>
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
      success = $('#success_type');
        $(document).ready(function(){
             var table=$('#example1').DataTable({
              "columns": [
                        { "name": "Name" },
                        { "name": "Country" },
                        { "name": "Popular", "sorting":false, searching:false },
                        { "name": "Actions", "sorting":false, searching:false }
              ]                    
            });
            $('tbody').on('click','.popularLocation',function(){
              var id=$(this).val();
              var checked=$(this).attr('checked');
              var that = this;
              $.ajax({
                url:'{{route('locationPopular')}}',
                data:{locationId:id,checked:checked},
                type:'post',
                headers: {
                'X-CSRF-TOKEN': $("meta[name='token']").attr('content')
            },
            success: function(data) {
              if(data=='removed'){
                $(that).attr('checked',false);
              }
              else{
                $(that).attr("checked", true);
              }
                    success.fadeIn('slow', function(){

                        toastr.success('successfully '+data);
                        success.delay(3000).fadeOut();
                        location.reload(); 
                    });
                }
            
              });
            });
            $('#myonoffswitch').on('change',function(){
         
      
         if($(this).is(':checked')){
             $.fn.dataTable.ext.search.push(
                 function(settings, data, dataIndex) {  

  return data[2] 
     }
         )
              }
              else {
$.fn.dataTable.ext.search.pop()
}
table.draw()
     }); 
        });
        
    </script>
@endsection