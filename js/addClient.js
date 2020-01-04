//addClient
function addClient() {
    let clientData = [
        [document.getElementById('telefon').value,"telefon"],
        [document.getElementById('data_wizyty').value,"data"],
        [document.getElementById('numer_farby').value,"farba"]
    ]

    console.log(clientData)
    document.getElementById('form2').style.display='none'
    document.getElementById('formAdd').style.display='block'
    document.getElementById('telefonA').value=clientData[0][0]
    document.getElementById('data_wizytyA').value=clientData[1][0]
    document.getElementById('numer_farbyA').value=clientData[2][0]

    /*
    for(let i=0;i<clientData.length;i++) {
        output += '<label>' + clientData[i][1] + '</label>'
        if(clientData[i][1] == 'data') 
            output += '<input type="date" value="' + clientData[i][0] +'" class="input" name="' + clientData[i][1] + '" required autocomplete="off"/>'
        else if (clientData[i][1] == 'telefon')
            output += '<input type="number" value="' + clientData[i][0] +'" class="input" name="' + clientData[i][1] + '" required autocomplete="off"/>' 
        else
            output += '<input type="text" value="' + clientData[i][0] +'" class="input" name="' + clientData[i][1] + '" required autocomplete="off"/>'
    }
    output += '<br/><span class="dark-text">Klient zostanie dodany do bazy? Jesteś pewien?</span><br/><input type="submit" value="dodaj" class="input-submit"/>'
    area.innerHTML = output
    */
}