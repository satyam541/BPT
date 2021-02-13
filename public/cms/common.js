/* clean submit query by
 * removing empty inputs from url */
var base_url = window.location.origin;
$("form[method='GET']").submit(function(){
    $("input").each(function(index, input){
        if($(input).val() == "") {
            $(input).attr("name", '');
        }
    });
});

$(document).ready(function(){

    $('.selectJS').selectpicker({
        "liveSearch" : true,
        "size" : 8,
        deselectAllText: 'Deselect All',
        styleBase: 'btn',
        style: 'btn-default',

    });

    
    // $("body").on('DOMSubtreeModified', ".selectJS", function() {
    //     $(this).selectpicker('refresh');
    // });
    
    paginationInit();
});

function paginationInit()
{
$(".small-pagination .pagination").addClass("no-margin pagination-sm pull-right");
}

function deleteItem(path)
{
    //module = module.toLowerCase();
    var sure = confirm('are you sure');
    if(!sure)
    {
        return false;
    }
    
    $.ajax({
        url:  path,
        type: 'POST',
        headers: { 'X-CSRF-TOKEN': $("meta[name='token']").attr('content') },
        dataType : 'html',
        success: function (response) {
            location.reload();       
        },
        error: function(response) {
            if(response.status == '404')
            {
                alert("Item not found");
            }
            else
            alert(response.statusText);
        }
    });
    return true;
}


    // allow only alphanumaric and round brackets 
    // convert everything else into hyphen
    function convertUrl(str)
    {
        str = str.toLowerCase();
        str = str.replace(/(?![a-z0-9 ])./gi, "");
        return str.replace(/(?![a-z0-9])./gi, "-");
    }