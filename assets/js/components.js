$(document).ready(function () {
    
    var bodyOb = $('body');
    
});

//--------------------------------------------------------------------------
function showLoader(message, time){
    $(".__loader-message").text(message);
    system.fadeIn('.__overlay', time ? time : 500);
}
//--------------------------------------------------------------------------
function hideLoader(time){
    $(".__loader-message").text("");
    system.fadeOut('.__overlay', time ? time : 500);
}
//------------------------------------------------------------------------------