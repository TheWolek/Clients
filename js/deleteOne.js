//deleteOne
function deleteOne() {
    //0-id 1-imie 2-nazwisko 3-telefon 4-data 5-farba
    let client = [
        [document.getElementById('idRow').innerHTML,"id"],
        [document.getElementById('telefonRow').innerHTML,"telefon"],
        [document.getElementById('dataRow').innerHTML,"data"],
        [document.getElementById('farbaRow').innerHTML,"farba"]
    ]
    
    let area = document.getElementById('area')
    area.innerHTML = ''

    let output = '<form action="../backend/DeleteOne.php" method="post">'
    for(let i=0;i<client.length;i++) {
        output += '<input type="text" value="' + client[i][0] + '" name="' + client[i][1] + '" class="input" readonly="readonly"/><br/>'
    }

    output += '<br/><span class="dark-text">Klient zostanie trwale usunięty z bazy. Jesteś pewien?</span><br/><input type="submit" value="usuń" class="input-btn"/>'
    area.innerHTML = output
}