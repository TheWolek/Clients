//deleteOne
function deleteOne() {
    //0-id 1-imie 2-nazwisko 3-telefon 4-data 5-farba
    let client = [
        [$('#idRow').html(),"id"],
        [$('#telefonRow').html(),"telefon"],
        [$('#dataRow').html(),"data"],
        [$('#farbaRow').html(),"farba"]
    ]
    
    area = $('#area')
    area.html('')

    let output = '<form action="../backend/DeleteOne.php" method="post">'
    for(let i=0;i<client.length;i++) {
        output += '<input type="text" value="' + client[i][0] + '" name="' + client[i][1] + '" class="form-control" readonly="readonly"/><br/>'
    }

    output += '<p class="text-light">Klient zostanie trwale usunięty z bazy. Jesteś pewien?</p><input type="submit" value="usuń" class="btn btn-danger mb-5"/>'
    area.html(output)
}