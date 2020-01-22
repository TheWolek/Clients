function ShowResults() {
    ToggleElement('form1',false)
    ToggleElement('form2',false)
    ToggleElement('Results',true)
    ToggleTab(0)
    $('#header').html('Baza klientów')

    $.ajax({
        url:'/clients/backend/displayAll.php',
        type:'GET',
        success:function(data){
            $("#Results").html(data)
        }
    })
}

function DeleteOldSure() {
    ToggleElement('deleteOldSubmit',true)
    ToggleElement('deleteOldBtn',false)
    $('#Results').html('')
    $('#Results').html('<p class="text-danger font-weight-bold">Wszystkie stare wizyty zostaną usunięte. Jesteś pewien?</p>')
}

function DeleteSelected() {
    const selected = document.getElementsByName('select')
    let selectedArr = []
    let output
    let bad = false
    selected.forEach((select) => {
        if(select.checked)
            selectedArr.push(select.value)
    })
    //console.log(selectedArr)
    let count = selectedArr.length

    document.getElementById('Results').innerHTML = ''
    if(count == 1) 
        output = 'Wybrana 1 wizyta zostanie usunięta. Jesteś pewien?'
    else if (count > 1)
        output = 'Wybrane ' + count + ' wizyt zostaną usuniętę. Jesteś pewien?'
    else {
        output = 'Nie wybrano żadnych wizyt'
        bad = true
    }
    document.getElementById('Results').innerHTML = '<p class="text-danger font-weight-bold">' + output + '</p>'

    if(!bad) {
        document.getElementById('deleteSelectedForm').action += '?selected=[' + selectedArr + ']'
        ToggleElement('deleteSelectedSubmit',true)
        ToggleElement('deleteSelectedBtn',false) 
    }
    
    //console.log(document.getElementById('deleteSelectedForm').action += '?selected=[' + selectedArr + ']')
}

$(function () {

    $("#find").on( "submit" , function(){
        // Intercept the form submission
        var formdata = $(this).serialize() // Serialize all form data
        ToggleElement('deleteOldSubmit',false)
        ToggleElement('deleteOldBtn',true)
        ToggleElement('deleteSelectedSubmit',false)
        ToggleElement('deleteSelectedBtn',true)
    
        // Post data to your PHP processing script
        $.post( "/clients/backend/Find.php", formdata, function(data) {
            // Act upon the data returned, setting it to #success <div>
            $("#Results").html ('')
            $("#Results").html (data)
        })
    
        return false // Prevent the form from actually submitting
    })

})

$(function () {

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