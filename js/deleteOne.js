//deleteOne
function deleteOne(id) {
    let client = {
        "id": $('#idRow'+id).html(),
        "dane": $('#DaneRow'+id).html()
    }

    let keys = Object.keys(client)
    
    area = $('#FResults')
    area.html('')

    let output = '<form id="formDel" action="/clients/backend/DeleteOne.php" method="post">'
    output += '<input type="text" value="' + client.id + '" name="' + keys[0] + '" class="form-control" readonly="readonly" style="display:none;"/><br/>'
    output += '<input type="text" value="' + client.dane + '" name="' + keys[1] + '" class="form-control" readonly="readonly"/><br/>'

    output += '<p class="text-light">Klient zostanie trwale usunięty z bazy. Jesteś pewien?</p><input type="submit" value="usuń" class="btn btn-danger mb-5"/>'
    area.html(output)

    $("#formDel").on("submit", function() {
        let formdata = $(this).serialize()

        $.post("/clients/backend/DeleteOne.php", formdata, function(data) {
            data = JSON.parse(data)

            if(data.status) {
                notify(1,"Pomyślnie usunięto dane klienta")
                $("#Results").html('')
            } else {
                notify(0,"Błąd bazy danych")
            }
        })

        return false;
    })
}