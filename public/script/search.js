function getquery(elm)
{
    event.preventDefault();
    var query ="";
    if($(elm).is('form'))
    {
        query = $(elm).find('#popupSearchInput').val();
    }
    else{
        query = $(elm).siblings('input[type="text"]').val();
    }
 
    if(query.length >= 1)
        {window.location.href = searchUrl+"?q="+query;}
    $(elm).prev().attr("placeholder","Add Term to Search");
    $(elm).prev().addClass("error");
}