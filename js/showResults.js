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

$(function () {

    $("#find").on( "submit" , function(){
        // Intercept the form submission
        var formdata = $(this).serialize() // Serialize all form data
    
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
    
        // Post data to your PHP processing script
        $.post( "/clients/backend/FindOld.php", formdata, function(data) {
            // Act upon the data returned, setting it to #success <div>
            $("#Results").html ('')
            $("#Results").html (data)
        })
    
        return false // Prevent the form from actually submitting
    })

})