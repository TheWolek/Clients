$(function () {

    $("#find").on( "submit" , function(){
        // Intercept the form submission
        let formdata = $(this).serialize() // Serialize all form data
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

    $("#formAdd").on("submit", function() {
        let formdata = $(this).serialize()

        $.post("/clients/backend/AddClient.php", formdata, function(data) {
            data = JSON.parse(data)
            let output
            let CID
            //console.log(data)

            if(data.status) {
                CID = data.CID
                ToggleTab(1)
                ToggleElement("form2",false)
                ToggleElement("form1",true)
                notify(1,"Pomyślnie dodano klienta")
                findOne(CID)
            } else {
                if(data.err == "fields")
                    output = "Uzupełnij puste pola"
                else 
                    output = "Błąd bazy danych"
                notify(1,output)
            }
        })
        
        return false
    })
})