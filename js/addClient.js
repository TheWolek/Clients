//addClient
function addClient() {
    $('#AddSureText').css('display','block')
    $('#AddSureBtn').css('display','block')
    $('#AddBtn').css('display','none')
}

function addClientFromFind() {
    let name = $('#imie_naziwskoF').val()
    $('#imie_naziwskoF').val('')
    ShowForm(2)
    $('#imie_nazwiskoA').val(name)
}