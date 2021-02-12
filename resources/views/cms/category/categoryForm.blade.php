@extends('cms.layouts.master')
@section('content-header')
<h1>
  Category
  <small>Form</small>
</h1>
@endsection
@section('content')
<div class="content-wrapper">
<section class="content">
    <div class="row">
            {{-- @if($category->name!=null)
            {{ Breadcrumbs::render('edit_category',$category) }}
        @else
            {{ Breadcrumbs::render('add_category') }}
        @endif --}}
        <div class="container-fluid">
            <div class="row">
              <!-- left column -->
              <div class="col-md-6">
                <!-- general form elements -->
                <div class="card card-primary">
                  <div class="card-header">
                    <h3 class="card-title">Category Form</h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  {{Form::model($category,['route'=>$submitRoute,"files"=>"true"])}}
                    <div class="card-body">
                      <div class="form-group">
                        {{Form::label('name','Name',['class'=>'col-md-3 col-form-label text-right'])}}
                        {{Form::text('name',null,['class'=>'form-control'])}}
                      </div>
                      <div class="form-group">
                        {{Form::label('reference','Reference',['class'=>'col-md-3 col-form-label text-right'])}}
                        {{Form::text('reference',null,['class'=>'form-control'])}}
                      </div>
                      <div class="form-group">
                        {{Form::label('tag_line','Tag Line',['class'=>'col-md-3 col-form-label text-right'])}}
                        {{Form::textarea('tag_line',null,['class'=>'form-control editable'])}}
                      </div>
                      <div class="form-group">
                        {{Form::label('is_online','Is Online',['class'=>'col-md-3 col-form-label text-right'])}}
                        {{Form::checkbox('is_online')}}
                      </div>
                      <div class="form-group">
                        {{Form::label('color_code','Color Code',['class'=>'col-md-3 col-form-label text-right'])}}
                        {{Form::text('color_code',null,['class'=>'form-control colorInputJs','title'=>'Any valid color_code that work for css'])}}
                      </div>
                      <div class="form-group">
                        {{Form::label('image','Image',['class'=>'col-md-3 col-form-label text-right'])}}
                        {{Form::file('image',null,['class'=>'form-control'])}}
                        <img src="{{ $category->getImagePath() }}" class=" pad" style="max-width: 50%" />
                      </div>
                      <div class="form-group">
                        {{Form::label('icon','Icon',['class'=>'col-md-3 col-form-label text-right'])}}
                        {{Form::file('icon',null,['class'=>'form-control'])}}
                        <img src="{{ $category->getIconPath() }}" class=" pad" style="max-width:50%;" />
                      </div>
                      <div class="form-group">
                        {{Form::label('is_technical','is technical',['class'=>'col-md-3 col-form-label text-right'])}}
                        {{Form::checkbox('is_technical')}}
                      </div>
                      <div class="form-group">
                        {{Form::label('published','Is Published',['class'=>'col-md-3 col-form-label text-right'])}}
                        {{Form::checkbox('published')}}
                      </div>

                    </div>
                    <!-- /.card-body -->
    
                    <div class="card-footer">
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                    {{Form::close()}}
                </div>
              </div>
            </div>
        </div>

    {{-- @if(!empty($category->id))
    @php $faqModule = $category; $module_type='category'; @endphp
        @include('cms.layouts.faqForm')
    @endif --}}
    </div><!-- row -->
   
</section>
</div>                    
@endsection
@section('footerScripts')

<script>
    $(document).ready(function(){

        $(".colorInputJs").on("change",function(){
            $(this).css("background-color",$(this).val());
        });
        
        $.each($(".colorInputJs"),function(index,object){
            $(object).css("background-color",$(object).val());
        });
        $('#name').on('focusout',function(){
            var str = $(this).val();
            slug = convertUrl(str);
            $("#reference").val(slug);
        });
    });
    
</script>
@endsection