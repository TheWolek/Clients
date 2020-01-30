function ShowForm(id) {
    let form = 'form'+id
    //console.log(form)
    if(form == 'form1') {
        ToggleElement(form,true)
        ToggleElement('form2',false)
        ToggleElement('Results',true)
        ToggleElement('deleteOldSubmit',false)
        ToggleElement('deleteOldBtn',true)
        ToggleElement('deleteSelectedSubmit',false)
        ToggleElement('deleteSelectedBtn',true)
        $('#Results').html('')
        ToggleTab(1)
        $('#header').html('Znajdź klienta')
    } else {
        ToggleElement(form,true)
        ToggleElement('form1',false)
        ToggleElement('Results',true)
        ToggleElement('deleteOldSubmit',false)
        ToggleElement('deleteOldBtn',true)
        ToggleElement('deleteSelectedSubmit',false)
        ToggleElement('deleteSelectedBtn',true)
        $('#Results').html('')
        ToggleTab(2)
        $('#header').html('Dodaj klienta')
        $('#data_wizyty').val(GetSafeDate(0))
    }
}