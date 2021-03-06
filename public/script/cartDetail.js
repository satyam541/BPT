
function submitCustomerForm()
{// error status 422
    var cartForm = $("#customerDetailForm");
    
    formData = cartForm.serialize();
    $.ajax({
        url: submitCustomerRoute,
        dataType:'json',
        data:formData,
        beforeSend:function(){
            cartForm.find('input').removeClass('error');
            cartForm.find("input,button").attr('title','').closest('.input-group').removeClass('error');
        },
        complete:function(){
            cartForm.find("input,button").prop('disabled',false);
        },
        success: function (result)
        {
            nextCartForm();
        },
        error: function(error){
            if(error.status == '422')
            {
                var response = error.responseJSON;
                var errors = response.errors;
                $.each(errors,function(index,value){
                    cartForm.find(".input"+index).attr('title',value).closest('.input-group').addClass('error');
                });
            }
        }
    });
}

function submitBillingForm()
{
    var cartForm = $("#billingDetailForm");
    formData = cartForm.serialize();
    $.ajax({
        url: submitBillingRoute,
        dataType:'json',
        data:formData,
        beforeSend:function(){
            cartForm.find('input').removeClass('error');
            cartForm.find("input,button").attr('title','').closest('.input-group').removeClass('error');
        },
        complete:function(){
            cartForm.find("input,button").prop('disabled',false);
        },
        success: function (result)
        {
            if(result.rowId)
            {
                $("#delegateDetailForm").find('input[name="rowId"]').val(result.rowId);
                // console.log(result.rowId);
            }
            nextCartForm();
        },
        error: function(error){
            if(error.status == '422')
            {
                var response = error.responseJSON;
                var errors = response.errors;
                $.each(errors,function(index,value){
                    cartForm.find(".input"+index).attr('title',value).closest('.input-group').addClass('error');
                });
            }
        }
    });

}

function submitDelegateForm()
{
    var cartForm = $("#delegateDetailForm");
    formData = cartForm.serialize();
    $.ajax({
        url: submitDelegateRoute,
        dataType:'json',
        data:formData,
        beforeSend:function(){
            cartForm.find("input,button").prop('disabled',true);
            cartForm.find("input,button").attr('title','').closest('.input-group').removeClass('error');
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
            }
            else
            {
                nextCartForm();
            }
        },
        error: function(error){
            if(error.status == '422')
            {
                var response = error.responseJSON;
                var errors = response.errors;
                $.each(errors,function(index,value){
                    cartForm.find(".input"+index).attr('title',value).closest('.input-group').addClass('error');
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

    function prev() {
        var cartpopup = $('#popupForms');
        var numbering = $(".cart-topbar");
        var thiscartinfo = cartpopup.find('form.open');
        var thisNumbering = numbering.find('.topbar-menu.active');
        // var width = thiscartinfo.width();
        if (thiscartinfo.is(':first-child')) {
            //nextcartinfo = cartpopup.find('.cartinfo:last-cartinfo');
        } else {
            nextcartinfo = thiscartinfo.prev();
            prevNumbering = thisNumbering.prev();
            // cartpopup.find(".cartinfo").animate({
            //     left: '+=' + width + 'px'
            // }, 'slow');
            thiscartinfo.removeClass('open');
            nextcartinfo.addClass('open');
            thisNumbering.removeClass('active');
            prevNumbering.addClass('active');
        }
        // nextcartinfo.animate({left:'+='+width+'px'},'slow');
    }

    function openBox() {
        // var box = $(".cartpopup");
        // box.removeAttr("style");
        // box.show();
        // box.closest('.cart-section').show();
        // box.css('display', "-webkit-box");
        // box.css("animation", "jumpUp .5s forwards");

        $("#popupForms form").removeClass('open').first().addClass("open");
        $("section.billing-section").show();
        $("body").css('overflow','hidden');

    }

    function closeBox() {
        
        $("#popupForms form").removeClass('open');
        $("section.billing-section").hide();
        $("body").css("overflow","auto");
    }

    function submitCart() {
        window.location.href = summaryPageRoute;
    }