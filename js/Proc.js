function addProc() {
    //displays form to add new procedure
    $('#clientProcAddForm').css('display','flex')
}

function editProc(ID) {
    //displays form to edit procedure and handles editing
    if(!inEditMode) {
        inEditMode = true
        let output = "<form class='form-proc-edit' id='clientProcEditForm' action method='post'><input type='number' name='klient' id='klientE' value='"+ID+"' style='display: none;'>"
        output += "<input type='text' name='zabieg' id='zabiegE' value='"+$('#client-proc'+ID).html()+"' class='form-control'>"
        output += "<input type='submit' value='Edytuj' class='btn btn-primary ml-1'/></form>"
        $('#client-proc-id'+ID).html(output)

        $('#clientProcEditForm').on('submit', function() {
            let formdata = $(this).serialize()

            $.post('/clients/backend/editProcedure.php', formdata, function(data) {
                data = JSON.parse(data)
                notify(1,"Pomyślnie edytowano zabieg")
                $('#client-proc-id'+data.IDZ).html('')
                $('#client-proc-id'+data.IDZ).html(displayProc(data.IDZ,data.tresc))
            })

            inEditMode = false
            return false
        })
    }
    
}

function removeProc(ID) {
    //displays form to reove procedure and handles removing
    if(!inDeleteMode) {
        inDeleteMode = true
        hiddenProc.id = ID
        hiddenProc.tresc = $('#client-proc-id'+ID).html()
        let output = "<form class='form-proc-edit' id='Form-proc-remove' action method='post'><input type='number' name='klient' id='klientD' value='"+ID+"' style='display: none;'>"
        output += "<div class='text-danger font-weight-bold'>Na pewno chcesz usunąć ten zabieg?</div>"
        output += "<div><input type='button' onclick='cancelRemoveProc("+ID+")' value='Anuluj' class='btn btn-warning'/>"
        output += "<input type='submit' value='Usuń' class='btn btn-danger ml-1'/></div></form>"
        $('#client-proc-id'+ID).html(output)
        $('#Form-proc-remove').on('submit', function() {
            let formdata = $(this).serialize()

            $.post("/clients/backend/removeProcedure.php", formdata, function(data) {
                data = JSON.parse(data)
                if(data.status == '1') {
                    let idC = "#client-proc-id" + data.IDC
                    $(idC).remove()
                    notify(1,"Pomyślnie usunięto zabieg")
                } else {
                    notify(1,"Wystąpił błąd podczas usuwania zabiegu")
                }
            })

            inDeleteMode = false
            hiddenProc = {
                id: "",
                tresc: ""
            }
            return false
        })
    }
    
}

function cancelRemoveProc(ID) {
    $('#client-proc-id'+ID).html(hiddenProc.tresc)
    inDeleteMode = false
    hiddenProc = {
        id: "",
        tresc: ""
    }
}

function displayProc(idZ, tresc) {
    //returns the procedure with unic ID and actions buttons
    let output = "<div id='client-proc"+idZ+"'>"+tresc+"</div>"
    output += "<div><button class='btn btn-success mr-1' onclick='editProc("+idZ+")'>Edytuj</button><button class='btn btn-danger' onclick='removeProc("+idZ+")'>Usuń</button></div>"
    return output
}

function appendProc(idZ,tresc) {
    //adds new procedure to the DOM
    let output = displayProc(idZ,tresc)
    let newOutput = "<div class='client-proc-id' id='client-proc-id"+idZ+"'>" + output + "</div>"
    $('#client-proc').append(newOutput)
}

function displayAddProcForm(CID) {
    //adds form to add new procedure to DOM and set the EVH for submiting it
    let output = "<form action id='clientProcAddForm' method='post'><input type='number' id='client-proc-id-input' name='klient' value='"+CID+"' style='display: none;'/><input type='text' class='form-control mr-1' placeholder='zabieg' name='zabieg' id='procAddFormZabieg'><input type='submit' class='btn btn-primary' id='addProcSub' value='Dodaj'></form></div><br/>"
    $('#client-card').append(output)

    $("#clientProcAddForm").on( "submit" , function(){
        let formdata = $(this).serialize() // Serialize all form data
    
        // Post data to your PHP processing script
        $.post( "/clients/backend/addProcedure.php", formdata, function(data) {
            data = JSON.parse(data)
            if(data.status == '1') {
                let idZ = data.idZ
                let tresc = data.tresc
                appendProc(idZ,tresc)
                notify(1,"Pomyślnie dodano nowy zabieg")
                $('#procAddFormZabieg').val('');
                $('#clientProcAddForm').css('display','none')
            } else {
                notify(0,"Wystąpił błąd podczas dodawania zabiegu")
            }
        })
        return false // Prevent the form from actually submitting
    })
}