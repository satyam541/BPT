@extends('cms.layouts.master')
@section('content')


 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Online Course Form</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{route('onlinecourseList')}}">Online Course</a></li>
            <li class="breadcrumb-item active">Form</li>
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
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Online Course Form</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              {{Form::model($onlinecourse,['route'=>$submitRoute,'enctype'=>'multipart/form-data',"files"=>"true"])}}
                <div class="card-body">

                  <div class="form-group">
                    {{Form::label('online_course_name','Name')}}
                    {{Form::text('online_course_name',null,['class'=>'form-control','id'=>'name'])}}
                  </div>

                  <div class="form-group">
                    {{Form::label('course_id','Course')}}
                    {{Form::select('course_id',$list['courses'],$onlinecourse->course_id,['class'=>'form-control selectJS', 'placeholder'=>'Choose one','onchange'=>'updateSlug()','id'=>'courseName','tabindex'=>'-1'])}}
                    
                  </div>
                  <div class="form-group">
                    {{Form::label('reference','Reference')}}
                    {{Form::text('reference',null,['id'=>'reference','class'=>'form-control '])}}
                  </div>

                  <div class="form-group">
                    {{Form::label('heading','Heading')}}
                    {{Form::text('heading',null,['class'=>'form-control'])}}
                  </div>

                  <div class="form-group">
                    {{Form::label('meta_title','Meta Title')}}
                    {{Form::text('meta_title',null,['class'=>'form-control'])}}
                  </div>
                  
                  <div class="form-group">
                    {{Form::label('meta_description','Meta Description')}}
                    {{Form::text('meta_description',null,['class'=>'form-control'])}}
                  </div>

                  <div class="form-group">
                    {{Form::label('meta_keywords','Meta Keywords')}}
                    {{ Form::text('meta_keywords',null,['class'=>'form-control'])}}
                  </div>

                  <div class="form-group">
                    {{Form::label('duration','Duration')}}
                    {{Form::text('duration',null,['class'=>'form-control','placeholder'=>'5 Days'])}}
                  </div>

                  <div class="form-group">
                    {{Form::label('summary','Summary')}}
                    {{Form::textarea('summary',null,['class'=>'form-control summernote'])}}
                  </div>

                  <div class="form-group">
                    {{Form::label('tag_line','Tag Line')}}
                    {{Form::textarea('tag_line',null,['class'=>'form-control summernote'])}}
                  </div>

                  <div class="form-group">
                    {{Form::label('overview','Overview')}}
                    {{Form::textarea('overview',null,['class'=>'form-control summernote'])}}
                  </div>    

                  <div class="form-group">
                    {{Form::label('outline','Outline')}}
                    {{Form::textarea('outline',null,['class'=>'form-control summernote'])}}
                  </div>
                  

                  <div class="form-group">
                    {{Form::label('whats_included','what\'s Included')}}
                    {{Form::textarea('whats_included',null,['class'=>'form-control summernote'])}}
                  </div>

                  <div class="form-group">
                    {{Form::label('thumbnail','Thumbnail')}}
                    {{Form::file('thumbnail',null,['class'=>'form-control'])}}
                    <img src="{{ $onlinecourse->getThumbnailPath() }}" class=" pad" style="max-width:50%;" />
                  </div>
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                {{Form::close()}}
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

<script src="{{ url('script/jquery.fileupload.js') }}"></script>
<script src="{{ url('script/jquery.iframe-transport.js') }}"></script>
<script>
    if (typeof faqMakeSortable === 'function') {
        $(document).ready(faqMakeSortable());
    }
        
        
$(document).ready(function(){
    $("#name").on('input',function(){
        updateSlug();
    });
   
    // $("#topic_id").on('change',function(){
    //     retrieveCategorySlug();
    // });
    //categorySlug
});

function updateSlug()
{
    var venue = $("#name").val();
    var slug = '/'+convertUrl(venue);  
    var selectedCourse=$('#courseName').val();
    var courses=<?php echo json_encode($list['courses']); ?>;
    if(selectedCourse in courses){
      courseslug=courses[selectedCourse];
      slug=convertUrl(courseslug)+slug;
    }
    
    $("#reference").val(slug);
    
}
        var $uploadList = $("#file-upload-list");
        var $fileUpload = $('#fileupload');
        var vname = $("#vname").val();
        var fileName = '';
        var fileSize = '';
        $('input[type="file"]').change(function(e) {
            fileName = e.target.files[0].name;
            fileSize = parseInt(e.target.files[0].size / 1024 / 1024);
        });
        if ($uploadList.length > 0 && $fileUpload.length > 0) {
            var idSequence = 0;
            // A quick way setup - url is taken from the html tag
            $fileUpload.fileupload({
                maxChunkSize: 1000000,
                method: "POST",
                // Not supported yet
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                sequentialUploads: false,
                formData: {name: vname},
                progressall: function (e, data) {
                    var progress = parseInt(data.loaded / data.total * 100, 10);
                    $("#progress").text(progress + '%');
                },
                add: function (e, data) {
                    data._progress.theId = 'id_' + idSequence;
                    idSequence++;
                    $uploadList.append($('<li class="list-item" id="filename"></li>').html('<span class="filename menu-padding">' + fileName + '</span><span class="other-tabs menu-padding">'+fileSize+' MB </span><span id = "progress" class="other-tabs menu-padding" style="border-right:0;"></span>'));
                    data.submit();
                },
                done: function (e, data) {
                    $("#progress").text('Uploaded');
                    $('#videoName').val(data.result.newname);
                }
            });
        }
        </script>
@endsection