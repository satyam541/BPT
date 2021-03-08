function updateCart(cartId,action) {
	$.ajax({
        url: updateCartRoute,
        dataType:'json',
        data:{
        	cartId: cartId,
            action: action
        },
        success: function(data)
        {
            $('#'+cartId).find('.quantityJS .digitJS').html(data.quantity);
            $('#'+cartId).find('.subTotalJS').html(data.price * data.quantity);
            $("#grandTotalJS").html(data.total);
        }
    });
}

function removeCartItem(cartId)
{
    event.preventDefault();
    sure = confirm('remove item from cart!');
    if(!sure)
    {
        return false;
    }
    console.log(cartId);
    $.ajax({
        url: removeCartItemRoute,
        dataType:'json',
        data:{
            cartId:cartId
        },
        success: function(result)
        {
            if(result.itemCount == 0)
            {
                location.reload();
            }
            else{
                $('#'+cartId).remove();
                location.reload();
            }
        }
    });
}