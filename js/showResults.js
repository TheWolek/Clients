function ShowResults() {
    ToggleElement('form1',false)
    ToggleElement('form2',false)
    ToggleElement('Results',true)
    ToggleTab(0)
    $('#header').html('Wszyscy klienci')

    $.ajax({
        url:'/clients/backend/displayAll.php',
        type:'GET',
        success:function(data){
            $("#Results").html(data);
        }
    });
}