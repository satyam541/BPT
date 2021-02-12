@extends('cms.layouts.master')
@section('content')


 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Country Form</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="#">Country</a></li>
            <li class="breadcrumb-item"><a href="#">Form</a></li>
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
                <h3 class="card-title">Country Form</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              {{Form::model($country,['route'=>$submitRoute,"files"=>"true"])}}
                <div class="card-body">

                  <div class="form-group">
                    {{Form::label('name','Name')}}
                    {{Form::text('name',null,['class'=>'form-control'])}}
                  </div>

                  <div class="form-group">
                    {{Form::label('country_code','Country Code')}}
                    {{Form::text('country_code',null,['class'=>'form-control'])}}
                    
                  </div>
                  <div class="form-group">
                    {{Form::label('description','Description')}}
                    {{Form::textarea('description',null,['class'=>'form-control', 'id' => 'summernote'])}}
                  </div>

                  <div class="form-group">
                    {{Form::label('iso3','ISO 3')}}
                    {{Form::text('iso3',null,['class'=>'form-control'])}}
                  </div>

                  <div class="form-group">
                    {{Form::label('currency','Currency')}}
                    {{Form::text('currency',null,['class'=>'form-control'])}}
                  </div>
                  
                  <div class="form-group">
                    {{Form::label('currency_symbol','Currency Symbol')}}
                    {{Form::text('currency_symbol',htmlentities($country->currency_symbol),['class'=>'form-control','title'=>'HTML hashcode'])}}
                  </div>

                  <div class="form-group">
                    {{Form::label('currency_symbol_html','Currency Symbol Html')}}
                    {{Form::text('currency_symbol_html',htmlentities($country->currency_symbol_html),['class'=>'form-control'])}}
                  </div>

                  <div class="form-group">
                    {{Form::label('currency_title','Currency Title')}}
                    {{Form::text('currency_title',null,['class'=>'form-control'])}}
                  </div>

                  <div class="form-group">
                    {{Form::label('allow_po','allow po',['class'=>'mr-4'])}}
                    {{Form::checkbox('allow_po')}}
                  </div>

                  <div class="form-group">
                    {{Form::label('active','Is Active',['class'=>'mr-1'])}}
                    {{Form::checkbox('active')}}
                  </div>

                  <div class="form-group">
                    {{Form::label('charge_vat','charge vat',['class'=>'mr-1'])}}
                    {{Form::checkbox('charge_vat')}}
                  </div>

                  <div class="form-group">
                    {{Form::label('sales_tax_label','sales tax label')}}
                    {{Form::text('sales_tax_label',null,['class'=>'form-control'])}}
                  </div>
                  
                  <div class="form-group">
                    {{Form::label('exchange_rate','exchange rate')}}
                    {{Form::number('exchange_rate',null,['class'=>'form-control','step'=>'0.01','min'=>'0'])}}
                  </div>

                  <div class="form-group">
                    {{Form::label('sales_ratio','sales ratio')}}
                    {{Form::number('sales_ratio',null,['class'=>'form-control','step'=>'0.01'])}}
                  </div>

                  <div class="form-group">
                    {{Form::label('vat_percentage','vat percentage')}}
                    {{Form::number('vat_percentage',null,['class'=>'form-control'])}}
                  </div>

                  <div class="form-group">
                    {{Form::label('vat_amount','vat amount')}}
                    {{Form::number('vat_amount',null,['class'=>'form-control'])}}
                  </div>
                  
                  <div class="form-group">
                    {{Form::label('image','Flag Image')}}
                    {{Form::file('image',null,['class'=>'form-control'])}}
                    <img src="{{ $country->getImagePath() }}" class=" pad" style="max-width:50%"/>
                  </div>
                  
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