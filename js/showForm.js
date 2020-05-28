function ShowForm(id) {
    let form = 'form'+id
    if(form == 'form1') {
        ToggleElement(form,true)
        ToggleElement('form2',false)
        ToggleElement('Results',true)
        $('#Results').html('')
        ToggleTab(1)
        $('#header').html('Znajdź klienta')
    } else {
        ToggleElement(form,true)
        ToggleElement('form1',false)
        ToggleElement('Results',true)
        $('#Results').html('')
        ToggleTab(2)
        $('#header').html('Dodaj klienta')
    }
}