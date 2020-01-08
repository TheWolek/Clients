//displayOne
function findOne(id) {
    //0-id 1-imie 2-nazwisko 3-telefon 4-data 5-farba
    let client = [
        [$('#idRow'+id).html(),"id"],
        [$('#telefonRow'+id).html(),"telefon"],
        [$('#dataRow'+id).html(),"data"],
        [$('#farbaRow'+id).html(),"farba"]
    ]

    //console.log()
    area = $('#FResults') //zmienic w szukaniu klienta
    area.html('')

    let output = '<form action="/clients/backend/ModifyOne.php" method="post">'
    for(let i=0;i<client.length;i++) {
        output += '<div class="form-group"><label class="text-light">' + client[i][1]
        if(client[i][1] == 'data') 
            output += '<input type="date" value="' + client[i][0] +'" class="form-control" name="' + client[i][1] + '"/></label><br/>'
        else if (client[i][1] == 'telefon')
            output += '<input type="number" value="' + client[i][0] +'" class="form-control" name="' + client[i][1] + '"/></label><br/>' 
        else if(client[i][1] == 'id')
            output += '<input type="number" value="' + client[i][0] +'" class="form-control" name="' + client[i][1] + '" readonly="readonly"/></label><br/>'
        else
            output += '<input type="text" value="' + client[i][0] +'" class="form-control" name="' + client[i][1] + '"/></label><br/>'
    }
    output += '<p class="text-light">Dane klienta zostaną zamienione. Jesteś pewien?</p><input type="submit" value="Edytuj" class="btn btn-success"/></form>'

    area.html(output)
}