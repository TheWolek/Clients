function DeleteSelected() {
    const selected = document.getElementsByName('select')
    let selectedArr = []
    let output
    let bad = false
    selected.forEach((select) => {
        if(select.checked)
            selectedArr.push(select.value)
    })
    //console.log(selectedArr)
    let count = selectedArr.length

    document.getElementById('Results').innerHTML = ''
    if(count == 1) 
        output = 'Wybrana 1 wizyta zostanie usunięta. Jesteś pewien?'
    else if (count > 1)
        output = 'Wybrane ' + count + ' wizyt zostaną usuniętę. Jesteś pewien?'
    else {
        output = 'Nie wybrano żadnych wizyt'
        bad = true
    }
    document.getElementById('Results').innerHTML = '<p class="text-danger font-weight-bold">' + output + '</p>'

    if(!bad) {
        document.getElementById('deleteSelectedForm').action += '?selected=[' + selectedArr + ']'
        ToggleElement('deleteSelectedSubmit',true)
        ToggleElement('deleteSelectedBtn',false) 
    }
    
    //console.log(document.getElementById('deleteSelectedForm').action += '?selected=[' + selectedArr + ']')
}

function DeleteOldSure() {
    ToggleElement('deleteOldSubmit',true)
    ToggleElement('deleteOldBtn',false)
    $('#Results').html('')
    $('#Results').html('<p class="text-danger font-weight-bold">Wszystkie stare wizyty zostaną usunięte. Jesteś pewien?</p>')
}

function deleteOne(id) {
    //0-id 1-imie 2-nazwisko 3-telefon 4-data 5-farba
    let client = [
        [$('#idRow'+id).html(),"id"],
        [$('#DaneRow'+id).html(),"dane"],
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