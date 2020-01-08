//deleteOne
function deleteOne(id) {
    //0-id 1-imie 2-nazwisko 3-telefon 4-data 5-farba
    let client = [
        [$('#idRow'+id).html(),"id"],
        [$('#telefonRow'+id).html(),"telefon"],
        [$('#dataRow'+id).html(),"data"],
        [$('#farbaRow'+id).html(),"farba"]
    ]
    
    area = $('#FResults')
    area.html('')

    let output = '<form action="/clients/backend/DeleteOne.php" method="post">'
    for(let i=0;i<client.length;i++) {
        output += '<input type="text" value="' + client[i][0] + '" name="' + client[i][1] + '" class="form-control" readonly="readonly"/><br/>'
    }

    output += '<p class="text-light">Klient zostanie trwale usunięty z bazy. Jesteś pewien?</p><input type="submit" value="usuń" class="btn btn-danger mb-5"/>'
    area.html(output)
}