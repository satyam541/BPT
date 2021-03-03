function filterSubmit(input)
{
    event.preventDefault();
    var elm = $(input).closest('form');
    var course = $(elm).find("select[name='course']").val();
    var location = $(elm).find("select[name='location']").val();
    var deliveryMethod = $(elm).find("select[name='deliveryMethod']").val();
    if(($(elm).find("select[name='course']").attr("required") == "required" || $(elm).find("select[name='course']").attr("required")==true) && course == "")
    {
        var select = $(elm).find("select[name='course']");
        select.attr('title',"Please select your course");
        select.addClass('error');
        return false;
    }
    if(course == "" && location == "" && deliveryMethod == "")
    {
        var selectCourse = $(elm).find("select[name='course']");
        selectCourse.attr('title',"Please select your course");
        selectCourse.addClass('error');
        var selectLocation = $(elm).find("select[name='location']");
        selectLocation.attr('title',"Please select Location");
        selectLocation.addClass('error');
        var selectDeliveryMethod = $(elm).find("select[name='deliveryMethod']");
        selectDeliveryMethod.attr('title',"Please select Delivery Method");
        selectDeliveryMethod.addClass('error');
        return false;
    }
    $(elm).submit();
}