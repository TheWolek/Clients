//addClient
function addClient() {
    let clientData = [
        [$('#telefon').val(),"telefon"],
        [$('#data_wizyty').val(),"data"],
        [$('#numer_farby').val(),"farba"]
    ]

    console.log(clientData)
    $('#form2').css('display','none')
    $('#formAdd').css('display','block')
    $('#telefonA').val(clientData[0][0])
    $('#data_wizytyA').val(clientData[1][0])
    $('#numer_farbyA').val(clientData[2][0])

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