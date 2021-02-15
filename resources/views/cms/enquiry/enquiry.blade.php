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
              <li class="breadcrumb-item active">Enquiry</li>
            </ol>
          </div>
        </div>
      <!-- /.container-fluid -->
        <div class="box box-solid">
            <div class="box-header">
                <div class="row">
                    <div class="card col-md-12">
                        <div class="card-body">
                            <form action="" class="form-horizontal">
                <div class="box-header">Filter content</div>
                <div class="box-body">
                    <div class="form-group row">
                        {{Form::label('inputCourse','Course',['class'=>'col-sm-2 control-label'])}}
                        <div class="col-sm-4">
                            {{ Form::select('course',$list['courses'],$selectedCourse,['id'=>'inputCourse','class'=>'form-control selectJS', 'placeholder'=>'ALL'])}}
                        </div>
                    </div>
                    <div class="form-group row">
                        {{Form::label('inputCountry','Country',['class'=>'col-sm-2 control-label'])}}
                        <div class="col-sm-4">
                            {{ Form::select('country',$list['countries'],$selectedCountry,['id'=>'inputCountry','class'=>'form-control selectJS', 'placeholder'=>'ALL'])}}
                        </div>
                    </div>
                    <div class="form-group row">
                        {{Form::label('inputType','Type',['class'=>'col-sm-2 control-label'])}}
                            <div class="col-sm-4">
                                {{ Form::select('type',$list['types'],$selectedType,['id'=>'inputType','class'=>'form-control selectJS', 'placeholder'=>'ALL'])}}
                            </div>
                        </div>
                </div>
                <div class="box-footer">
                    <div class="col-sm-12 text-right">
                        <button class="btn btn-default">Search</button>
                    </div>
                </div>
            </form>
                    
           </div>
    
    
                <!-- /.card-header -->
                
                <div class="box-body no-padding">
                    
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
       $(".selectJS").select2({
                tags: true,
                tags: true,
                theme: "classic",
                width:'400px',
                tokenSeparators: [',', ' ']
});
 </script>
@endsection
