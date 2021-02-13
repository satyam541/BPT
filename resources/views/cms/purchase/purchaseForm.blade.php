@extends('cms.layouts.master')
@section('content')


 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Purchase Form</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="#">Purchase</a></li>
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
                <h3 class="card-title">Purchase Form</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              {{Form::open(['url' => route('insertPurchase')])}}
                <div class="card-body">
                    
                  <div class="form-group">
                    {{Form::label('name','First Name')}}
                    {{Form::text('name',null,['class'=>'form-control'])}}
                  </div>

                  <div class="form-group">
                    {{Form::label('lastname','Last Name')}}
                    {{Form::text('lastname',null,['class'=>'form-control'])}}
                    
                  </div>
                  
                  <div class="form-group">
                    {{Form::label('email','Email')}}
                    {{Form::text('email',null,['class'=>'form-control'])}}
                  </div>

                  <div class="form-group">
                    {{Form::label('Address1','Address 1')}}
                    {{Form::textarea('Address1',null,['class'=>'form-control ', 'rows'=>'4'])}}
                  </div>

                  <div class="form-group">
                    {{Form::label('Address2','Address 2')}}
                    {{Form::textarea('Address2',null,['class'=>'form-control ', 'rows'=>'4'])}}
                  </div>

                  <div class="form-group">
                    {{Form::label('Town','Town/City')}}
                    {{Form::text('Town',null,['class'=>'form-control'])}}
                  </div>

                  <div class="form-group">
                    {{Form::label('state','State')}}
                    {{Form::text('state',null,['class'=>'form-control'])}}
                  </div>

                  <div class="form-group">
                    {{Form::label('PostCode','Postcode')}}
                    {{Form::text('PostCode',null,['class'=>'form-control'])}}
                  </div>
                  
                </div>
                <!-- /.card-body -->
            </div>
            <div class="card card-primary">
                <div class="card-body">

                    <div class="form-group">
                        {{Form::label('courseId','Course')}}
                        <select class="form-control js-example-basic-multiple selectJS" id="coursesSelect" name="courseId" required="true" title="Please Select Course">
                                
                        @foreach($courses as $course)
                        
                            <option value="{{$course->id}}">{{$course->name}}</option>
                        @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        {{Form::label('country','Country')}}
                        <select class="form-control js-example-basic-multiple selectJS" id="countrySelect" name="country" required="true" title="Please Select Country">
                            
                        @foreach($countries as $country)
                        <option value="{{ $country->id }}">{{$country->name}}</option>
                        @endforeach
                        </select>
                    </div>

                    <div class="form-group" id="locations" style="display: none;">
                        {{Form::label('location','Location')}}
                        <select class="form-control" id="locationsSelect" name="location" ></select>
                    </div>

                    <div class="form-group" id="events" style="display: none;">
                        {{Form::label('events','Events')}}
                        <select class="form-control" id="eventsGet" name="events" >
                        </select>
                    </div>

                    <div class="form-group" style="display:none;" id="customInputs">
                        {{Form::label('customLocation','Location')}}
                        <input type="text" value="" class="form-control" id="customLocation" />
                    </div>

                    <div style="display:none;" class="form-group">
                        {{Form::label('eventDate','Event Date')}}
                    <input type="date" name="eventDate" value="" class="form-control" id="customEventDate" />
                    </div>

                    <div class="form-group" >
                        {{Form::label('currency','Currency')}}
                        
                        <select class="form-control" name="currency" required="true" id="currency">
                            <option value="GBP">GBP</option>
                            <option value="AED">AED</option>
                            <option value="USD">USD</option>
                            <option value="INR">INR</option>
                        </select>
                    </div>

                    <div class="form-group">
                        {{Form::label('price','Price in GBP')}}
                        <input type="number" name="price" value="" class="form-control" id="price" required="true" step=".01" />
                    </div>

                    <div class="form-group">
                        <input type="checkbox" id="applyVat" checked>
                        {{Form::label('applyVat','Apply Vat')}}
                    </div>
                    
                    <div class="form-group">
                        {{Form::label('vatPrice','Price Inclusive Vat ')}}
                        <input type="number" name="totalAmount" value="" class="form-control" id="totalAmount" required="true" step=".01" />
                        <input type="hidden" name="vatPercentage" id="vatPercentage"/>
                        <input type="hidden" name="vatAmount" id="vatAmount">
                    </div>


                </div>
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
    // $(document).ready(function() {
    //     $('.js-example-basic-multiple').select2();
    // });
</script>
<script type="text/javascript">

var previousPrice = 0;
    
    var previousSelectedPrice = 0;
    
    var locationId =  countryId =  courseId = '';

    var vatPercentage,applyVat = true, currencyRate = 1, selectedCurrencyCode = "GBP", priceInGBP;
    
