//global vars to prevent opening multiple edit and remove forms
let inEditMode = false
let inDeleteMode = false
let hiddenProc = {
    id: "",
    tresc: ""
}

//finds data about one client and orders to display procedures
function findOne(id) {
    let url = '/clients/backend/showProcedure.php?ID=' + id
    area = $('#Results')
    area.html('')

    inEditMode = false
    inDeleteMode = false

    $.get(url,function(data) {
        //console.log(data)
        data = JSON.parse(data)
        //console.log(data)
        let CID = data.clientData.CID
        let name = data.clientData.dane
        let procs = data.procs
        
        let output = "<div class='client-card' id='client-card'>"
        output += "<span class='client-id' id='client-id'>"+CID+"</span> <span class='client-name' id='client-name"+CID+"'>Imię i Nazwisko: "+name+"</span><button class='btn btn-primary client-proc-add' onclick='addProc("+CID+")'>Dodaj</button><div id='client-proc'>Zabiegi:</div></div>"
        area.html(output)
        for(let i=0;i<procs.length;i++) {
            appendProc(procs[i].ID,procs[i].tresc)
        }
        displayAddProcForm(CID)
    })
}