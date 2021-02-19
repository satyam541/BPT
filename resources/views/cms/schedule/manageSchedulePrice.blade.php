@extends('cms.layouts.master')
@section('content')
<section class="content">
    <div class="row">

        <div class="col-xs-12">
            <div class="box box-solid">
            <form action="" class="form-horizontal">
                <div class="box-header">Filter content</div>
                <div class="box-body">
                    <div class="form-group row">
                        {{Form::label('inputCourse','Course',['class'=>'col-sm-2 control-label'])}}
                        <div class="col-sm-4">
                            {{ Form::select('course',$list['courses'],$selectedCourse,['id'=>'inputCourse','class'=>'form-control selectJS', 'title'=>'Choose one'])}}
                        </div>
                    </div>
                    <div class="form-group row">
                        {{Form::label('inputCountry','Country',['class'=>'col-sm-2 control-label'])}}
                        <div class="col-sm-4">
                            {{ Form::select('country',$list['countries'],$selectedCountry,['id'=>'inputCountry','class'=>'form-control selectJS', 'title'=>'Choose one'])}}
                        </div>
                    </div>
                </div>
                <div class="box-footer">
                    <div class="col-sm-12 text-right">
                        <button class="btn btn-github">Search</button>
                    </div>
                </div>
            </form>
            </div>
        </div>
        
        <div class="col-xs-12">
            <div class="box box-solid">
                <div class="box-header">
                    {{$course->name}}
                </div>
                <div class="box-body ">
                    
                <table id="example1" class="table table-striped">
                    <thead>
                    <tr>
                        <th>Location</th>
                        <th>Increment Type</th>
                        <th>Increment Amount</th>     
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    
                    @foreach($locations as $location)
                        <tr>
                            {{Form::open(['route' => array('updateCustomPrice',$course->id,$location->venue->id)])}}
                            <td>{{ $location->name }}</td>
                            <td>
                                
                                {{ Form::select('method',
                                [null => 'choose one','Increment'=>'Fixed Increment','Percentage'=>'Fixed %age','Price'=>'Fixed Price'],
                                $location->customCoursePrice($course->id)->method,
                                array('class'=>'form-control')
                                )}}
                            </td>
                            <td>
                                 {{Form::text('amount',
                                  $location->customCoursePrice($course->id)->amount,
                                  array('class' => 'form-control')) }} 
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
                <div class="box-footer clear-fix small-pagination">
                
                </div>
            </div>
        </div>
        
    </div>
</section>
@endsection

@section('footerScripts')
<script>
    // jquery data table required to use this
$('#example1').DataTable({
  "paging": true,
  "lengthChange": true,
  "searching": true,
  "ordering": false,
  "info": true,
  "autoWidth": true,
  "lengthMenu": [[10, 25, 50,100, -1], [10, 25, 50, 100,"All"]]
});
</script>
@endsection