@extends('cms.layouts.master')
@section('content')


 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Blog/News Form</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{route('blogList')}}">Blog</a></li>
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
                <h3 class="card-title"> Form</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              {{-- {{dd($article)}} --}}
              {{Form::model($article,['route'=>$submitRoute,"files"=>"true"])}}
                <div class="card-body">
                    
                  <div class="form-group">
                    {{Form::label('title','Title')}}
                    {{Form::text('title',null,['id'=>'title','class'=>'form-control'])}}
                  </div>

                  <div class="form-group">
                    {{Form::label('summary','Summary')}}
                    {{ Form::textarea('summary',null,['class'=>'form-control','maxlength'=>'450'])}}
                    
                  </div>

                  <div class="form-group">
                    {{Form::label('content','Content')}}
                    {{Form::textarea('content',null,['class'=>'form-control  summernote'])}}
                  </div>

                  <div class="form-group">
                    {{Form::label('post_date','Post Date')}}
                    {{Form::date('post_date',null,['class'=>'form-control '])}}
                  </div>
                  
                  {{-- <div class="form-group">
                    {{Form::label('tag','Tag')}}
                    {{Form::select('tag[]',$list['tag'],$selectedTags,['tabindex'=>'-1','class'=>' form-control selectJS', 'placeholder'=>'Choose one'])}}
                    @error('tag[]')
                      <span class="invalid-feedback bg-danger text-sm" role="alert">
                          <span>{{ $message }}</span>
                      </span>
                    @enderror
                  </div> --}}

                  <div class="form-group">
                    {{Form::label('author','Author ')}}
                    {{Form::text('author',null,['class'=>'form-control'])}}
                  </div>

                  
                  <div class="form-group">
                    {{Form::label('image','Image')}}
                    {{Form::file('image',null,['class'=>'form-control'])}}
                    @if(!empty($article->image))
                    <img src="{{URL($article->image_path.$article->image)}}" class=" pad" style="max-width: 50%" />
                    @endif
                  </div>

                  <div class="form-group">
                    {{Form::label('type','ArticleType')}}
                    {!! Form::select('type', array('news' => 'news', 'blog' => 'blog'), null,['tabindex'=>'-1','id'=>'type','class'=>'form-control selectJS', 'placeholder'=>'Choose one']); !!}
                  </div>

                  <div class="form-group">
                    {{Form::label('reference','Reference')}}
                    {{Form::text('reference',null,['id'=>'reference','class'=>'form-control colorInputJs'])}}
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
                    {{Form::text('meta_keywords',null,['class'=>'form-control'])}}
                  </div>

                  <div class="form-group">
                    {{Form::label('is_popular','Is Popular')}}
                    <input type="checkbox" name="is_popular"@if($popular==true) checked @endif>
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

<script>
 $(document).ready( function() {
        $("#title,#type").on('input',function(){
        updateSlug();
        });
        function updateSlug()
{
    var article = $("#title").val();
    var type= $("#type").val();
    var slug = type+'/'+convertUrl(article);
    $("#reference").val(slug);
    
}
 });
$( function() {
            
            $( "#autoTag" ).autocomplete({
            source: "{{route('tagAutoComplete')}}",
            select: function(event, ui) {   
                  // location.href = ui.item.url;
              }
            });
      } );
      
        
</script>
            
@endsection