$(document).ready(function(){

    $("#scheduleLinks a").click(function(){
        if($(this).data('target') != "online")
        {event.preventDefault();}
        if($(this).hasClass('active'))
        {
            return false;
        }
        else
        {
            displaySchedules($(this).data('target'));
        }
        window.location.href = $(this).attr("href");
    });
    
    if(defaultMethod)
    {
        // alert(defaultMethod);
        displaySchedules(defaultMethod);
    }
    else
    {
    displaySchedules('classroom');
    }

    $("#onsite-block .select-emp input").click(highlightSelectedOption);

    $("#online-block .feature-tickbox input[type='checkbox']").on('change',updateOnlinePrice);
});



function displaySchedules(method)
{
    hideAllSchedules();
    $("#scheduleLinks a").removeClass('active');
    $("#"+method).addClass('active');
    switch(method)
    {
        case 'classroom':
            displayClassroomSchedules();
            break;
        case 'virtual' :
            displayVirtualSchedules();
            break;
        case 'online' :
            displayOnlineSchedules();
            break;
        case 'onsite' :
            displayOnsiteSchedules();
            break;
        // default :
        //     alert('can not switch to '+method);
        //     break;
    }
}

function hideAllSchedules()
{
    $("#schedule-filter").hide();
    $("#virtual-label").hide();
    $("#onsite-label").hide();
    $("#online-label").hide();
    $("#classroom-block").hide();
    $("#virtual-block").hide();
    $("#online-block").hide();
    $("#onsite-block").hide();
}

function displayClassroomSchedules()
{
    $("#schedule-filter").show();
    $("#classroom-block").show();
}

function displayVirtualSchedules()
{
  
    $("#virtual-label").show();
    $("#virtual-block").show();
}

function displayOnlineSchedules()
{
    $("#online-label").show();
    $("#online-block").show();
}

function displayOnsiteSchedules()
{
    $("#onsite-label").show();
    $("#onsite-block").show();
    displayFirstOnsiteForm();
}

function displayFirstOnsiteForm()
{
    if(event)
    {
        event.preventDefault();
    }
    $("#onsite-block .onsite-booking").hide();
    $("#onsite-block .onsite-booking").first().show();
}

function displaySecondOnsiteForm()
{
    event.preventDefault();
    // name=$('#name').val();
    // alert(name);
   
    if ($('#name').val() == ''  ) {
        $('#name').css('border', '1px solid #fb5050');
    
         return false;
     }

     if($('#delegates').val()=='')
     { 
         $('#error-delegate').css('color', '#fb5050');
        $('#error-delegate').show();
         return false;
     }
   

    $("#onsite-block .onsite-booking").show();
    $("#onsite-block .onsite-booking").first().hide();
}

function displayerror()
{

    if ($('#phone').val() == ''  ) {
        $('#phone').css('border', '1px solid #fb5050');
    
         return false;
     }
    if($('#time').val()=='')
    { 
        $('#error-time').css('color', '#fb5050');
       $('#error-time').show();
        return false;
    }

  
}
/**
 * update data of virtual box for the selected virtual event
 */
function displayVirtualDetail()
{
    event.preventDefault();
    var detailBox = $("#virtual-block .virtual-block");
    var priceBox = $("#virtual-block .virtual-dates");
    var date = $(this).data('date');
    var price = $(this).data('price');
    var id = $(this).data('id');
    detailBox.find(".v-date p").html(date);
    detailBox.find(".price-bar span").html(price);
    var link = detailBox.find(".buttons .bookNow");
    var hyperlink = link.data('href');
    hyperlink = hyperlink.replace('-id-',id);
    link.attr('href',hyperlink);

    priceBox.hide();
    detailBox.show();
}

function displayVirtualDates()
{
    event.preventDefault();
    var detailBox = $("#virtual-block .virtual-block");
    var priceBox = $("#virtual-block .virtual-dates");
    detailBox.hide();
    priceBox.show();
}

function highlightSelectedOption()
{
    $("#onsite-block .select-emp").removeClass('active');
    $("#onsite-block .select-emp input[type='radio']:checked").closest('.select-emp').addClass('active');
}

function updateOnlinePrice()
{
    var selected = $("#online-block .feature-tickbox input:checked");
    var addon = $(".foundation-content .addons-price");
    var total = $(".foundation-content .total-price");
    var onlinePrice = parseInt(total.data('onlineprice'));
    var addonsPrice = 0;
    $.each(selected,function(index,val){
        onlinePrice += parseInt($(val).data('price'));
        addonsPrice += parseInt($(val).data('price'));
    });
    var totalprice = total;
    totalprice.html(parseInt(onlinePrice));
    addon.html(parseInt(addonsPrice));

   
    
}