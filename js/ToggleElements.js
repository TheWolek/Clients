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

let notifyCount = 0

function notify(type, msg) {
    //$('#notify').html(msg)
    let className
    notifyCount++
    let id = 'notify' + notifyCount
    let html = '<div id="' + id + '" role="alert" style="opacity: 1" class="notify '

    if(type == 1) 
        //$('#notify').addClass('alert-success')
        className = 'alert-success'
    else
        // $('#notify').addClass('alert-danger')
        className = 'alert-danger'
    
    html += className + '">' + msg + '</div>'

    $('#notifyContainer').append(html)
    
    $('#'+id).css('opacity','1')

    setTimeout(function() {
        $('#'+id).css('opacity','0')
        setTimeout(function() {
            $('#'+id).remove()
        },1000)
    }, 4000)
}