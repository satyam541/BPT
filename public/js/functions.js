
function checkConsent(button)
{
    var form = button.closest('form');
    var checkbox = $(form).find("input[name='contentConsent']");
    var error = checkbox.closest('div').find('.text-danger');
    if(checkbox.is(":checked"))
    {
        error.hide();
        return true;
    }
    error.show();
    event.preventDefault();
    return false;
}
