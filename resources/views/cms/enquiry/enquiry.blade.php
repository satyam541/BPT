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
                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
              <li class="breadcrumb-item active">Enquiry</li>
            </ol>
          </div>
        </div>
      <!-- /.container-fluid -->
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="card card-primary card-outline">

                <div class="card-header">
                    <div class="card-title">
                        Filter content
                    </div>
                </div>
                <div class="card-body">
                            <form action="" class="form-horizontal">
                
                <div class="box-body">
                    <div class="form-group row">
                        {{Form::label('inputCourse','Course',['class'=>'col-sm-2 control-label'])}}
                        <div class="col-sm-4">
                            {{ Form::select('course',$list['courses'],$selectedCourse,['tabindex'=>'-1','id'=>'inputCourse','class'=>'form-control select', 'placeholder'=>'ALL'])}}
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        {{Form::label('inputType','Type',['class'=>'col-sm-2 control-label'])}}
                            <div class="col-sm-4">
                                {{ Form::select('type',$list['types'],$selectedType,['tabindex'=>'-1','id'=>'inputType','class'=>'form-control select', 'placeholder'=>'ALL'])}}
                            </div>
                        </div>
                </div>
                <div class="col-sm-12 text-right">
                    <button class="btn btn-primary" style="margin-bottom:20px">Search</button>
                </div>
           </form>
        </div>
    </div>
</div>
</div>
    
                <!-- /.card-header -->
                
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <div class="card-title">
                            Enquiry List
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive" style="background-color: white">
                                <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Name</th>
                                    <th>Course</th>
                                    <th>Country</th>
                                    <th>Type</th>
                                    <th>Detail</th>
                                </tr>        
                            </thead>
                            <tbody>
                                   
                                 
                                @php
                                $i = ($enquiries->perPage() * $enquiries->currentPage()) - ($enquiries->perPage() - 1);
                                @endphp

                             @foreach($enquiries as  $index => $enquiry)
                             <tr>
                                 <td> {{ $enquiry->created_at->format('d-m-Y')}}</td>
                                 <td>{{$enquiry->name}}</td>
                                 <td>{{$enquiry->course}}</td>
                                 <td>{{ $enquiry->country->name }}</td>
                                 <td>{{$enquiry->type}}</td>
                               
                                  <td><a href="{{ route('enquirydetail',['id'=>$enquiry->id]) }}" class="btn btn-primary" onclick="">Detail</a></td> 
                             </tr>
                             @endforeach
                             
                         </tbody>
                        </table>
 </div>
</div>
<div class="box-footer clear-fix small-pagination">
    {{-- @can('create',new App\Models\Permission) --}}
    {{-- <a id="add" href="" class="btn btn-success" style="">Add new record</a> --}}
   {{-- @endcan --}}
      
{{ $enquiries->links() }}
   </div>
</div>

</section>
</div>
 @endsection

 @section('footer')
<script>
    $('.select').select2();
    </script>
@endsection
