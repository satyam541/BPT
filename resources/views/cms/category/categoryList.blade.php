@extends('cms.layouts.master')
@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Category</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Category</li>
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

                        <div class="card card-primary card-outline">
                            <div class="card-header">
                                <div class="card-title col-sm-12">
                                    Category List
                                    <div class="popular">
                                        Polpular
                                    </div>
                                    <form action="{{Route('categoryList')}}" method="get">
                                        
                                        <div class="onoffswitch">
                                        <input type="checkbox" name="popular" @if($checked!=null) checked @endif class="onoffswitch-checkbox" id="myonoffswitch" tabindex="0">
                                        <label class="onoffswitch-label" for="myonoffswitch">
                                            <span class="onoffswitch-inner"></span>
                                            <span class="onoffswitch-switch"></span>
                                        
                                        </label>
                                        
                                    </div>
                                      <input type="submit" name="submit" id="submit" style="visibility: hidden">
                                    </form>
                                  </div>  
                                </div>
                                {{-- <div class="col-sm-6"> --}}
                                    
                            {{-- </div> --}}

                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="table table-responsive">
                                <table id="example1" >
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th class=" text-center">
                                                @can('update', new App\Models\Category())
                                                    Content
                                                @endcan
                                            </th>
                                            <th class=" text-center">
                                                @can('update', new App\Models\Category())
                                                    Faq's
                                                @endcan
                                            </th>
                                            <th class=" text-center">
                                                @can('update', new App\Models\Category())
                                                    Bulletpoints
                                                @endcan
                                            </th>
                                            <th class=" text-center">
                                                @can('update', new App\Models\Category())
                                                    Whats Included
                                                @endcan
                                            </th>
                                            <th class=" text-center">
                                                @can('update', new App\Models\Category())
                                                    Actions
                                                @endcan
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($categories as $category)
                                            <tr>
                                                <td>{{ $category->name }}</td>
                                                <td class=" text-center">
                                                    @can('update', $category)
                                                        <a href="{{ route('categoryContentList', ['category' => $category->id]) }}"
                                                            class=" fa fa-list"></a>
                                                    @endcan
                                                </td>
                                                <td class=" text-center">
                                                    @can('update', $category)
                                                        <a href="{{ route('faqList', ['type' => 'category', 'id' => $category->id]) }}"
                                                            class="far fa-question-circle"></a>
                                                    @endcan
                                                </td>
                                                <td class=" text-center">
                                                    @can('update', $category)
                                                        <a href="{{ route('categoryBulletPointList', ['module' => $category->id]) }}"
                                                            class=" fa fa-bullseye"></a>
                                                    @endcan
                                                </td>
                                                @can('update', $category)
                                                    <td class=" text-center"> <a href="{{ route('categoryWhatsIncludedList', ['module' => $category->id]) }}"
                                                            class=" fas fa-puzzle-piece"></a>
                                                    @endcan
                                                </td>
                                                <td class=" text-center">
                                                    @can('update', $category)
                                                        <a href="{{ Route('editCategory', ['category' => $category->id]) }}"
                                                            class="fa fa-edit"></a>
                                                    @endcan
                                                    @can('delete', $category)
                                                        <a href="#"
                                                            onclick="deleteItem('{{ route('deleteCategory', ['category' => $category->id]) }}')"
                                                            class="fa fa-trash" style="color: red"></a>
                                                    @endcan
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                @can('create', new App\Models\Category())
                                    <a id="add" href="{{ route('createCategory') }}" class="btn btn-success" style="">Add new
                                        Record</a>
                                @endcan
                            </div>
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
        $(document).ready(function() {
           
              
            $('#example1').DataTable({
                "columns": [{
                        "name": "Name"
                    },
                    {
                        "name": "Content",
                        "sorting": false,
                        searching: false
                    },
                    {
                        "name": "Faq",
                        "sorting": false,
                        searching: false
                    },
                    {
                        "name": "Bulletpoints",
                        "sorting": false,
                        searching: false
                    },
                    {
                        "name": "Whatsincluded",
                        "sorting": false,
                        searching: false
                    },
                    {
                        "name": "Actions",
                        "sorting": false,
                        searching: false
                    }
                ]

            });

            $('#add').hover(function() {
                $(this).removeClass('btn-success');
                $(this).addClass('btn-primary');
            }, function() {
                $(this).removeClass('btn-primary');
                $(this).addClass('btn-success');
            });
            $('#submit').on('click',function(){
        //    var country=$('#country').val();
     
      $.ajax({
        url:"{{route('categoryList')}}",
        data:{popular},
        type:'post',
        global:false,
        headers: {
                      'X-CSRF-TOKEN': $('meta[name="token"]').attr('content')
                  },
        success:function(response){
          if(response=='done'){
          location.reload(); 
          }
          else{
          alert('country code not available');
          }
        }
      });
      
    });
   
        });

    </script>
@endsection
