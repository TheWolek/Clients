//zamiana daty mysql na js
function GoodDate(OldDate) {
    let date = new Date(OldDate)
    return getFormatedDate(date)
}

//poprawny format daty YYYY-MM-DD
function getFormatedDate(date) {
    let year = date.getFullYear()
    let month = date.getMonth() + 1
    let day = date.getDate()

    if(month < 10) month = "0" + month
    if(day < 10) day = "0" + day

    return year + "-" + month + "-" + day
}

//zamiana \n na <br>
function nl2br (str) {
    if (typeof str === 'undefined' || str === null) {
        return ''
    }
    var breakTag = '<br>'
    return (str + '').replace(/([^>\r\n]?)(\r\n|\n\r|\r|\n)/g, '$1' + breakTag + '$2')
}

//ustawienie daty do inputu przy szukaniu

function FormSetDate(mode) {
    let date = GetSafeDate(mode)
    $('#data').val(date)

}

//pobieranie daty 0 - dzisiaj, -1 - wczoraj, 1 - jutro
function GetSafeDate(mode) {
    let current_datetime
    current_datetime = new Date()
    let date
     
    if(mode == 0) {
        date = getFormatedDate(current_datetime)
    } else if(mode == -1) {
        let yesterday = new Date(current_datetime)
        yesterday.setDate(yesterday.getDate() -1)
        date = getFormatedDate(yesterday)
    } else {
        let tomorrow = new Date(current_datetime)
        tomorrow.setDate(tomorrow.getDate() +1)
        date = getFormatedDate(tomorrow)
    }
    return date
}

//submiting handler
$(function () {

    $("#find").on( "submit" , function(){
        // Intercept the form submission
        var formdata = $(this).serialize() // Serialize all form data
        ToggleElement('deleteOldSubmit',false)
        ToggleElement('deleteOldBtn',true)
        ToggleElement('deleteSelectedSubmit',false)
        ToggleElement('deleteSelectedBtn',true)
    
        // Post data to your PHP processing script
        // $.post( "/clients/backend/Find.php", formdata, function(data) {
        //     // Act upon the data returned, setting it to #success <div>
        //     $("#Results").html ('')
        //     $("#Results").html (data)
        // })
    
        let dane
        dane = $('#imie_nazwisko').val()
        $.post("http://localhost:3000/clients/find",{dane: dane}, (data) => {
            if(data==='done')
                console.log('success')
        })
        return false // Prevent the form from actually submitting
    })

    $("#findOld").on( "submit" , function(){
        // Intercept the form submission
        var formdata = $(this).serialize() // Serialize all form data
        ToggleElement('deleteOldSubmit',false)
        ToggleElement('deleteOldBtn',true)
        ToggleElement('deleteSelectedSubmit',false)
        ToggleElement('deleteSelectedBtn',true)
    
        // Post data to your PHP processing script
        $.post( "/clients/backend/FindOld.php", formdata, function(data) {
            // Act upon the data returned, setting it to #success <div>
            $("#Results").html ('')
            $("#Results").html (data)
        })
    
        return false // Prevent the form from actually submitting
    })

})