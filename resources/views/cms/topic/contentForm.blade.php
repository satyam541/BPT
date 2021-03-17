@extends('cms.layouts.master')
@section('content')


 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Topic Content Form</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('topicList') }}">Topic</a></li>
            <li class="breadcrumb-item"><a href="{{route('topicContentList',['topic'=>$topicDetail->topic_id])}}">Content</a></li>
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
                <h3 class="card-title">Topic Content Form</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              {{Form::model($topicDetail,['route'=>$submitRoute,"files"=>"true"])}}
                <div class="card-body">

                  <div class="form-group">
                    {{Form::label('topic_id','Topic Name')}}
                    {{Form::select('topic_id',$list['topics'],null,['class'=>'form-control selectJS', 'placeholder'=>'','tabindex'=>'-1'])}}
                  </div>
                      
                  <div class="form-group">
                    {{Form::label('country_id','Country')}}
                    {{ Form::select('country_id',$list['countries'],null,['class'=>'form-control selectJS', 'placeholder'=>'Choose one','tabindex'=>'-1'])}}
                  </div>

                  <div class="form-group">
                    {{Form::label('tag_line','Heading')}}
                    {{Form::textarea('tag_line',null,['class'=>'form-control '])}}
                  </div>

                  <div class="form-group">
                    {{Form::label('summary','Summary')}}
                    {{Form::textarea('summary',null,['class'=>'form-control summernote'])}}
                  </div>

                  <div class="form-group">
                    {{Form::label('detail','Detail')}}
                    {{Form::textarea('detail',null,['class'=>'form-control summernote'])}}
                  </div>

                  <div class="form-group">
                    {{Form::label('overview','Overview')}}
                    {{Form::textarea('overview',null,['class'=>'form-control summernote'])}}
                  </div>

                  <div class="form-group">
                    {{Form::label('whats_included','what\'s Included')}}
                    {{Form::textarea('whats_included',null,['class'=>'form-control summernote'])}}
                  </div>

                  <div class="form-group">
                    {{Form::label('pre_requities','Pre-requisite')}}
                    {{Form::textarea('pre_requities',null,['class'=>'form-control summernote'])}}
                  </div>

                  <div class="form-group">
                    {{Form::label('who_should_attend','who should attend')}}
                    {{Form::textarea('who_should_attend',null,['class'=>'form-control summernote'])}}
                  </div>

                  <div class="form-group">
                    {{Form::label('what_will_you_learn','What will you Learn')}}
                    {{Form::textarea('what_will_you_learn',null,['class'=>'form-control summernote'])}}
                  </div>

                  <div class="form-group">
                    {{Form::label('meta_title','Meta Title')}}
                    {{Form::text('meta_title',null,['class'=>'form-control'])}}
                  </div>

                  <div class="form-group">
                    {{Form::label('meta_keywords','Meta Keywords ')}}
                    {{Form::text('meta_keywords',null,['class'=>'form-control '])}}
                  </div>

                  <div class="form-group">
                    {{Form::label('meta_description','Meta Description')}}
                    {{Form::text('meta_description',null,['class'=>'form-control'])}}
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
