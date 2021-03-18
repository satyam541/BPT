var URL = window.location.origin;

function prev() {
    $('#stepOne').addClass('step-active');
    $('#stepTwo').removeClass('step-active');
    $('#one').removeClass('number-active').addClass('blue-active');
    $('#two').removeClass('blue-active'); 
}

function prevTwo() {
    $('#stepTwo').addClass('step-active');
    $('#stepThree').removeClass('step-active');
    $('#two').removeClass('number-active').addClass('blue-active');
    $('#three').removeClass('blue-active'); 
  
}
function stepFour() {
    $('#stepFour').addClass('step-active');
    $('#stepThree').hide().removeClass('step-active');
    $('#three').addClass('number-active').removeClass('blue-active');  
    $('#four').addClass('blue-active'); 
}

function submitCustomerForm()
{// error status 422
    var cartForm = $("#stepOne");
    
    formData = cartForm.serialize();
    $.ajax({
        url: submitCustomerRoute,
        dataType:'json',
        data:formData,
        beforeSend:function(){
            cartForm.find('input').removeClass('input-error');
            cartForm.find("input,button,select").attr('title','').closest('.input-container').removeClass('input-error');
        },
        complete:function(){
            cartForm.find("input,button").prop('disabled',false);
        },
        success: function (result)
        {
            $('#stepTwo').addClass('step-active');   
            $('#stepOne').hide().removeClass('step-active'); 
            $('#one').addClass('number-active').removeClass('blue-active');  
            $('#two').addClass('blue-active');  
          
        },
        error: function(error){
           
            if(error.status == '422')
            {
                var response = error.responseJSON;
                var errors = response.errors;
               
                $.each(errors,function(index,value){
                
               
                    if(index=="phone")
                    {  
                        cartForm.find(".telephone").attr('title',value).closest('.input-container').addClass('input-error');
                    }
                
                    cartForm.find(".input"+index).attr('title',value).closest('.input-container').addClass('input-error');
                });
            }
        }
    });
}

function submitBillingForm()
{
    var cartForm = $("#stepTwo");
    formData = cartForm.serialize();
    $.ajax({
        url: submitBillingRoute,
        dataType:'json',
        data:formData,
        beforeSend:function(){
            cartForm.find('input').removeClass('input-error');
            cartForm.find("input,button").attr('title','').closest('.input-container').removeClass('input-error');
        },
        complete:function(){
            cartForm.find("input,button").prop('disabled',false);
        },
        success: function (result)
        {
            if(result.rowId)
            {
                $("#stepThree").find('input[name="rowId"]').val(result.rowId);
                // console.log(result.rowId);
            }
            $('#stepThree').addClass('step-active');
            $('#stepTwo').hide().removeClass('step-active');
            $('#two').addClass('number-active').removeClass('blue-active');  
            $('#three').addClass('blue-active');  
        },
        error: function(error){
            if(error.status == '422')
            {
                var response = error.responseJSON;
                var errors = response.errors;
                // console.log(errors,response);
                $.each(errors,function(index,value){
                    cartForm.find(".input"+index).attr('title',value).closest('.input-container').addClass('input-error');
                });
            }
        }
    });

}

