$(".quantityJS").on("change",function(){
    var courseRow = $(this).closest(".coursedataJS");
    var price = courseRow.find(".price").data("price");
    console.log(price);
    var quantity = $(this).val();
    console.log(quantity);
    var total = price*quantity;
    courseRow.find(".total").html(symbol+total).data('price',total);
    changeTotalValue(courseRow.closest('.panelJS'));
});

function changeTotalValue(panel)
{
    var amount = 0;
    var price = 0;
    var course = 0;
    panel.find(".coursedataJS").each(function(){
        quantity = $(this).find(".quantityJS").val();
        if(quantity > 0)
        {
            course++;
            amount += +quantity;
        }
        price += $(this).find(".total").data("price");
    });
    panel.find(".panel-titleJS").find(".amount").html(amount).data("amount",amount).data("course",course);
    panel.find(".panel-titleJS").find(".ks2").html(symbol+price).data("price",price);
    changeFinalValue();
}

function changeFinalValue()
{
    var course = 0;
    var price = 0;
    $(".panelJS .panel-titleJS").each(function(){
        course += $(this).find(".amount").data('course');
        price += $(this).find(".ks2").data("price");
    });

    $(".panel-footerJS .totalAmountJS").html(course);
    $("#totalPriceJS").html(symbol+price);

    updateDiscountCards(price);
}


function updateDiscountCards(price)
{
    var bronze = $(".BronzePassJS");
    var silver = $(".SilverPassJS");
    var gold = $(".GoldPassJS");

    // change spend more text(price) for all

    bronze.find('.spendMoreJS').data(symbol+(10000-price));
    silver.find('.spendMoreJS').data(symbol+(20000-price));
    gold.find('.spendMoreJS').data(symbol+(50000-price));

    // change all four amount
    var passPrice = price-(price/10);
    
    passPrice = passPrice.toFixed(2);
    
    bronze.find('.passPriceJS').html(symbol+passPrice);
    bronze.find('.savingPriceJS').html(symbol+(price-passPrice).toFixed(2));
    bronze.find('.remainingPriceJS').html(symbol+(10000-passPrice).toFixed(2));

    passPrice = price-(price/4);
    passPrice = passPrice.toFixed(2);
    silver.find('.normalPriceJS').html(symbol+price);
    silver.find('.passPriceJS').html(symbol+passPrice);
    silver.find('.savingPriceJS').html(symbol+(price-passPrice).toFixed(2));
    silver.find('.remainingPriceJS').html(symbol+(20000-passPrice).toFixed(2));

    passPrice = price-(price/2);
    passPrice = passPrice.toFixed(2);
    gold.find('.normalPriceJS').html(symbol+price);
    gold.find('.passPriceJS').html(symbol+passPrice);
    gold.find('.savingPriceJS').html(symbol+(price-passPrice).toFixed(2));
    gold.find('.remainingPriceJS').html(symbol+(50000-passPrice).toFixed(2));

    if(price < 10000)
    {
        // show spend more text for all
        // opacity reset all

        bronze.css("opacity",'1').find('.spendMoreJS').show();
        silver.css("opacity",'1').find('.spendMoreJS').show();
        gold.css("opacity",'1').find('.spendMoreJS').show();
    }
    else if(price < 20000)
    {
        // hide spend more text for bronze but rest show
        // opacity for bronze

        bronze.css("opacity",'.5').find('.spendMoreJS').hide();
        silver.css("opacity",'1').find('.spendMoreJS').show();
        gold.css("opacity",'1').find('.spendMoreJS').show();
    }
    else if(price < 50000)
    {
        // hide spend more text all but gold
        // opacity for all but gold

        bronze.css("opacity",'.5').find('.spendMoreJS').hide();
        silver.css("opacity",'.5').find('.spendMoreJS').hide();
        gold.css("opacity",'1').find('.spendMoreJS').show();
    }
    else {
        // hide spend more text for all
        // opacity for all

        bronze.css("opacity",'.5').find('.spendMoreJS').hide();
        silver.css("opacity",'.5').find('.spendMoreJS').hide();
        gold.css("opacity",'1').find('.spendMoreJS').hide();
    }
    // spen more (h3 span)
    // normalPriceJS,passPriceJS, savingPriceJS, remainingPriceJS
}