var URL = window.location.origin;
function addToCart(courseDisplayName,cartData,type,csrfToken) {
     $.ajax({
        url: URL+"/cart/addToCart",
        type: "post",
        data:{
            courseDisplayName: courseDisplayName,
            cartData: cartData,
            type:  type,
            _token: csrfToken,   
        },
        success: function(data)
        {
            window.location.href = URL+'/cart';  
        }
    })
     return false;


}

function updateCart(cartId,action,csrfToken) {
	$.ajax({
        url: URL+"/cart/updateCart",
        type: "post",
        data:{
        	cartId: cartId,
        	action: action,
            _token: csrfToken
        },
        success: function(data)
        {
        	$("#orders").load(location.href + " #orders");
        	$('#quantity').html(data.quantity);
        }
    })
}

function updateQty(cartId,action,csrfToken) {
	
	updateCart(cartId,action,csrfToken);
}

function removeCartItem(cartId,csrfToken) {
	$.ajax({
        url: URL+"/cart/removeCartItem",
        type: "post",
        data:{
        	cartId: cartId,
            _token: csrfToken
        },
        success: function(data)
        {
        	if(data != 0)
        	{
        		$("#orders").load(location.href + " #orders");
        		$('#quantity').html(data.quantity);
        	} else {
        		window.location.href = URL+'/cart';
        	}
        }
    })
}

function changePayDetails(PaymentMethod) {
    $("#PaymentMethod option[value='"+PaymentMethod+"']").prop("selected", true);
    if(PaymentMethod == 'Purchase Order') {
        $('#methodCard').hide();
        $('#methodPurchase').show();
    } else {
        $('#methodCard').show();
        $('#methodPurchase').hide();
    }
}

function checkAgree() {
    if(!$("#agree").is(':checked')) {
        alert("Please accept our terms and conditions");
        return false;
    }

}

function cancelOrder(csrfToken) {
    $.ajax({
        url: URL+"/cart/cancelOrder",
        type: "post",
        data:{
            _token: csrfToken
        },
        success: function(data)
        {
            window.location.href = URL+'/cart';
        }
    })
}