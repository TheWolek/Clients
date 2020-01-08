function ToggleElement(id,state) {
    if(state === true) {
        $('#'+id).css('display','block')
    } else {
        $('#'+id).css('display','none')
    }  
}

function ToggleTab(id) {
    if(id == 0) {
        $('#nav-0').addClass('active')
        $('#nav-1').removeClass('active')
        $('#nav-2').removeClass('active')
    } else if(id == 1) {
        $('#nav-1').addClass('active')
        $('#nav-0').removeClass('active')
        $('#nav-2').removeClass('active')
    } else if(id == 2) {
        $('#nav-2').addClass('active')
        $('#nav-1').removeClass('active')
        $('#nav-0').removeClass('active')
    } else {
        $('#nav-0').removeClass('active')
        $('#nav-1').removeClass('active')
        $('#nav-2').removeClass('active')
    }
}