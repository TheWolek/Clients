//displayOne
function findOne() {
    //0-id 1-imie 2-nazwisko 3-telefon 4-data 5-farba
    let client = [
        [document.getElementById('idRow').innerHTML,"id"],
        [document.getElementById('telefonRow').innerHTML,"telefon"],
        [document.getElementById('dataRow').innerHTML,"data"],
        [document.getElementById('farbaRow').innerHTML,"farba"]
    ]

    //console.log()

    let area = document.getElementById('area')
    area.innerHTML = ''

    let output = '<form action="../backend/ModifyOne.php" method="post">'
    for(let i=0;i<client.length;i++) {
        output += '<label>' + client[i][1]
        if(client[i][1] == 'data') 
            output += '<input type="date" value="' + client[i][0] +'" class="input" name="' + client[i][1] + '"/></label><br/>'
        else if (client[i][1] == 'telefon')
            output += '<input type="number" value="' + client[i][0] +'" class="input" name="' + client[i][1] + '"/></label><br/>' 
        else if(client[i][1] == 'id')
            output += '<input type="number" value="' + client[i][0] +'" class="input" name="' + client[i][1] + '" readonly="readonly"/></label><br/>'
        else
            output += '<input type="text" value="' + client[i][0] +'" class="input" name="' + client[i][1] + '"/></label><br/>'
    }
    output += '<br/>Dane klienta zostaną zamienione. Jesteś pewien?<br/><input type="submit" value="Edytuj" class="input-btn"/></form>'

    area.innerHTML = output
}