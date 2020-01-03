//addClient
function addClient() {
    let clientData = [
        [document.getElementById('telefon').value,"telefon"],
        [document.getElementById('data_wizyty').value,"data"],
        [document.getElementById('numer_farby').value,"farba"]
    ]

    let area = document.getElementById('area')
    area.innerHTML = ''

    console.log(clientData)

    let output = '<form action="backend/AddClient.php" method="post">'

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
}