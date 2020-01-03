//generateForm

function generateForm(type) {
    let items
    switch(type) {
        case 1: 
            items = {
                itemId: 1,
                inputs: ["text","date"],
                id: ["kolor","data_wizyty"],
                action: "znajdz",
                file: "Find",
                type: "name"
            }
        break
        case 2:
            items = {
                itemId: 2,
                inputs: ["number","date","text"],
                id: ["telefon","data_wizyty","numer_farby"],
                action: "dodaj",
                file: "Add",
                type: "id"
            }
        break
    }
    
    generateItems(items)
    function generateItems(items) {
        $('.form').html('') //clear
        count = items.inputs.length
        //console.log(count)
        let output
        if(items.itemId == 1) 
            output = '<div id="area"><form action="backend/executeForm' + items.file + '.php" method="post">';
        else 
            output = '<div id="area"><form>';
        for(let i=0;i<count;i++) {
            if(items.itemId == 2 && items.inputs[i] == 'date') {

                output += '<input type="' + items.inputs[i] + '" ' + items.type + ' ="' + items.id[i] + '" placeholder="' + items.id[i] + '" class="input" value="' + GetSafeDate(0) + '" autocomplete="off"/><br/>';
            }
            else
                output += '<input type="' + items.inputs[i] + '" ' + items.type + ' ="' + items.id[i] + '" placeholder="' + items.id[i] + '" class="input" autocomplete="off"/><br/>';
        }
        if(items.itemId == 1)
        output += '<br/><input type="button" value="wczoraj" onClick="FormSetDate(-1)" class="btn-2"/><input type="button" value="Dzisiaj" onClick="FormSetDate(0)" class="btn-2"/><input type="button" value="Jutro" onClick="FormSetDate(1)" class="btn-2"/><br/><input type="submit" value="' + items.action + '" class="input-submit"/></form><form action="backend/executeFormOld.php"><input type="submit" value="Znajdź stare" class="input-submit-old"/></form>';
        else 
        output += '<br/><input type="button" onClick="addClient()"' + items.file + '.js" value="' + items.action + '" class="input-submit"/></form></div>';
        $('.form').html(output)
    }
}

function FormSetDate(mode) {
    let date = GetSafeDate(mode)
    document.getElementsByName('data_wizyty')[0].value = date
    console.log(date)
}

function GetSafeDate(mode) {
    let current_datetime
    current_datetime = new Date()
    let date
     
    if(mode == 0) {
        let month = current_datetime.getMonth() + 1
        let day = current_datetime.getDate()

        if(month < 10) month = "0" + month
        if(day < 10) day = "0" + day

        date = current_datetime.getFullYear() + '-' + month + '-' + day
    } else if(mode == -1) {
        let yesterday = new Date(current_datetime)
        yesterday.setDate(yesterday.getDate() -1)
        let month = yesterday.getMonth() + 1
        let day = yesterday.getDate()

        if(month < 10) month = '0' + month
        if(day < 10) day = '0' + day

        date = yesterday.getFullYear() + "-" + month + "-" + day
    } else {
        let tomorrow = new Date(current_datetime)
        tomorrow.setDate(tomorrow.getDate() +1)
        let month = tomorrow.getMonth() + 1
        let day = tomorrow.getDate()

        if(month < 10) month = '0' + month
        if(day < 10) day = '0' + day

        date = tomorrow.getFullYear() + "-" + month + "-" + day
    }
    return date
}


