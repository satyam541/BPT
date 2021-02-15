<!-- Content Wrapper. Contains page content -->

    <!-- Content Header (Page header) -->
    {{-- <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Resource Form</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="#">Resource</a></li>
            <li class="breadcrumb-item"><a href="#">Form</a></li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div> --}}
    <!-- /.content-header -->

    <!-- Main content -->

    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                    <div class="card-title">FAQ</div>
                    <div class="card-tools">
                        <a class="btn btn-danger" onclick="addQASet()">Add Faq</a>
                    </div>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                {{ Form::open(['route' => 'insertFaq']) }}
                {{ Form::hidden('module_id', $faqModule->id) }}
                {{ Form::hidden('module_type', $module_type) }}
                <div class="card-body">

                    <div id="faq-container" class="sortable">
                        @foreach ($faqModule->faqs as $faq)
                            <div class=" qa-set-row" id="id_{{ $faq->id }}">

                                <div class="panel card card-primary card-outline ">
                                    {{-- @can('view', new App\Models\Faq()) --}}
                                        <div class="card-header with-border">
                                            
                                            <div class="card-title sortable-handle">
                                                {{-- <i class="fa fa-ellipsis-v btn-sm btn sortable-handle" aria-hidden="true"></i> --}}
                                                {!! $faq->question !!}
                                            </div>
                                            <div class="card-tools pull-right">
                                                <a href="#collapse{{ $faq->id }}" class="btn btn-card-tools"
                                                    data-toggle="collapse"><i class="fa fa-plus"></i>
                                                </a>
                                            </div>
                                        </div>
                                    {{-- @endcan --}}

                                    <div id="collapse{{ $faq->id }}" class="panel-collapse collapse card-body"
                                        aria-expanded="false" style="">
                                        <div class="col-xs-12 no-padding">
                                            {{-- @can('delete', new App\Models\Faq()) --}}
                                                <a class="btn btn-danger pull-right margin-bottom"
                                                    onclick="removeQASet(this,'{{ route('deleteFaq', ['faq' => $faq->id]) }}')">
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                            {{-- @endcan --}}
                                        </div>
                                        <div class="form-group row">
                                            {{ Form::hidden('faq_id[]', $faq->id) }}
                                            {{ Form::label('question', 'Question', ['class' => 'col-md-3 col-form-label text-right']) }}

                                            <div class="col-md-9">
                                                {{ Form::textarea('question[]', $faq->question, ['class' => 'form-control summernote', 'required' => 'required']) }}
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            {{ Form::label('answer', 'Answer', ['class' => 'col-md-3 col-form-label text-right']) }}

                                            <div class="col-md-9">
                                                {{ Form::textarea('answer[]', $faq->answer, ['class' => 'form-control summernote']) }}
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div><!-- .qa set row -->
                        @endforeach
                    </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                {{ Form::close() }}
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->



    <!-- new faq add and remove script -->
    <script>
        function addQASet() {
            faqTemplate = $('#qa-set').clone();
            faqContainer = $("#faq-container");
            faqTemplate.attr('id', '');
            var textarea = faqTemplate.find('textarea').addClass('editable');
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
                    // $(ui.item).find('.editable').each(function() {
                    //     tinyMCE.execCommand('mceRemoveEditor', false, $(this).attr('id'));
                    // });
                },
                stop: function(e, ui) {
                    // $(ui.item).find('.editable').each(function() {
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