jQuery(document).ready(function(){
    
    $("#coursesSelect").change(function(){
    
        courseId = $(this).val();
        
        
        getSchedule(locationId, countryId, courseId);
        
    });
    
    // $('#packageSelect').change(function(){
        
    //     var price = $(this).val();
        
    //     previousPrice = (previousPrice + parseFloat(price)) - previousSelectedPrice;
        
    //     $("#price").val(previousPrice);
        
    //     previousSelectedPrice = parseFloat(price);
        
    // });
    
    $("#currency").on('change',function(){
        var currency = $(this).val();
        $.ajax({
            method: "GET",
            url : "{{ url('cms/convert/currency') }}/"+currency,
            success: function(response)
            {
                currencyRate = response;
                selectedCurrencyCode = currency;
                    convertPrice(priceInGBP);
            }
        });

    });

    $("#applyVat").on('change',function(){
        applyVat = $("#applyVat").is(':checked');
        updateVatAmount();
    });

    $("#price").on('focusout',function(){
        updateVatAmount();
    });

    $('#countrySelect').change(function(){
        
        countryId = $(this).val();
        
        getSchedule(locationId, countryId, courseId);
        
        $.ajax({
            method: "POST",
            url: "{{ route('purchase_fetch_venue') }}",
            data: { countryId: countryId, _token: '{{ csrf_token() }}' },
            dataType: 'JSON',
            beforeSend: function(xhr){
                
            },
            success: function(res) {
                
                var jsonData = res;
                
                var location = '<option value="">Please Select Location</option>';
                
                var length = jsonData.length;
                if(length > 0 )
                {
                    for(var i = 0; i < length; i++) {
                        
                        location += '<option value="'+jsonData[i].name+'">'+jsonData[i].name+'</option>';
                    }
                    
                    $('#locationsSelect').html(location);
                    $('#locations').show();

                    $("#locationsSelect").attr("name","location");
                    $("#customLocation").attr("name","");
                    $("#customInputs").hide();
                }
                else
                {
                    enableManualInputs();
                }
                
            },
            complete: function() {
                resetVatAmount(countryId);
            },
            error: function(err) {
                console.log(err);
            }
        });
        
    });
    
    $('#locationsSelect').change(function(){
        
        locationId = $(this).val();
        
        getSchedule(locationId, countryId, courseId);
        
    });
    
    $('#eventsGet').change(function(){
        
        var eventsPrice = $(this).val();
        
        var splittedVal = eventsPrice.split("_");
        
        eventsPrice = +splittedVal['0'];
        priceInGBP = eventsPrice;
        convertPrice(priceInGBP);
        
        //$('#price').val( eventsPrice);
    });
    
});

function resetVatAmount(id)
{
    
    $.ajax({
            method: "GET",
            url: "{{url('/cms/country/select')}}/"+id,
            dataType: 'JSON',
            // async: false,
            beforeSend: function(xhr){},
            success: function(res) {
                // res = JSON.parse(res);
                updateVatRate(res.vat_percentage);
            },
            complete: {},
            error: function(err) {
                console.log(err);
            }
        });
}

function convertPrice(val)
{
    var price = val * currencyRate;
    updateVatAmount();
    $("#price").val(price.toFixed(2));
    $("#currencyCode").html(selectedCurrencyCode);
}

function enableManualInputs()
{
    $("#customInputs").show();
    $("#locations").hide();
    $("#customLocation").attr("name","location");
    if(locationId)
    {
        $("#customLocation").val(locationId);
    }
    $("#locationsSelect").attr("name","");
    $("#eventsGet").val("yes");
}

function updateVatRate(val)
{
    vatPercentage = +val;
    $("#vatPercentage").val(vatPercentage);
    $("#vatPercentageDisplay").html("("+vatPercentage+" %)");
    updateVatAmount();
}

function updateVatAmount()
{
    var price = $('#price').val();
    price = +price;
    if(applyVat)
    {
        vatAmount = price * (vatPercentage/100);
    }
    else
    {
        vatAmount = 0;
    }
    grandTotal = price + vatAmount;
    $("#vatAmount").val(vatAmount);
    $("#totalAmount").val(grandTotal.toFixed(2));
    return vatAmount;
}

function getSchedule(locationName , countryId , courseId ) {

    if( (courseId == '' ) || (courseId == undefined) ) {
        
        alert('Please Select Course');
        return false;
            
    }
    else if( (countryId == '' ) || (countryId == undefined) ) {
        
        alert('Please Select Country');
        return false;
            
    } 
    else if( (locationName == '') || (locationName == undefined) ) {
        
        alert('Please Select Location');
        return false;
        
    }
    else {
        
        $.ajax({
            method: "POST",
            url: "{{ route('purchase_fetch_schedule') }}",
            data: { _token: '<?= csrf_token(); ?>',  courseId: courseId, countryId: countryId, location: locationName },
            dataType: 'JSON',
            beforeSend: function(xhr){
                
            },
            success: function(res) {
                
                // var jsonData = JSON.parse(res);
                var jsonData = res;
                
                var length = jsonData.length;
                if(length < 1)
                {
                    return enableManualInputs();
                }
                var events = '<option value="">Select Date</option>';
                
                for(var i = 0; i < length; i++) {
                    
                    events += '<option value="'+
                    jsonData[i].response_discounted_price+
                    "_"+jsonData[i].response_date+
                    "_"+jsonData[i].event_time+
                    "_"+jsonData[i].id+
                    '">\n\
                                '+jsonData[i].response_date+" "+jsonData[i].event_time+" ( £"+jsonData[i].response_discounted_price+" )"+'\n\
                                </option>';
                    
                }
                
                $('#eventsGet').html(events);
                $('#events').show();
                
                
            },
            error: function(err) {
                console.log(err);
            }
        });
        
    }

}
</script>

@endsection