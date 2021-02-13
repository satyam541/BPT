@extends('cms.layouts.master')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Dashboard</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Permission</li>
            </ol>
          </div>
        </div>
      <!-- /.container-fluid -->
        <div class="box box-solid">
            <div class="box-header">
                <div class="row">
                    <div class="card col-md-12">
                        <div class="card-body">
                            <form action="" class="form-inline">
                                <div class="form-group col-md-4">
                                    {{Form::select('moduleName', $module, null, array_merge( ['id'=>'module','class'=>'form control js-example-basic-multiple'])) }}
    
                                </div>
                                <div class="form-group col-md-4">
                                    {{Form::select('access', $access, null, array_merge( ['id'=>'access','class'=>'form control  js-example-basic-multiple'])) }}
    
                                </div>
                                <div class="form-group col-sm-3">
                                        <button class="btn btn-default">Search</button>
                                </div>
                            </form>
                    
                    </div>
                </div>
            </div>
    
    
                <!-- /.card-header -->
                
                <div class="box-body no-padding">
                    
                    <div class="table-responsive" style="background-color: white">
                
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>module</th>
                                    <th>access</th>
                                    <th>Description</th>
                                    {{-- @can('update',new App\Models\Permission()) --}}
                                    <th>Edit</th>
                                    {{-- @endcan --}}
                                    {{-- @can('delete',new App\Models\Permission()) --}}
                                    <th>Delete</th>
                                    {{-- @endcan --}}
                                </tr>        
                            </thead>
                            <tbody>
                                @foreach($permissions as $permission)
                                <tr>
                                    <td>{{$permission->module->name ?? ''}}</td>
                                    <td>{{$permission->access}}</td>
                                    <td>{{$permission->description }}</td>
                                    {{-- @can('update',$permission) --}}
                                    <td><a href="{{ route('editPermission',['permission'=>$permission->id]) }}"><i class="fa fa-edit"></a></td>
                                    {{-- @endcan --}}
                                    {{-- @can('delete',$permission) --}}
                                     <td><a href="#" onclick="deleteItem(route('deletePermission'),'{{ $permission->id}}')"><i class="fa fa-trash text-red"></i></a></td>
                                    {{-- @endcan --}}
                                    </tr>
                                @endforeach
                                
                            </tbody>
                        </table>
 </div>
</div>
<div class="box-footer clear-fix small-pagination">
    {{-- @can('create',new App\Models\Permission) --}}
   {{-- <a href="{{ route('createPermission')}}" class="btn btn-github">add new Record</a> --}}
   {{-- @endcan --}}
      
{{ $permissions->links() }}
   </div>
</div>
</div>
</section>
 @endsection
@section('footer')
<script>
       $(".js-example-basic-multiple").select2({
                tags: true,
                tags: true,
                theme: "classic",
                width:'400px',
                tokenSeparators: [',', ' ']
});
 </script>
@endsection
