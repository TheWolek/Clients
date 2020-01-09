function ShowForm(id) {
    let form = 'form'+id
    //console.log(form)
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
        $('#data_wizyty').val(GetSafeDate(0))
    }
}

function FormSetDate(mode) {
    let date = GetSafeDate(mode)
    $('#data').val(date)

}

function GetSafeDate(mode) {
    let current_datetime
    current_datetime = new Date()
    let date
     
    if(mode == 0) {
        let month = current_datetime.getMonth() + 1
        let day = current_datetime.getDate()

        if(month < 10) month = "0" + month
        if(day < 10) day = "0" + day

        date = current_datetime.getFullYear() + '-' + month + '-' + day
    } else if(mode == -1) {
        let yesterday = new Date(current_datetime)
        yesterday.setDate(yesterday.getDate() -1)
        let month = yesterday.getMonth() + 1
        let day = yesterday.getDate()

        if(month < 10) month = '0' + month
        if(day < 10) day = '0' + day

        date = yesterday.getFullYear() + "-" + month + "-" + day
    } else {
        let tomorrow = new Date(current_datetime)
        tomorrow.setDate(tomorrow.getDate() +1)
        let month = tomorrow.getMonth() + 1
        let day = tomorrow.getDate()

        if(month < 10) month = '0' + month
        if(day < 10) day = '0' + day

        date = tomorrow.getFullYear() + "-" + month + "-" + day
    }
    return date
}