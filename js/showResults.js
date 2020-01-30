//wyswietlanie tabeli wszystkich klientow
function ShowResults() {
    ToggleElement('form1',false)
    ToggleElement('form2',false)
    ToggleElement('Results',true)
    ToggleTab(0)
    $('#header').html('Baza klientów')

    $.ajax({
        url:'http://localhost:3000/clients',
        type:'GET',
        success:function(data){
            data = data.data
            let output = "<div id='FResults'><table class='table table-dark table-hover'><thead class='thead-dark'><tr><th>ID</th><th>Imie i Nazwisko</th><th>data wizyty</th><th>numer farby</th><th>Akcje</th></tr></thead>"
            for(let i=0; i<data.length;i++) {
                let idRow = '"idRow' + data[i].ID+'"'
                let DaneRow = '"DaneRow' + data[i].ID+'"'
                let dataRow = '"dataRow' + data[i].ID+'"'
                let farbaRow = '"farbaRow' + data[i].ID+'"'
                let dane = data[i].imie_Nazwisko.split(' ')
                    .map((s) => s.charAt(0).toUpperCase() + s.substring(1))
                    .join(' ')
                let date = data[i].data_wizyty
                date = GoodDate(date)
                let today = new Date()
                today = getFormatedDate(today)

                dateStr = '<span id='+ dataRow +'>'+ date +'</span>'
                if(date < today)
                    dateStr += '<span class="badge badge-danger ml-1">Stary</span>'
                else if(date == today)
                    dateStr += '<span class="badge badge-success ml-1">Dzisiaj</span>'
                console.log(date)
                let color = nl2br(data[i].numer_farby)
                output += '<tr><td id='+idRow+'>' + data[i].ID + '</td><td id='+DaneRow+'>' + dane + '</td><td>'+ dateStr +'</td><td id='+farbaRow+'>' + color + '</td>'
                output += "<td><div class='action-flex'><input type='button' onClick='findOne("+ data[i].ID +")' class='btn btn-info' value='Edytuj'/><input type='button' onClick='deleteOne("+ data[i].ID +")' class='btn btn-danger ml-2' value='Usuń'/></div></td></tr>"
            }
            output += '</table></div>'
            $("#Results").html(output)
        }
    })
}