$(document).ready(function () {
    
    var bodyOb = $('body');
    
});

//--------------------------------------------------------------------------
function showLoader(message){
    $(".loader-message").text(message);
    system.fadeIn('.overlay', 500);
}
//--------------------------------------------------------------------------
function hideLoader(){
    $(".loader-message").text("");
    system.fadeOut('.overlay', 500);
}
//------------------------------------------------------------------------------