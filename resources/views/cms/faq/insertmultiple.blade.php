@extends('cms.layouts.master')
@section('content')


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Multiple FAQ</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">FAQ Form</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-md-12">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <div class="card-title">FAQ Form</div>
                                <div class="card-tools">
                                    <a class="btn btn-danger" onclick="addQASet()">Add Faq</a>
                                </div>
                            </div>
                            {{ Form::open(['route' => 'insertMultipleFaq']) }}
                            {{ Form::hidden('faq_id[]', null) }}

                            <div class="card-body">
                                <div class="form-group row">
                                    {{ Form::label('courses', 'Courses', ['class' => 'col-md-3 col-form-label text-right']) }}
                                    <div class="col-md-9">
                                        {{ Form::select('courses[]', $courses, [], ['class' => 'form-control selectJS', 'required' => 'required', 'multiple' => 'multiple', 'title' => 'Select Courses']) }}
                                    </div>
                                </div>
                                <div id="faq-container" class="">
                                    <div class=" qa-set-row ">
                                        <div class=" qa-set-row">
                                            <div class="col-xs-12 no-padding">
                                                {{-- @can('delete', new App\Models\Faq()) --}}
                                                <a class="btn btn-danger pull-right margin-bottom"
                                                    onclick="removethisSet(this)">
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                                {{-- @endcan --}}
                                            </div>
                                            <div class="form-group row">
                                                {{ Form::hidden('faq_id[]', null) }}
                                                {{ Form::label('question', 'Question', ['class' => 'col-md-3 col-form-label text-right']) }}

                                                <div class="col-md-9">
                                                    {{ Form::textarea('question[]', null, ['class' => 'form-control summernote ']) }}
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                {{ Form::label('answer', 'Answer', ['class' => 'col-md-3 col-form-label text-right']) }}

                                                <div class="col-md-9">
                                                    {{ Form::textarea('answer[]', null, ['class' => 'form-control summernote ']) }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div><!-- .qa set row -->

                            <div class="card-footer">
                                <input type="submit" class="btn btn-primary" value="Submit">
                            </div>
                            {{ Form::close() }}
                        </div>
                        <!-- /.card-body -->
                    </div>
                    @if (!empty($course->id))
                        @php
                            $faqModule = $course;
                            $module_type = 'course';
                        @endphp
                        @include('cms.layouts.faqForm')
                    @endif
                </div>
                <div style="display:none;">
                    <div id="qa-set" class=" qa-set-row ">
                        <div class="col-xs-12 no-padding">
                            <a class="btn btn-danger pull-right margin-bottom" onclick="removeQASet(this)">
                                <i class="fa fa-trash"></i>
                            </a>
                        </div>
                        <div class="form-group row">
                            {{ Form::hidden('faq_id[]', null) }}
                            {{ Form::label('question', 'Question', ['class' => 'col-md-3 col-form-label text-right']) }}

                            <div class="col-md-9">
                                {{ Form::textarea('question[]', null, ['class' => 'form-control summernote']) }}
                            </div>
                        </div>

                        <div class="form-group row">
                            {{ Form::label('answer', 'Answer', ['class' => 'col-md-3 col-form-label text-right']) }}

                            <div class="col-md-9">
                                {{ Form::textarea('answer[]', null, ['class' => 'form-control summernote']) }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- /.content-wrapper -->
@endsection

@section('footer')

    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/js/select2.min.js"></script>
    <script>
        // $(document).ready(function() {
        //     $('.js-example-basic-single').select2();
        // });
        // if (typeof faqMakeSortable === 'function') {
        //     $(document).ready(faqMakeSortable());
        // }


        // $(document).ready(function() {
        //     $("#name").on('focusout', function() {
        //         updateSlug();
        //     });
            // $("#topic_id").on('change',function(){
            //     retrieveCategorySlug();
            // });
            //categorySlug
        // });

        function removethisSet(elm) {
            $(elm).closest('.qa-set-row').remove();
        }

        // function updateSlug() {
        //     var str = $("#name").val();
        //     var slug = convertUrl(str);
        //     $("#reference").val(slug);
            // var categorySlug = $("#categorySlug").val();
            // $("#reference").val(categorySlug+"/"+slug);

        // }

        function addQASet() {
            faqTemplate = $('#qa-set').clone();
            faqContainer = $("#faq-container");
            faqTemplate.attr('id', '');
            var textarea = faqTemplate.find('textarea');
            faqTemplate.appendTo(faqContainer);
        }

        function removeQASet(element, deleteUrl = null) {
            // remove should remove element and item from db as well
            var sure = true;

            if (deleteUrl != null)
                sure = deleteItem(deleteUrl);

            if (sure)
                $(element).closest('.qa-set-row').remove();
        }

        function changePosition(requestData) {
            success = $('#success_type');
            error = $("#error_type");
            success.find('span').html(" faq sort saved !");
            error.find('span').html(" faq sort fail !");
            $.ajax({
                url: '{{ route('sortFaq') }}',
                type: 'POST',
                data: requestData.data,
                headers: {
                    'X-CSRF-TOKEN': $("meta[name='token']").attr('content')
                },
                success: function(data) {
                    success.fadeIn('slow', function() {
                        success.delay(3000).fadeOut();
                    });
                },
                error: function() {
                    error.fadeIn('slow', function() {
                        error.delay(3000).fadeOut();
                    });
                }
            });
        }

        function faqMakeSortable() {
            var sortableTable = $('.sortable');

            if (sortableTable.find('.qa-set-row').length < 2) {
                return false;
            }

            sortableTable.sortable({
                handle: '.sortable-handle',
                helper: 'clone',
                forceHelperSize: true,
                axis: 'y',
                items: '.qa-set-row',
                start: function(e, ui) {
                    // tiny mce stop working on sort action
                    // so , it require re init for all element 
                    // $(ui.item).find('.summernote').each(function() {
                    //     tinyMCE.execCommand('mceRemoveEditor', false, $(this).attr('id'));
                    // });
                },
                stop: function(e, ui) {
                    // $(ui.item).find('.summernote').each(function() {
                    //     tinyMCE.execCommand('mceAddEditor', true, $(this).attr('id'));
                    // });
                },
                update: function(event, ui) {
                    var serializeData = $(this).sortable("serialize");
                    console.log(serializeData);
                    changePosition({
                        data: serializeData
                    });
                },
            });

        }

    </script>
@endsection
