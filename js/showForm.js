function ShowForm(id) {
    let form = 'form'+id
    console.log(form)
    document.getElementById('formAdd').style.display='none'
    if(form == 'form1') {
        document.getElementById(form).style.display = 'block'
        document.getElementById('form2').style.display = 'none'
        document.getElementById('nav-1').className += ' active'
        document.getElementById('nav-2').className = 'nav-link'
    } else {
        document.getElementById(form).style.display = 'block'
        document.getElementById('form1').style.display = 'none'
        document.getElementById('data_wizyty').value = GetSafeDate(0)
        document.getElementById('nav-2').className += ' active'
        document.getElementById('nav-1').className = 'nav-link'
    }
}

function FormSetDate(mode) {
    let date = GetSafeDate(mode)
    document.getElementsByName('data_wizyty')[0].value = date
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