function submitDelegateForm()
{
    var cartForm = $("#stepThree");
    formData = cartForm.serialize();
    $.ajax({
        url: submitDelegateRoute,
        dataType:'json',
        data:formData,
        beforeSend:function(){
            cartForm.find("input,button").prop('disabled',true);
            cartForm.find("input,button").attr('title','').closest('.input-container').removeClass('input-error');
        },
        complete: function(){
            cartForm.find("input,button").prop('disabled',false);
        },
        success: function (result)
        {
            cartForm.find('input[type="text"]').val('');
            // goto next if status done else resubmit the form
            if(result.error)
            {
                if(result.error == '404')
                {
                    return location.reload();
                }
            }
            if(result.rowId)
            {
                if(result.content)
                {
                    cartForm.find('.detailJS').html(result.content);
                }
                cartForm.find('input[name="rowId"]').val(result.rowId);
                cartForm.find('input[name="delegate"]').val(result.delegate);
                cartForm.find('.headingJS span').html(result.delegate);
                cartForm.find('#delegate-detail').html(result.content);
                cartForm.find('#method span').html(result.method);
                cartForm.find('#course-name').html(result.courseName);
            }
            else
            {
                $.ajax({
                    url: summaryPageRoute,
                    dataType:'html',
                

                    success: function (result)
                    {
                        $('#stepFour').addClass('step-active');
                        $('#stepThree').hide().removeClass('step-active');
                        $('#three').addClass('number-active').removeClass('blue-active');  
                        $('#four').addClass('blue-active'); 
                        $('#stepFour').find('.group-input').html(result);
                    }
                });
            }
        },
        error: function(error){
            if(error.status == '422')
            {
                var response = error.responseJSON;
                var errors = response.errors;
                $.each(errors,function(index,value){
       
                    if(index=="phone")
                    { 
                        cartForm.find(".telephone").closest('.input-container').addClass('input-error');
                    }
                    cartForm.find(".input"+index).attr('title',value).closest('.input-container').addClass('input-error');
                });
            }
        }
    });
}
function switchPaymentMethod(value)
    {
        if(value == "card")
        {
            $(".inputcard_fees_in_percent").show();
            $(".inputpurchase").hide();
        }
        if(value == "purchase order")
        {
            $(".inputcard_fees_in_percent").hide();
            $(".inputpurchase").show();
        }
    }

    function cartFormSubmit(formType, button) {
        if (button != null) {
            consentValidation = checkConsent(button);
            if (consentValidation == false) {
                return false;
            }
        }
        switch(formType) {
        case "customer":
            submitCustomerForm();
            break;

        case "delegate":
            submitDelegateForm();
            break;

        case "billing":
            submitBillingForm();
            break;

        default:
            return false;
        }
    }

    function nextCartForm() {
        var cartpopup = $('#popupForms');
        var numbering = $(".cart-topbar");
        var thiscartinfo = cartpopup.find('form.open');
        var thisNumbering = numbering.find('.topbar-menu.active');
        // var width = thiscartinfo.width();
        if (thiscartinfo.is(':last-child')) {
            submitCart();
        } else {
            nextcartinfo = thiscartinfo.next();
            nextNumbering = thisNumbering.next();
            // cartpopup.find('.cartinfo').animate({
            //     left: '-=' + width + 'px'
            // }, 'slow');
            thiscartinfo.removeClass('open');
            nextcartinfo.addClass('open');
            thisNumbering.removeClass('active');
            nextNumbering.addClass('active');
        }
    }

    function checkAgree() {
        if($("#agree").is(':checked') == false){
            alert("Please accept our terms and conditions");
            return false;
        }else
        {
            $('#pay_form').submit();
        }
    
    }

    function cancelOrder(csrfToken) {
        $.ajax({
            url: URL+"/cart/content/clear",
            type: "get",
            data:{
                _token: csrfToken
            },
            success: function(response)
            {
                window.location.href = URL+"/cart";
            }
        })
    }

             
    function sameDelegate(checkDelegate) {
        
        $.ajax({
                url: customerData,
                type:'get',
                dataType: 'json',
                success: function(response)
                {
              
                    if(checkDelegate.checked) {

                       
                        $('.inputfirstname').val(response.customer.firstname);
                        $('.inputlastname').val(response.customer.lastname);
                        $('.tel').val(response.mobile);
                        $('.c_code').val(response.countrycode);
                        $('.code').text(response.phonecode);
                        $('.inputemail').val(response.customer.email);

                       
                      
                    } 

                }

            });
        
    }

    function sameBilling(checkBilling) {

        $.ajax({
                url: customerData,
                type:'get',
                dataType: 'json',
                success: function(response)
                {
                    
                   
                    var billing    = $('#stepTwo');
                    var BFirstName = billing.find("input[name='firstname']");
                    var BLastName  = billing.find("input[name='lastname']");
                
                    if(checkBilling.checked) {
                        
                        BFirstName.val(response.customer.firstname);
                        BLastName.val(response.customer.lastname);
    
                    } 
                  
                }
            });
        
    }


    // function submitCart() {
    //     window.location.href = summaryPageRoute;
    // }